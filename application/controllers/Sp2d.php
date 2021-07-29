<?php

use Spipu\Html2Pdf\Html2Pdf;

class Sp2d extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        // menangkap data pencarian nomor SPP/SPBy
        $nospm = $this->input->post('nospm');

        // settingan halaman
        $config['base_url'] = base_url('sp2d/index');
        $config['total_rows'] = 10;
        $config['per_page'] = 5;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nospm'] = $nospm;
        $limit = $config["per_page"];
        $offset = $data['page'];

        $tagihan = [
            [
                'nospm' => '00022',
                'tglspm' => '15/01/2021',
                'nosp2d' => '210191302000303',
                'tglsp2d' => '18/01/2021',
                'bruto' => '32.800.000'
            ],
            [
                'nospm' => '00023',
                'tglspm' => '15/01/2021',
                'nosp2d' => '210191302000302',
                'tglsp2d' => '18/01/2021',
                'bruto' => '28.800.000'
            ],
            [
                'nospm' => '00024',
                'tglspm' => '12/01/2021',
                'nosp2d' => '210191301000142',
                'tglsp2d' => '14/01/2021',
                'bruto' => '2.988.700'
            ],
            [
                'nospm' => '00025',
                'tglspm' => '12/01/2021',
                'nosp2d' => '210191301000139',
                'tglsp2d' => '14/01/2021',
                'bruto' => '2.230.808'
            ],
            [
                'nospm' => '00033',
                'tglspm' => '21/01/2021',
                'nosp2d' => '210191303000155',
                'tglsp2d' => '25/01/2021',
                'bruto' => '18.000.000'
            ]
        ];


        // pilih tampilan data, semua atau berdasarkan pencarian nama jenis
        if ($nospm) {
            $data['page'] = 0;
            $offset = 0;
            $data['tagihan'] = $tagihan;
        } else {
            $data['tagihan'] = $tagihan;
        }


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('sp2d/index', $data);
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
        $this->load->view('sp2d/update');
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

    public function input()
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
        $this->load->view('sp2d/input');
        $this->load->view('template/footer');
    }
}
