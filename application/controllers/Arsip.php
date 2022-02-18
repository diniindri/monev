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
        $this->load->model('Data_realisasi_model', 'realisasi');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('arsip/index');
        $config['total_rows'] = $this->viewtagihan->countTagihan(5);
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
            $data['tagihan'] = $this->viewtagihan->findTagihan($notagihan, $limit, $offset, 5);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihan($limit, $offset, 5);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('arsip/index', $data);
        $this->load->view('template/footer');
    }

    public function dnp($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('arsip/dnp/' . $tagihan_id . '/a');
        $config['total_rows'] = $this->dnp->countDnp($tagihan_id);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
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
        $this->load->view('arsip/dnp', $data);
        $this->load->view('template/footer');
    }

    public function coa($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian ro
        $kro = $this->input->post('Kro');
        $ro = $this->input->post('ro');

        // settingan halaman
        $config['base_url'] = base_url('arsip/coa/' . $tagihan_id . '/a');
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
        $this->load->view('arsip/coa', $data);
        $this->load->view('template/footer');
    }

    public function dokumen($tagihan_id = null, $asal = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;
        $data['asal'] = $asal;

        $data['upload'] = $this->data_upload->getUpload($tagihan_id);


        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('arsip/dokumen', $data);
        $this->load->view('template/footer');
    }

    public function tolak($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 4
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditolak.');
        redirect('arsip');
    }
}
