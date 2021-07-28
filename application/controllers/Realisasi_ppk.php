<?php

use Spipu\Html2Pdf\Html2Pdf;

class Realisasi_ppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        // menangkap data pencarian nomor SPP/SPBy
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('realisasi-ppk/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['ppk'] = [
            [
                'nama' => 'BMN',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'nama' => 'KND',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'nama' => 'HUHU',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'nama' => 'PKNSI',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ],
            [
                'nama' => 'Lelang',
                'pagu' => '268,379,321,000',
                'realisasi' => '184,764,543,702',
                'sisa' => '83,614,777,298',
                'persentase' => '68.84%'
            ]
        ];

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($sk_id = null)
    {
        // // cek apakah ada sk id apa tidak
        // if (!isset($sk_id)) show_404();

        // // mengirim data id sk ke view
        // $data['sk_id'] = $sk_id;

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
        $this->load->view('realisasi_ppk/detail', $data);
        $this->load->view('template/footer');
    }
}
