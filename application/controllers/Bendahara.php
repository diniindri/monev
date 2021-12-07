<?php

use Spipu\Html2Pdf\Html2Pdf;

class Bendahara extends CI_Controller
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
        $config['base_url'] = base_url('bendahara/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $tagihan = [
            [
                'jenis' => 'SPP',
                'nomor' => '00022',
                'tanggal' => '15-01-2021',
                'uraian' => 'Pembayaran belanja barang sesuai kuitansi nomor 33/C.3/P.18/I/2021 tanggal 8 Januari 2021',
                'detail' => '4701.EAC.001.002.A.522192.008.5.16',
                'bruto' => '32.800.000'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00023',
                'tanggal' => '15-01-2021',
                'uraian' => 'Pembayaran belanja barang sesuai kuitansi nomor 34/C.3/P.18/I/2021 tanggal 11 Januari 2021',
                'detail' => '4701.EAC.001.002.A.522192.008.5.16',
                'bruto' => '28.800.000'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00024',
                'tanggal' => '12-01-2021',
                'uraian' => 'Pembayaran belanja barang sesuai kuitansi nomor 1010955 tanggal 11 Januari 2021',
                'detail' => '4701.EAC.001.002.A.521111.008.5.16',
                'bruto' => '2.988.700'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00025',
                'tanggal' => '12-01-2021',
                'uraian' => 'Pembayaran belanja barang sesuai kuitansi nomor 1010938 tanggal 11 Januari 2021',
                'detail' => '4701.EAC.001.002.A.522112.008.5.16',
                'bruto' => '2.230.808'
            ],
            [
                'jenis' => 'SPP',
                'nomor' => '00033',
                'tanggal' => '21-01-2021',
                'uraian' => 'pembayaran belanja barang sesuai kuitansi nomor S-32/UN2.F1.MIKRO/KEU.01/21 tanggal 5 Januari 2021',
                'detail' => '4701.EAC.001.002.A.522192.008.5.16',
                'bruto' => '18.000.000'
            ]
        ];


        // pilih tampilan data, semua atau berdasarkan pencarian nama jenis
        if ($nomor) {
            $data['page'] = 0;
            $offset = 0;
            $data['tagihan'] = $tagihan;
        } else {
            $data['tagihan'] = $tagihan;
        }


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bendahara/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kota_asal',
            'label' => 'Kota Asal',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'kota_tujuan',
            'label' => 'Kota Tujuan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'jumlah',
            'label' => 'Nominal',
            'rules' => 'required|trim|numeric'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        // if ($validation->run()) {
        //     $data = [
        //         'kota_asal' => htmlspecialchars($this->input->post('kota_asal', true)),
        //         'kota_tujuan' => htmlspecialchars($this->input->post('kota_tujuan', true)),
        //         'jumlah' => htmlspecialchars($this->input->post('jumlah', true))
        //     ];
        //     // simpan data ke database melalui model
        //     $this->kapal->createKapal($data);
        //     $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        //     redirect('kapal');
        // }

        // meload view pada kapal/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('data_tagihan/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        // if (!isset($id)) show_404();

        // // load data kapal yang akan diubah
        // $data['kapal'] = $this->kapal->getDetailKapal($id);

        // $validation = $this->form_validation->set_rules($this->rules);

        // // jika validasi sukses
        // if ($validation->run()) {
        //     $data = [
        //         'kota_asal' => htmlspecialchars($this->input->post('kota_asal', true)),
        //         'kota_tujuan' => htmlspecialchars($this->input->post('kota_tujuan', true)),
        //         'jumlah' => htmlspecialchars($this->input->post('jumlah', true))
        //     ];
        //     // update data di database melalui model
        //     $this->kapal->updateKapal($data, $id);
        //     $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
        //     redirect('kapal');
        // }

        // meload view pada kapal/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('data_tagihan/update');
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        // if (!isset($id)) show_404();

        // // hapus data di database melalui model
        // if ($this->kapal->deleteKapal($id)) {
        //     $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        // }
        // redirect('kapal');
    }

    public function upload()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        // if ($validation->run()) {
        //     $data = [
        //         'kota_asal' => htmlspecialchars($this->input->post('kota_asal', true)),
        //         'kota_tujuan' => htmlspecialchars($this->input->post('kota_tujuan', true)),
        //         'jumlah' => htmlspecialchars($this->input->post('jumlah', true))
        //     ];
        //     // simpan data ke database melalui model
        //     $this->kapal->createKapal($data);
        //     $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        //     redirect('kapal');
        // }

        // meload view pada kapal/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('data_tagihan/upload');
        $this->load->view('template/footer');
    }

    public function dnp()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        // if ($validation->run()) {
        //     $data = [
        //         'kota_asal' => htmlspecialchars($this->input->post('kota_asal', true)),
        //         'kota_tujuan' => htmlspecialchars($this->input->post('kota_tujuan', true)),
        //         'jumlah' => htmlspecialchars($this->input->post('jumlah', true))
        //     ];
        //     // simpan data ke database melalui model
        //     $this->kapal->createKapal($data);
        //     $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        //     redirect('kapal');
        // }

        // menangkap data pencarian nama pegawai
        $nmpeg = $this->input->post('nmpeg');

        // settingan halaman
        $config['base_url'] = base_url('data-tagihan/dnp');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmpeg'] = $nmpeg;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $data['dnp'] = [
            [
                'nip' => 'SPP',
                'nmpeg' => '00001',
                'golongan' => '07-01-2021',
                'bruto' => 'Pembayaran Belanja Barang',
                'potongan' => '4700.001.01.B.524111',
                'netto' => '4,000,000',
                'rekening' => '4,000,000',
                'bank' => '4,000,000'
            ],
            [
                'nip' => 'SPP',
                'nmpeg' => '00001',
                'golongan' => '07-01-2021',
                'bruto' => 'Pembayaran Belanja Barang',
                'potongan' => '4700.001.01.B.524111',
                'netto' => '4,000,000',
                'rekening' => '4,000,000',
                'bank' => '4,000,000'
            ],
            [
                'nip' => 'SPP',
                'nmpeg' => '00001',
                'golongan' => '07-01-2021',
                'bruto' => 'Pembayaran Belanja Barang',
                'potongan' => '4700.001.01.B.524111',
                'netto' => '4,000,000',
                'rekening' => '4,000,000',
                'bank' => '4,000,000'
            ],
            [
                'nip' => 'SPP',
                'nmpeg' => '00001',
                'golongan' => '07-01-2021',
                'bruto' => 'Pembayaran Belanja Barang',
                'potongan' => '4700.001.01.B.524111',
                'netto' => '4,000,000',
                'rekening' => '4,000,000',
                'bank' => '4,000,000'
            ],
            [
                'nip' => 'SPP',
                'nmpeg' => '00001',
                'golongan' => '07-01-2021',
                'bruto' => 'Pembayaran Belanja Barang',
                'potongan' => '4700.001.01.B.524111',
                'netto' => '4,000,000',
                'rekening' => '4,000,000',
                'bank' => '4,000,000'
            ]
        ];

        // meload view pada kapal/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('data_tagihan/dnp', $data);
        $this->load->view('template/footer');
    }
}
