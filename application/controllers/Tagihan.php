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
        $config['total_rows'] = $this->viewtagihan->countTagihan(0);
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
            $data['tagihan'] = $this->viewtagihan->findTagihan($notagihan, $limit, $offset, 0);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihan($limit, $offset, 0);
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
        ],
        [
            'field' => 'tgltagihan',
            'label' => 'Tanggal Tagihan',
            'rules' => 'required|trim'
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
                'tgltagihan' => strtotime(htmlspecialchars($this->input->post('tgltagihan', true))),
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
                'tgltagihan' => strtotime(htmlspecialchars($this->input->post('tgltagihan', true))),
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

    public function kirim($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 1
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil dikirim.');
        redirect('tagihan');
    }
}
