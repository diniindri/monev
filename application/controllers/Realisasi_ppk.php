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
                'nama' => 'Wielly Prasekti',
                'pagu' => '4.164.606.000',
                'realisasi' => '146.919.144',
                'sisa' => '4.017.686.856',
                'persentase' => '3,53%'
            ],
            [
                'nama' => 'Nandang Supriyadi',
                'pagu' => '1.535.053.000',
                'realisasi' => '189.019.515',
                'sisa' => '1.346.033.485',
                'persentase' => '12,31%'
            ],
            [
                'nama' => 'Eny Susanti',
                'pagu' => '1.213.589.000',
                'realisasi' => '196.447.731',
                'sisa' => '1.017.141.269',
                'persentase' => '16,19%'
            ],
            [
                'nama' => 'Anwar Sulaiman',
                'pagu' => '5.497.094.000',
                'realisasi' => '1.350.506.953',
                'sisa' => '4.146.587.047',
                'persentase' => '24,57%'
            ],
            [
                'nama' => 'Yuzuardi Haban',
                'pagu' => '12.153.916.000',
                'realisasi' => '9.616.778.759',
                'sisa' => '2.537.137.241',
                'persentase' => '79,12%'
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
                'kode' => '4701.EAC.001.002.A.521111',
                'keterangan' => 'Belanja Keperluan Perkantoran',
                'unit' => 'umum',
                'januari' => '13.536.600'
            ],
            [
                'kode' => '4701.EAC.001.002.A.521811',
                'keterangan' => 'Belanja Barang Persediaan Barang Konsumsi',
                'unit' => 'umum',
                'januari' => '11.657.250'
            ],
            [
                'kode' => '4701.EAC.001.002.A.522192',
                'keterangan' => 'Belanja Jasa Penanganan Pandemi COVID19',
                'unit' => 'umum',
                'januari' => '89.500.000'
            ],
            [
                'kode' => '4701.EAD.001.002.A.523121',
                'keterangan' => 'Belanja Pemeliharaan Peralatan dan Mesin',
                'unit' => 'umum',
                'januari' => '76.498.448'
            ],
            [
                'kode' => '4701.EAD.002.100.A.53211',
                'keterangan' => 'Belanja Modal Peralatan dan Mesin',
                'unit' => 'umum',
                'januari' => '16.500.000'
            ]
        ];


        // meload view pada pegawai/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_ppk/detail', $data);
        $this->load->view('template/footer');
    }
}
