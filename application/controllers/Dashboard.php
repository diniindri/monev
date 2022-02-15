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
        $this->load->model('View_data_realisasi_model', 'realisasi');
    }

    public function index($jenis = 1)
    {
        $data['jenis'] = $jenis;
        $data['nmsatker'] = $this->satker->getNamaSatker(sesi()['kdsatker']);

        //cara manual
        // $ppk = $this->ppk->getNamaPpk();
        // if ($ppk) {
        //     $data['nmppk'] = $this->ppk->getNamaPpk()['nmppk'];
        // } else {
        //     $data['nmppk'] = '';
        // }

        //cara yang lebih keren
        $this->ppk->getNamaPpk() ? $data['nmppk'] = $this->ppk->getNamaPpk()['nmppk'] : $data['nmppk'] = '';

        $data['realisasi'] = $this->realisasi->getJenisBelanja($jenis);
        $data['ppk'] = $this->realisasi->getRealisasiPpk($jenis);
        $data['unit'] = $this->realisasi->getRealisasiUnit($jenis);

        $this->load->view('dashboard/header_grafik');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/footer_grafik', $data);
    }
}
