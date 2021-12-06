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
    }

    public function index()
    {
        $kdsatker = $this->session->userdata('kdsatker');
        $kdppk = $this->session->userdata('kdppk');
        $data['nmsatker'] = $this->satker->getNamaSatker($kdsatker);
        $data['nmppk'] = $this->ppk->getNamaPpk($kdppk);

        $data['realisasi'] = [
            [
                'jenis' => 'Belanja Pegawai',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'jenis' => 'Belanja Barang',
                'pagu' => '77,760,390,000',
                'realisasi' => '30,199,732,055',
                'sisa' => '47,560,657,945',
                'persentase' => '38.84%'
            ],
            [
                'jenis' => 'Belanja Modal',
                'pagu' => '10,813,172,000',
                'realisasi' => '911,336,375',
                'sisa' => '9,901,835,625',
                'persentase' => '8.43%'
            ],
            [
                'jenis' => 'Total',
                'pagu' => '356,952,883,000',
                'realisasi' => '215,875,612,132',
                'sisa' => '141,077,270,868',
                'persentase' => '60.48%'
            ]
        ];

        $this->load->view('dashboard/header_grafik');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/footer_grafik');
    }
}
