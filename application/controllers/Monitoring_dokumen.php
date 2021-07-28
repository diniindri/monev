<?php

use Spipu\Html2Pdf\Html2Pdf;

class Monitoring_dokumen extends CI_Controller
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
        $config['base_url'] = base_url('monitoring-dokumen/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['dokumen'] = [
            [
                'jenis' => 'SPP',
                'nomor' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00002'
            ],
            [
                'jenis' => 'SPBy',
                'nomor' => '00001'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00003'
            ]
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('monitoring_dokumen/index', $data);
        $this->load->view('template/footer');
    }
}
