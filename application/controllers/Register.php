<?php

use Spipu\Html2Pdf\Html2Pdf;

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_register_model.php
        $this->load->model('Data_register_model', 'register');
        $this->load->model('Ref_nomor_model', 'nomor');
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_tagihan_model', 'tagihan');
    }

    public function index()
    {
        // menangkap data pencarian nomor
        $nomor = $this->input->post('nomor');

        // settingan halaman
        $config['base_url'] = base_url('register/index');
        $config['total_rows'] = $this->register->countRegister();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor
        if ($nomor) {
            $data['page'] = 0;
            $offset = 0;
            $data['register'] = $this->register->findRegister($nomor, $limit, $offset);
        } else {
            $data['register'] = $this->register->getRegister($limit, $offset);
        }

        // meload view pada register/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'nomor',
            'label' => 'Nomor',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'jumlah',
            'label' => 'Jumlah Tagihan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $data = [
            'nomor' => nomor()['nomor'],
            'ekstensi' => nomor()['ekstensi'],
            'tanggal' => time(),
            'jumlah' => 0,
            'status' => 0
        ];
        // simpan data ke database melalui model
        $this->register->createRegister($data);

        // ubah nomor ref_nomor
        $this->nomor->updateNoReg(['nomor' => nomor()['next']]);

        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('register');

        // meload view pada register/create.php
        // $this->load->view('template/header');
        // $this->load->view('template/sidebar');
        // $this->load->view('register/create');
        // $this->load->view('template/footer');
    }


    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->register->deleteRegister($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('register');
    }

    public function detail($id = null)
    {
        $data['register_id'] = $id;
        $data['tagihan'] = $this->viewtagihan->getPerRegister($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/detail', $data);
        $this->load->view('template/footer');
    }

    public function create_detail($register_id = null)
    {
        $data['register_id'] = $register_id;
        $data['tagihan'] = $this->viewtagihan->getTagihanAll();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/create_detail', $data);
        $this->load->view('template/footer');
    }

    public function pilih($tagihan_id = null, $register_id = null)
    {
        $this->tagihan->updateTagihan(['register_id' => $register_id], $tagihan_id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('register/detail/' . $register_id . '');
    }

    public function delete_detail($tagihan_id = null, $register_id = null)
    {
        $this->tagihan->updateTagihan(['register_id' => null], $tagihan_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('register/detail/' . $register_id . '');
    }
}
