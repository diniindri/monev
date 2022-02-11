<?php

use Spipu\Html2Pdf\Html2Pdf;

class Nomor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_nomor_model.php
        $this->load->model('Ref_nomor_model', 'nomor');
    }

    public function index()
    {
        // menangkap data pencarian nomor
        $nomor = $this->input->post('nomor');

        // settingan halaman
        $config['base_url'] = base_url('nomor/index');
        $config['total_rows'] = $this->nomor->countNomor();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor
        if ($nomor) {
            $data['page'] = 0;
            $offset = 0;
            $data['nomor'] = $this->nomor->findNomor($nomor, $limit, $offset);
        } else {
            $data['nomor'] = $this->nomor->getNomor($limit, $offset);
        }

        // meload view pada nomor/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nomor/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'nomor',
            'label' => 'Nomor',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'ekstensi',
            'label' => 'Ekstensi',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'kdsatker',
            'label' => 'Kode Satker',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'nomor' => htmlspecialchars($this->input->post('nomor', true)),
                'ekstensi' => htmlspecialchars($this->input->post('ekstensi', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true))
            ];
            // simpan data ke database melalui model
            $this->nomor->createNomor($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('nomor');
        }

        // meload view pada nomor/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nomor/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data nomor yang akan diubah
        $data['nomor'] = $this->nomor->getDetailNomor($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'nomor' => htmlspecialchars($this->input->post('nomor', true)),
                'ekstensi' => htmlspecialchars($this->input->post('ekstensi', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true))
            ];
            // update data di database melalui model
            $this->nomor->updateNomor($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('nomor');
        }

        // meload view pada nomor/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nomor/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->nomor->deleteNomor($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('nomor');
    }
}
