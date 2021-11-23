<?php

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        // meload file Data_tagihan_model.php
        $this->load->model('Data_tagihan_model', 'tagihan');
        $this->load->model('Ref_unit_model', 'unit');
        $this->load->model('Ref_dokumen_model', 'dokumen');
        $this->load->model('View_tagihan_model', 'viewtagihan');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('tagihan/index');
        $config['total_rows'] = $this->tagihan->countTagihan();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['notagihan'] = $notagihan;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor tagihan
        if ($notagihan) {
            $data['page'] = 0;
            $offset = 0;
            $data['tagihan'] = $this->viewtagihan->findTagihan($notagihan, $limit, $offset);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihan($limit, $offset);
        }

        // meload view pada tagihan/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'notagihan',
            'label' => 'Nomor Tagihan',
            'rules' => 'required|trim|exact_length[5]'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);
        $data['unit'] = $this->unit->getUnit();
        $data['dokumen'] = $this->dokumen->getDokumen();


        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'notagihan' => htmlspecialchars($this->input->post('notagihan', true)),
                'jnstagihan' => htmlspecialchars($this->input->post('jnstagihan', true)),
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'kddokumen' => htmlspecialchars($this->input->post('kddokumen', true))
            ];
            // simpan data ke database melalui model
            $this->tagihan->createTagihan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('tagihan');
        }

        // meload view pada tagihan/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/create', $data);
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data packing yang akan diubah
        $data['tagihan'] = $this->tagihan->getDetailTagihan($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'notagihan' => htmlspecialchars($this->input->post('notagihan', true)),
                'jnstagihan' => htmlspecialchars($this->input->post('jnstagihan', true)),
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'kddokumen' => htmlspecialchars($this->input->post('kddokumen', true))
            ];
            // update data di database melalui model
            $this->tagihan->updateTagihan($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('tagihan');
        }

        // meload view pada tagihan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->tagihan->deleteTagihan($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('tagihan');
    }

    public function upload()
    {
        $validation = $this->form_validation->set_rules($this->rules);


        // meload view pada kapal/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/upload');
        $this->load->view('template/footer');
    }

    public function dnp()
    {
        $validation = $this->form_validation->set_rules($this->rules);


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
                'nip' => '196902241989121001',
                'nmpeg' => 'I KETUT ARIMBAWA',
                'golongan' => 'IV.b',
                'bruto' => '2.532.000',
                'potongan' => '0',
                'netto' => '2.532.000',
                'rekening' => '0126466638',
                'bank' => 'BNI'
            ],
            [
                'nip' => '198010172002122001',
                'nmpeg' => 'TITIK WIJAYANTI',
                'golongan' => 'IV.a',
                'bruto' => '1.832.000',
                'potongan' => '0',
                'netto' => '1.832.000',
                'rekening' => '0009102196',
                'bank' => 'BNI'
            ],
            [
                'nip' => '198106222004121001',
                'nmpeg' => 'HENDRA GUNAWAN',
                'golongan' => 'III.c',
                'bruto' => '1.832.000',
                'potongan' => '0',
                'netto' => '1.832.000',
                'rekening' => '050701017039507',
                'bank' => 'BRI'
            ],
            [
                'nip' => '198408282003121003',
                'nmpeg' => 'ANDI MUJAHID DARWIS',
                'golongan' => 'III.b',
                'bruto' => '1.832.000',
                'potongan' => '0',
                'netto' => '1.832.000',
                'rekening' => '0212750271',
                'bank' => 'BNI'
            ],
            [
                'nip' => '199406142016122001',
                'nmpeg' => 'DEWANTY ASMANINGRUM',
                'golongan' => 'II.c',
                'bruto' => '1.832.000',
                'potongan' => '0',
                'netto' => '1.832.000',
                'rekening' => '050701017928502',
                'bank' => 'BRI'
            ]
        ];

        // meload view pada kapal/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/dnp', $data);
        $this->load->view('template/footer');
    }
}
