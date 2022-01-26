<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_ppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_pagu_model', 'tagihan');
        $this->load->model('View_pagu_sp2d_model', 'sp2d');
        $this->load->model('View_realisasi_model', 'viewtagihan');
        $this->load->model('View_realisasi_sp2d_model', 'viewsp2d');
    }


    public function index($jenis = 1)
    {
        $data['jenis'] = $jenis;
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');
        if ($jenis == 1) {
            $data['ppk'] = $this->tagihan->realisasiPpk($kdsatker, $tahun);
        } else {
            $data['ppk'] = $this->sp2d->realisasiPpk($kdsatker, $tahun);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/index', $data);
        $this->load->view('template/footer');
    }

    public function bulan($jenis = 1, $kdppk = null)
    {
        $data['jenis'] = $jenis;
        $data['kdppk'] = $kdppk;
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');

        if ($jenis == 1) {
            $data['unit'] = $this->viewtagihan->getRealisasiBulanPpk($kdsatker, $tahun, $kdppk);
        } else {
            $data['unit'] = $this->viewsp2d->getRealisasiBulanPpk($kdsatker, $tahun, $kdppk);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/bulan', $data);
        $this->load->view('template/footer');
    }

    public function detail($jenis = null, $kdppk = null, $bulan = null)
    {
        if (!isset($bulan)) $bulan = '01';
        $kdsatker = $this->session->userdata('kdsatker');
        $tahun = $this->session->userdata('tahun');

        // menangkap data pencarian kode
        $kode = $this->input->post('kode');

        // settingan halaman
        $config['base_url'] = base_url('realisasi-ppk/detail/' . $jenis . '/' . $kdppk . '/' . $bulan . '');
        $config['total_rows']  = $this->viewtagihan->countRealisasiPpk($kdsatker, $tahun, $kdppk, $bulan);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
        $limit = $config["per_page"];
        $data['kode'] = $kode;
        $offset = $data['page'];

        $data['jenis'] = $jenis;
        $data['kdppk'] = $kdppk;
        $data['bulan'] = $bulan;

        // pilih tampilan data, semua atau berdasarkan pencarian kode 
        if ($jenis == 1) {
            $data['bln'] = $this->viewtagihan->getBulanPpk($kdsatker, $tahun, $kdppk);
            if ($kode) {
                $data['page'] = 0;
                $offset = 0;
                $data['realisasi'] = $this->viewtagihan->findRealisasiPpk($kdsatker, $tahun, $kdppk, $bulan, $limit, $offset, $kode);
            } else {
                $data['realisasi'] = $this->viewtagihan->getRealisasiPpk($kdsatker, $tahun, $kdppk, $bulan, $limit, $offset);
            }
        } else {
            $data['bln'] = $this->viewsp2d->getBulanPpk($kdsatker, $tahun, $kdppk);
            if ($kode) {
                $data['page'] = 0;
                $offset = 0;
                $data['realisasi'] = $this->viewsp2d->findRealisasiPpk($kdsatker, $tahun, $kdppk, $bulan, $limit, $offset, $kode);
            } else {
                $data['realisasi'] = $this->viewsp2d->getRealisasiPpk($kdsatker, $tahun, $kdppk, $bulan, $limit, $offset);
            }
        }

        // meload view pada pegawai/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/detail', $data);
        $this->load->view('template/footer');
    }
}
