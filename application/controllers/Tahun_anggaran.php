<?php

use Spipu\Html2Pdf\Html2Pdf;

class Tahun_anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_tahun_model.php
        $this->load->model('Ref_tahun_model', 'tahun');
    }

    public function index()
    {

        // load data tahun yang akan diubah
        $data['tahun'] = $this->tahun->getTahun();
        $data['tahun_sekarang'] = $this->session->userdata('tahun');

        if ($this->input->post('tahun')) {
            $tahun = $this->input->post('tahun');
            $this->session->unset_userdata('tahun');
            $this->session->set_userdata(['tahun' => $tahun]);
            $this->session->set_flashdata('pesan', 'Tahun Anggaran berhasil diubah.');
            redirect('tahun-anggaran');
        }


        // meload view pada tahun/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun_anggaran/index', $data);
        $this->load->view('template/footer');
    }
}
