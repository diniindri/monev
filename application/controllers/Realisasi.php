<?php

class Realisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        // meload file Data_realisasi_model.php
        $this->load->model('Data_realisasi_model', 'realisasi');
        $this->load->model('Ref_pagu_model', 'pagu');
        $this->load->model('View_pagu_model', 'viewpagu');
        $this->load->model('Data_tagihan_model', 'tagihan');
    }

    public function index($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian ro
        $ro = $this->input->post('ro');

        // settingan halaman
        $config['base_url'] = base_url('realisasi/index/' . $tagihan_id . '');
        $config['total_rows'] = $this->realisasi->countRealisasi($tagihan_id);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['ro'] = $ro;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro 
        if ($ro) {
            $data['page'] = 0;
            $offset = 0;
            $data['realisasi'] = $this->realisasi->findRealisasi($tagihan_id, $ro, $limit, $offset);
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
            'field' => 'program',
            'label' => 'Program',
            'rules' => 'required|trim|exact_length[2]'
        ],
        [
            'field' => 'kegiatan',
            'label' => 'Kegiatan',
            'rules' => 'required|trim|exact_length[4]'
        ],
        [
            'field' => 'kro',
            'label' => 'KRO',
            'rules' => 'required|trim|exact_length[3]'
        ],
        [
            'field' => 'ro',
            'label' => 'RO',
            'rules' => 'required|trim|exact_length[3]'
        ],
        [
            'field' => 'komponen',
            'label' => 'Komponen',
            'rules' => 'required|trim|exact_length[3]'
        ],
        [
            'field' => 'subkomponen',
            'label' => 'Subkomponen',
            'rules' => 'required|trim|exact_length[1]'
        ],
        [
            'field' => 'akun',
            'label' => 'akun',
            'rules' => 'required|trim|exact_length[6]'
        ]
    ];

    public function create($tagihan_id = null)
    {
        // cek apakah ada tagihan id apa tidak
        if (!isset($tagihan_id)) show_404();

        // tampilkan id tagihan
        $data['tagihan_id'] = $tagihan_id;

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tagihan_id' => $tagihan_id,
                'program' => htmlspecialchars($this->input->post('program', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'kro' => htmlspecialchars($this->input->post('kro', true)),
                'ro' => htmlspecialchars($this->input->post('ro', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true))
            ];
            // simpan data ke database melalui model
            $this->realisasi->createRealisasi($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('realisasi/index/' . $tagihan_id . '');
        }

        // meload view pada realisasi/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi/create', $data);
        $this->load->view('template/footer');
    }

    public function update($id = null, $tagihan_id = null)
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
            $data = [
                'tagihan_id' => $tagihan_id,
                'program' => htmlspecialchars($this->input->post('program', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'kro' => htmlspecialchars($this->input->post('kro', true)),
                'ro' => htmlspecialchars($this->input->post('ro', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true)),
                'realisasi' => htmlspecialchars($this->input->post('realisasi', true))
            ];
            // update data di database melalui model
            $this->realisasi->updateRealisasi($data, $id);
            // update bruto pada data_tagihan
            $bruto = $this->realisasi->getBruto($tagihan_id)['bruto'];
            $this->tagihan->updateTagihan(['bruto' => $bruto], $tagihan_id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('realisasi/index/' . $tagihan_id . '');
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
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('realisasi/index/' . $tagihan_id . '');
    }

    public function tarik_detail_akun($tagihan_id = null)
    {
        // cek apakah ada rute id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian kro
        $kro = $this->input->post('kro');

        // settingan halaman
        $config['base_url'] = base_url('realisasi/tarik-detail-akun/' . $tagihan_id . '');
        $config['total_rows'] = $this->viewpagu->countPagu();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['kro'] = $kro;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro
        if ($kro) {
            $data['page'] = 0;
            $offset = 0;
            $data['pagu'] = $this->viewpagu->findPagu($kro, $limit, $offset);
        } else {
            $data['pagu'] = $this->viewpagu->getPagu($limit, $offset);
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
        redirect('realisasi/index/' . $tagihan_id . '');
    }
}
