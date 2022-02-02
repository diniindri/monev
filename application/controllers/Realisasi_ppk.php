<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_ppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_data_realisasi_model', 'realisasi');
    }

    public function index($jenis = 1)
    {
        $data['jenis'] = $jenis;
        $data['ppk'] = $this->realisasi->getRealisasiPpk($jenis);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/index', $data);
        $this->load->view('template/footer');
    }

    public function bulan($jenis = 1, $kdppk = null)
    {
        $data['jenis'] = $jenis;
        $data['kdppk'] = $kdppk;
        $data['ppk'] = $this->realisasi->getRealisasiPpkBulan($jenis, $kdppk);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/bulan', $data);
        $this->load->view('template/footer');
    }

    public function detail($jenis = null, $kdppk = null, $kdbulan = null)
    {
        $data['jenis'] = $jenis;
        $data['kdppk'] = $kdppk;
        $data['kdbulan'] = $kdbulan;
        $data['ppk'] = $this->realisasi->getDetailRealisasiPpkBulan($jenis, $kdppk, $kdbulan);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/detail', $data);
        $this->load->view('template/footer');
    }

    public function tagihan($jenis = null, $kdppk = null, $kdbulan = null, $kode = null)
    {
        $data['jenis'] = $jenis;
        $data['kdppk'] = $kdppk;
        $data['kdbulan'] = $kdbulan;
        $data['ppk'] = $this->realisasi->getDetailRealisasiPpkBulanTagihan($jenis, $kdppk, $kdbulan, $kode);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/tagihan', $data);
        $this->load->view('template/footer');
    }
}
