<?php

class Dnp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        $this->load->model('Data_dnp_model', 'dnp');
    }

    public function index($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('dnp/index/' . $tagihan_id . '');
        $config['total_rows'] = $this->dnp->countDnp($tagihan_id);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro 
        if ($nama) {
            $data['page'] = 0;
            $offset = 0;
            $data['dnp'] = $this->dnp->findDnp($tagihan_id, $nama, $limit, $offset);
        } else {
            $data['dnp'] = $this->dnp->getDnp($tagihan_id, $limit, $offset);
        }

        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dnp/index', $data);
        $this->load->view('template/footer');
    }

    public function tarik_pegawai_gaji($tagihan_id = null)
    {
        // cek apakah ada rute id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id sk ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('dnp/tarik-pegawai-gaji/' . $tagihan_id . '');
        $config['total_rows'] = $this->dnp->countPegawaiGaji();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nama
        if ($nama) {
            $data['page'] = 0;
            $offset = 0;
            $data['pegawai'] = $this->dnp->findPegawaiGaji($nama, $limit, $offset);
        } else {
            $id = null;
            $data['pegawai'] = $this->dnp->getPegawaiGaji($id, $limit, $offset);
        }

        // meload view pada pegawai/tarik_pegawai_gaji.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dnp/tarik_pegawai_gaji', $data);
        $this->load->view('template/footer');
    }

    public function pilih_pegawai_gaji($nip = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($nip)) show_404();
        if (!isset($tagihan_id)) show_404();

        //load data berdasarkan nip dari data pegawai gaji
        $pegawai = $this->dnp->findPegawaiGaji($nip, null, 0);

        foreach ($pegawai as $r) {
            $data = [
                'tagihan_id' => $tagihan_id,
                'nip' => $r['nip'],
                'nama' => $r['nmpeg'],
                'kdgol' => $r['kdgapok'],
                'bruto' => 0,
                'pph' => 0,
                'netto' => 0,
                'rekening' => $r['rekening'],
                'nmbank' => $r['nm_bank'],
                'nmrek' => $r['nmrek']
            ];
            // simpan data di database melalui model
            $this->dnp->createDnp($data);
        }
        // update timeline
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('dnp/index/' . $tagihan_id . '');
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
}
