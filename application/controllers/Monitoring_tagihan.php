<?php

use Spipu\Html2Pdf\Html2Pdf;

class Monitoring_tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        // menangkap data pencarian nomor SPP/SPBy
        $nomor = $this->input->post('nomor');

        // settingan halaman
        $config['base_url'] = base_url('monitoring-tagihan/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['tagihan'] = [
            [
                'jenis' => 'SPP',
                'nomor' => '00001',
                'dokumen' => '00001',
                'tanggal' => '00001',
                'nosp2d' => '00001',
                'tglsp2d' => '00001',
                'bruto' => '00001',
                'potongan' => '00001',
                'netto' => '00001',
                'detail' => '00001',
                'unit' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00001',
                'dokumen' => '00001',
                'tanggal' => '00001',
                'nosp2d' => '00001',
                'tglsp2d' => '00001',
                'bruto' => '00001',
                'potongan' => '00001',
                'netto' => '00001',
                'detail' => '00001',
                'unit' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00001',
                'dokumen' => '00001',
                'tanggal' => '00001',
                'nosp2d' => '00001',
                'tglsp2d' => '00001',
                'bruto' => '00001',
                'potongan' => '00001',
                'netto' => '00001',
                'detail' => '00001',
                'unit' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00001',
                'dokumen' => '00001',
                'tanggal' => '00001',
                'nosp2d' => '00001',
                'tglsp2d' => '00001',
                'bruto' => '00001',
                'potongan' => '00001',
                'netto' => '00001',
                'detail' => '00001',
                'unit' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00001',
                'dokumen' => '00001',
                'tanggal' => '00001',
                'nosp2d' => '00001',
                'tglsp2d' => '00001',
                'bruto' => '00001',
                'potongan' => '00001',
                'netto' => '00001',
                'detail' => '00001',
                'unit' => '00001'
            ]
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('monitoring_tagihan/index', $data);
        $this->load->view('template/footer');
    }
}
