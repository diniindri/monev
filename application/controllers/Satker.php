<?php

use Spipu\Html2Pdf\Html2Pdf;

class Satker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_satker_model.php
        $this->load->model('Ref_satker_model', 'satker');
    }

    public function index()
    {
        // menangkap data pencarian Satker
        $nmsatker = $this->input->post('nmsatker');

        // settingan halaman
        $config['base_url'] = base_url('satker/index');
        $config['total_rows'] = $this->satker->countSatker();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmsatker'] = $nmsatker;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian satker
        if ($nmsatker) {
            $data['page'] = 0;
            $offset = 0;
            $data['satker'] = $this->satker->findSatker($nmsatker, $limit, $offset);
        } else {
            $data['satker'] = $this->satker->getSatker($limit, $offset);
        }

        // meload view pada satker/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('satker/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdsatker',
            'label' => 'Kode Satker',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmsatker',
            'label' => 'Nama Satker',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nmsatker' => htmlspecialchars($this->input->post('nmsatker', true))
            ];
            // simpan data ke database melalui model
            $this->satker->createSatker($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('satker');
        }

        // meload view pada satker/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('satker/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data satker yang akan diubah
        $data['satker'] = $this->satker->getDetailSatker($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nmsatker' => htmlspecialchars($this->input->post('nmsatker', true))
            ];
            // update data di database melalui model
            $this->satker->updateSatker($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('satker');
        }

        // meload view pada satker/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('satker/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->satker->deleteSatker($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('satker');
    }
}
