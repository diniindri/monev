<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_direktorat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_pagu_model', 'tagihan');
        $this->load->model('View_pagu_sp2d_model', 'sp2d');
        $this->load->model('View_realisasi_model', 'viewtagihan');
        $this->load->model('View_realisasi_sp2d_model', 'viewsp2d');
        $this->load->model('Ref_bulan_model', 'bulan');
    }


    public function index($jenis = 1)
    {
        $data['jenis'] = $jenis;
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');
        if ($jenis == 1) {
            $data['unit'] = $this->tagihan->realisasiUnit($kdsatker, $tahun);
        } else {
            $data['unit'] = $this->sp2d->realisasiUnit($kdsatker, $tahun);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/index', $data);
        $this->load->view('template/footer');
    }

    public function bulan($jenis = 1, $kdunit = null)
    {
        $data['jenis'] = $jenis;
        $data['kdunit'] = $kdunit;
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');

        if ($jenis == 1) {
            $data['unit'] = $this->viewtagihan->getRealisasiBulan($kdsatker, $tahun, $kdunit);
        } else {
            $data['unit'] = $this->viewsp2d->getRealisasiBulan($kdsatker, $tahun, $kdunit);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/bulan', $data);
        $this->load->view('template/footer');
    }

    public function detail($jenis = null, $kdunit = null, $bulan = null)
    {
        if (!isset($bulan)) $bulan = '01';
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');

        // menangkap data pencarian kode
        $kode = $this->input->post('kode');

        // settingan halaman
        $config['base_url'] = base_url('realisasi-direktorat/detail/' . $jenis . '/' . $kdunit . '/' . $bulan . '');
        $config['total_rows']  = $this->viewtagihan->countRealisasi($kdsatker, $tahun, $kdunit, $bulan);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
        $limit = $config["per_page"];
        $data['kode'] = $kode;
        $offset = $data['page'];

        $data['jenis'] = $jenis;
        $data['kdunit'] = $kdunit;
        $data['bulan'] = $bulan;

        // pilih tampilan data, semua atau berdasarkan pencarian kode 
        if ($jenis == 1) {
            $data['bln'] = $this->viewtagihan->getBulan($kdsatker, $tahun, $kdunit);
            if ($kode) {
                $data['page'] = 0;
                $offset = 0;
                $data['realisasi'] = $this->viewtagihan->findRealisasi($kdsatker, $tahun, $kdunit, $bulan, $limit, $offset, $kode);
            } else {
                $data['realisasi'] = $this->viewtagihan->getRealisasi($kdsatker, $tahun, $kdunit, $bulan, $limit, $offset);
            }
        } else {
            $data['bln'] = $this->viewsp2d->getBulan($kdsatker, $tahun, $kdunit);
            if ($kode) {
                $data['page'] = 0;
                $offset = 0;
                $data['realisasi'] = $this->viewsp2d->findRealisasi($kdsatker, $tahun, $kdunit, $bulan, $limit, $offset, $kode);
            } else {
                $data['realisasi'] = $this->viewsp2d->getRealisasi($kdsatker, $tahun, $kdunit, $bulan, $limit, $offset);
            }
        }

        // meload view pada pegawai/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/detail', $data);
        $this->load->view('template/footer');
    }
}
