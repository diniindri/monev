<?php

use Spipu\Html2Pdf\Html2Pdf;

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_upload_model', 'data_upload');
        $this->load->model('Data_tagihan_model', 'tagihan');
        $this->load->model('Data_dnp_model', 'dnp');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('arsip/index');
        $config['total_rows'] = $this->viewtagihan->countTagihan(3);
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
            $data['tagihan'] = $this->viewtagihan->findTagihan($notagihan, $limit, $offset, 3);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihan($limit, $offset, 3);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('arsip/index', $data);
        $this->load->view('template/footer');
    }

    public function tolak($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 2
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditolak.');
        redirect('arsip');
    }
}
