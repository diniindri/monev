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
                'pagu' => '4.114.367.000',
                'realisasi' => '149.872.144',
                'sisa' => '3.964.494.856',
                'persentase' => '3,64%'
            ],
            [
                'unit' => 'KND',
                'pagu' => '1.604.153.000',
                'realisasi' => '189.019.515',
                'sisa' => '1.415.133.485',
                'persentase' => '11,78%'
            ],
            [
                'unit' => 'HUHU',
                'pagu' => '832.237.000',
                'realisasi' => '190.943.731',
                'sisa' => '641.293.269',
                'persentase' => '22,94%'
            ],
            [
                'unit' => 'PKNSI',
                'pagu' => '16.270.227.000',
                'realisasi' => '10.765.012.835',
                'sisa' => '5.505.214.165',
                'persentase' => '66,16%'
            ],
            [
                'unit' => 'Lelang',
                'pagu' => '949.950.000',
                'realisasi' => '422.185.868',
                'sisa' => '527.764.132',
                'persentase' => '44,44%'
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
                'kode' => '4701.EAC.001.002.A.521111',
                'keterangan' => 'Belanja Keperluan Perkantoran',
                'ppk' => 'Wahyu Setiadi',
                'januari' => '13.536.600'

            ],
            [
                'kode' => '4701.EAC.001.002.A.521811',
                'keterangan' => 'Belanja Barang Persediaan Barang Konsumsi',
                'ppk' => 'Wahyu Setiadi',
                'januari' => '11.657.250'
            ],
            [
                'kode' => '4701.EAC.001.002.A.522192',
                'keterangan' => 'Belanja Jasa Penanganan Pandemi COVID19',
                'ppk' => 'Wahyu Setiadi',
                'januari' => '89.500.000'
            ],
            [
                'kode' => '4701.EAD.001.002.A.523121',
                'keterangan' => 'Belanja Pemeliharaan Peralatan dan Mesin',
                'ppk' => 'Eko Hardiyanto',
                'januari' => '76.498.448'
            ],
            [
                'kode' => '4701.EAD.002.100.A.53211',
                'keterangan' => 'Belanja Modal Peralatan dan Mesin',
                'ppk' => 'Eko Hardiyanto',
                'januari' => '16.500.000'
            ]
        ];


        // meload view pada pegawai/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('realisasi_direktorat/detail', $data);
        $this->load->view('template/footer');
    }
}
