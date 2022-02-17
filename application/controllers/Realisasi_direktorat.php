<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_direktorat extends CI_Controller
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
        $data['unit'] = $this->realisasi->getRealisasiUnit($jenis);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/index', $data);
        $this->load->view('template/footer');
    }

    public function bulan($jenis = 1, $kdunit = null)
    {
        $data['jenis'] = $jenis;
        $data['kdunit'] = $kdunit;
        $data['unit'] = $this->realisasi->getRealisasiUnitBulan($jenis, $kdunit);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/bulan', $data);
        $this->load->view('template/footer');
    }

    public function detail($jenis = null, $kdunit = null, $kdbulan = null)
    {
        $data['jenis'] = $jenis;
        $data['kdunit'] = $kdunit;
        $data['kdbulan'] = $kdbulan;
        $data['unit'] = $this->realisasi->getDetailRealisasiUnitBulan($jenis, $kdunit, $kdbulan);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/detail', $data);
        $this->load->view('template/footer');
    }

    public function tagihan($jenis = null, $kdunit = null, $kdbulan = null, $kode = null)
    {
        $data['jenis'] = $jenis;
        $data['kdunit'] = $kdunit;
        $data['kdbulan'] = $kdbulan;
        $data['unit'] = $this->realisasi->getDetailRealisasiUnitBulanTagihan($jenis, $kdunit, $kdbulan, $kode);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/tagihan', $data);
        $this->load->view('template/footer');
    }

    public function bulan_sspb($kdunit = null)
    {
        $data['kdunit'] = $kdunit;
        $data['unit'] = $this->realisasi->getSspbUnitBulan($kdunit);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/bulan_sspb', $data);
        $this->load->view('template/footer');
    }

    public function detail_sspb($kdunit = null, $kdbulan = null)
    {
        $data['kdunit'] = $kdunit;
        $data['kdbulan'] = $kdbulan;
        $data['unit'] = $this->realisasi->getDetailSspbUnitBulan($kdunit, $kdbulan);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/detail_sspb', $data);
        $this->load->view('template/footer');
    }

    public function tagihan_sspb($kdunit = null, $kdbulan = null, $kode = null)
    {
        $data['kdunit'] = $kdunit;
        $data['kdbulan'] = $kdbulan;
        $data['unit'] = $this->realisasi->getDetailSspbUnitBulanTagihan($kdunit, $kdbulan, $kode);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/tagihan_sspb', $data);
        $this->load->view('template/footer');
    }
}
