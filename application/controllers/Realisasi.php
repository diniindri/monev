<?php

class Realisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        $this->load->model('Ref_pagu_model', 'pagu');
        $this->load->model('Data_realisasi_model', 'realisasi');
        $this->load->model('View_sisa_pagu_model', 'view_sisa_pagu');
        $this->load->model('Data_tagihan_model', 'tagihan');
    }

    public function index($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian ro
        $kro = $this->input->post('Kro');
        $ro = $this->input->post('ro');

        // settingan halaman
        $config['base_url'] = base_url('realisasi/index/' . $tagihan_id . '/a');
        $config['total_rows'] = $this->realisasi->countRealisasi($tagihan_id);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
        $data['kro'] = $kro;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro 
        if ($kro) {
            $data['page'] = 0;
            $offset = 0;
            $data['realisasi'] = $this->realisasi->findRealisasi($tagihan_id, $kro, $ro, $limit, $offset);
        } else {
            $data['realisasi'] = $this->realisasi->getRealisasi($tagihan_id, $limit, $offset);
        }

        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada seluruh form
    private $rules = [
        [
            'field' => 'realisasi',
            'label' => 'realisasi',
            'rules' => 'required|trim|numeric'
        ]
    ];

    public function update($id = null, $tagihan_id = null, $kode = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        if (!isset($tagihan_id)) show_404();

        // load data tagihan id ke view
        $data['tagihan_id'] = $tagihan_id;
        // load data realisasi ke view berdasarkan id realisasi
        $data['realisasi'] = $this->realisasi->getDetailRealisasi($id);

        $validation = $this->form_validation->set_rules($this->rules);


        // jika validasi sukses
        if ($validation->run()) {
            $this->realisasi->updateRealisasi(['realisasi' => 0], $id);
            $sisa = $this->view_sisa_pagu->getDetailSisaPagu($kode)['sisa'];
            $realisasi = htmlspecialchars($this->input->post('realisasi', true));
            if ($sisa - $realisasi < 0) {
                $this->session->set_flashdata('gagal', 'Data gagal disimpan, realisasi melebihi sisa pagu.');
            } else {
                $data = [
                    'realisasi' => $realisasi
                ];
                $this->realisasi->updateRealisasi($data, $id);
                $bruto = $this->realisasi->getBruto($tagihan_id)['bruto'];
                $this->tagihan->updateTagihan(['bruto' => $bruto], $tagihan_id);
                $this->session->set_flashdata('berhasil', 'Data berhasil diubah.');
            }

            redirect('realisasi/index/' . $tagihan_id . '/a');
        }

        // meload view pada realisasi/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        if (!isset($tagihan_id)) show_404();

        // hapus data di database melalui model
        if ($this->realisasi->deleteRealisasi($id)) {
            $bruto = $this->realisasi->getBruto($tagihan_id)['bruto'];
            $this->tagihan->updateTagihan(['bruto' => $bruto], $tagihan_id);
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('realisasi/index/' . $tagihan_id . '/a');
    }

    public function tarik_detail_akun($tagihan_id = null)
    {
        // cek apakah ada rute id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian kode
        $kode = $this->input->post('kode');

        // settingan halaman
        $config['base_url'] = base_url('realisasi/tarik-detail-akun/' . $tagihan_id . '/a');
        $config['total_rows'] = $this->view_sisa_pagu->countSisaPagu();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
        $data['kode'] = $kode;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro
        if ($kode) {
            $data['page'] = 0;
            $offset = 0;
            $data['pagu'] = $this->view_sisa_pagu->findSisaPagu($kode, $limit, $offset);
        } else {
            $data['pagu'] = $this->view_sisa_pagu->getSisaPagu($limit, $offset);
        }

        // meload view pada realisasi/tarik_detail_akun.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi/tarik_detail_akun', $data);
        $this->load->view('template/footer');
    }

    public function pilih_detail_akun($pagu_id = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($pagu_id)) show_404();
        if (!isset($tagihan_id)) show_404();

        //load data berdasarkan nip dari data realisasi gaji
        $pagu = $this->pagu->getDetailPagu($pagu_id);

        $data = [
            'tagihan_id' => $tagihan_id,
            'program' => $pagu['program'],
            'kegiatan' => $pagu['kegiatan'],
            'kro' => $pagu['kro'],
            'ro' => $pagu['ro'],
            'komponen' => $pagu['komponen'],
            'subkomponen' => $pagu['subkomponen'],
            'akun' => $pagu['akun'],
            'tahun' => $pagu['tahun'],
            'kdsatker' => $pagu['kdsatker'],
            'kdunit' => $pagu['kdunit'],
            'kdppk' => $pagu['kdppk']
        ];
        // simpan data di database melalui model
        $this->realisasi->createRealisasi($data);

        // update timeline
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('realisasi/index/' . $tagihan_id . '/a');
    }
}
