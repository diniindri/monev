<?php

use Spipu\Html2Pdf\Html2Pdf;

class Monitoring_tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_upload_model', 'upload');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('monitoring-tagihan/index');
        $config['total_rows'] = $this->viewtagihan->countTagihanAll();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['notagihan'] = $notagihan;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor tagihan
        if ($notagihan) {
            $data['page'] = 0;
            $offset = 0;
            $data['tagihan'] = $this->viewtagihan->findTagihanAll($notagihan, $limit, $offset);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihanAll($limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('monitoring_tagihan/index', $data);
        $this->load->view('template/footer');
    }

    public function dokumen($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;
        $data['upload'] = $this->upload->getUpload($tagihan_id);


        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('monitoring_tagihan/dokumen', $data);
        $this->load->view('template/footer');
    }
}
