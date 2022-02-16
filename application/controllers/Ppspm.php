<?php

use Spipu\Html2Pdf\Html2Pdf;

class Ppspm extends CI_Controller
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
        $config['base_url'] = base_url('ppspm/index');
        $config['total_rows'] = $this->register->countRegisterPpspm();
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
            $data['register'] = $this->register->findRegisterPpspm($nomor, $limit, $offset);
        } else {
            $data['register'] = $this->register->getRegisterPpspm($limit, $offset);
        }

        // meload view pada ppspm/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ppspm/index', $data);
        $this->load->view('template/footer');
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
        $data['tagihan'] = $this->viewtagihan->getTagihanRegister();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/create_detail', $data);
        $this->load->view('template/footer');
    }

    public function terima($id = null)
    {

        $this->tagihan->updateTagihanRegister(['status' => 3], $id);
        $this->register->updateRegister(['status' => 2], $id);
        $this->session->set_flashdata('berhasil', 'Data berhasil dikirim.');
        redirect('ppspm');
    }
}
