<?php

use Spipu\Html2Pdf\Html2Pdf;

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('ref_satker_model', 'satker');
        $this->load->model('ref_ppk_model', 'ppk');
        $this->load->model('View_pagu_model', 'tagihan');
        $this->load->model('View_pagu_sp2d_model', 'sp2d');
    }

    public function index($jenis = 1)
    {
        $data['jenis'] = $jenis;
        $tahun = $this->session->userdata('tahun');
        $kdsatker = $this->session->userdata('kdsatker');
        $kdppk = $this->session->userdata('kdppk');
        $data['nmsatker'] = $this->satker->getNamaSatker($kdsatker);
        $data['nmppk'] = $this->ppk->getNamaPpk($kdppk);

        if ($jenis == 1) {
            $data['realisasi'] = $this->tagihan->getJenisBelanja($kdsatker, $tahun);
            $data['ppk'] = $this->tagihan->getRealisasiPpk();
            $data['unit'] = $this->tagihan->getRealisasiUnit();
        } else {
            $data['realisasi'] = $this->sp2d->getJenisBelanja($kdsatker, $tahun);
            $data['ppk'] = $this->sp2d->getRealisasiPpk();
            $data['unit'] = $this->sp2d->getRealisasiUnit();
        }

        $this->load->view('dashboard/header_grafik');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/footer_grafik', $data);
    }
}
