<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_direktorat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        // menangkap data pencarian nomor SPP/SPBy
        $unit = $this->input->post('unit');

        // settingan halaman
        $config['base_url'] = base_url('realisasi-direktorat/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['unit'] = $unit;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['direktorat'] = [
            [
                'unit' => 'BMN',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'unit' => 'KND',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'unit' => 'HUHU',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'unit' => 'PKNSI',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'unit' => 'Lelang',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ]
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($bln = null)
    {
        if (!isset($bln)) $bln = '01';

        // menangkap data pencarian nmpeg
        $kode = $this->input->post('kode');

        // settingan halaman
        $config['base_url'] = base_url('realisasi-direktorat/detail/');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['kode'] = $kode;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['bulan'] = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
        ];

        $data['bln'] = $bln;

        $data['detail'] = [
            [
                'kode' => 'BMN',
                'keterangan' => '268,379,321,000',
                'januari' => '184,764,543,702',
                'februari' => '83,614,777,298',
                'maret' => '68.84%',
                'april' => '68.84%',
                'mei' => '68.84%',
                'juni' => '68.84%',
                'juli' => '68.84%',
                'agustus' => '68.84%',
                'september' => '68.84%',
                'oktober' => '68.84%',
                'november' => '68.84%',
                'desember' => '68.84%'
            ],
            [
                'kode' => 'BMN',
                'keterangan' => '268,379,321,000',
                'januari' => '184,764,543,702',
                'februari' => '83,614,777,298',
                'maret' => '68.84%',
                'april' => '68.84%',
                'mei' => '68.84%',
                'juni' => '68.84%',
                'juli' => '68.84%',
                'agustus' => '68.84%',
                'september' => '68.84%',
                'oktober' => '68.84%',
                'november' => '68.84%',
                'desember' => '68.84%'
            ],
            [
                'kode' => 'BMN',
                'keterangan' => '268,379,321,000',
                'januari' => '184,764,543,702',
                'februari' => '83,614,777,298',
                'maret' => '68.84%',
                'april' => '68.84%',
                'mei' => '68.84%',
                'juni' => '68.84%',
                'juli' => '68.84%',
                'agustus' => '68.84%',
                'september' => '68.84%',
                'oktober' => '68.84%',
                'november' => '68.84%',
                'desember' => '68.84%'
            ],
            [
                'kode' => 'BMN',
                'keterangan' => '268,379,321,000',
                'januari' => '184,764,543,702',
                'februari' => '83,614,777,298',
                'maret' => '68.84%',
                'april' => '68.84%',
                'mei' => '68.84%',
                'juni' => '68.84%',
                'juli' => '68.84%',
                'agustus' => '68.84%',
                'september' => '68.84%',
                'oktober' => '68.84%',
                'november' => '68.84%',
                'desember' => '68.84%'
            ],
            [
                'kode' => 'BMN',
                'keterangan' => '268,379,321,000',
                'januari' => '184,764,543,702',
                'februari' => '83,614,777,298',
                'maret' => '68.84%',
                'april' => '68.84%',
                'mei' => '68.84%',
                'juni' => '68.84%',
                'juli' => '68.84%',
                'agustus' => '68.84%',
                'september' => '68.84%',
                'oktober' => '68.84%',
                'november' => '68.84%',
                'desember' => '68.84%'
            ]
        ];


        // meload view pada pegawai/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/detail', $data);
        $this->load->view('template/footer');
    }
}
