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
                'nomor' => '00022',
                'dokumen' => 'Non Kontraktual',
                'tanggal' => '15/01/2021',
                'nosp2d' => '210191302000303',
                'tglsp2d' => '18/01/2021',
                'bruto' => '  32.800.000 ',
                'potongan' => '0',
                'netto' => '32.800.000',
                'detail' => '4701.EAC.001.002.A.522192',
                'unit' => 'Umum'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00023',
                'dokumen' => 'Non Kontraktual',
                'tanggal' => '15/01/2021',
                'nosp2d' => '210191302000302',
                'tglsp2d' => '18/01/2021',
                'bruto' => '28.800.000',
                'potongan' => '0',
                'netto' => '28.800.000',
                'detail' => '4701.EAC.001.002.A.522192',
                'unit' => 'Umum'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00024',
                'dokumen' => 'Non Kontraktual',
                'tanggal' => '12/01/2021',
                'nosp2d' => '210191301000142',
                'tglsp2d' => '14/01/2021',
                'bruto' => '2.988.700',
                'potongan' => '0',
                'netto' => '2.988.700',
                'detail' => '4701.EAC.001.002.A.521111',
                'unit' => 'Umum'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00025',
                'dokumen' => 'Non Kontraktual',
                'tanggal' => '12/01/2021',
                'nosp2d' => '210191301000139',
                'tglsp2d' => '14/01/2021',
                'bruto' => '2.230.808',
                'potongan' => '0',
                'netto' => '2.230.808',
                'detail' => '4701.EAC.001.002.A.522112',
                'unit' => 'Umum'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00033',
                'dokumen' => 'Non Kontraktual',
                'tanggal' => '21/01/2021',
                'nosp2d' => '210191303000155',
                'tglsp2d' => '25/01/2021',
                'bruto' => '18.000.000',
                'potongan' => '0',
                'netto' => '18.000.000',
                'detail' => '4701.EAC.001.002.A.522192',
                'unit' => 'Umum'
            ]
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('monitoring_tagihan/index', $data);
        $this->load->view('template/footer');
    }
}
