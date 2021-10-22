<?php

use Spipu\Html2Pdf\Html2Pdf;

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_unit_model.php
        $this->load->model('Ref_unit_model', 'unit');
    }

    public function index()
    {
        // menangkap data pencarian unit
        $nmunit = $this->input->post('nmunit');

        // settingan halaman
        $config['base_url'] = base_url('unit/index');
        $config['total_rows'] = $this->unit->countUnit();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmunit'] = $nmunit;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian unit
        if ($nmunit) {
            $data['page'] = 0;
            $offset = 0;
            $data['unit'] = $this->unit->findUnit($nmunit, $limit, $offset);
        } else {
            $data['unit'] = $this->unit->getUnit($limit, $offset);
        }

        // meload view pada unit/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdunit',
            'label' => 'Kode unit',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmunit',
            'label' => 'Nama unit',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'nmunit' => htmlspecialchars($this->input->post('nmunit', true))
            ];
            // simpan data ke database melalui model
            $this->unit->createUnit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('unit');
        }

        // meload view pada unit/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data unit yang akan diubah
        $data['unit'] = $this->unit->getDetailUnit($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'nmunit' => htmlspecialchars($this->input->post('nmunit', true))
            ];
            // update data di database melalui model
            $this->unit->updateUnit($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('unit');
        }

        // meload view pada unit/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->unit->deleteUnit($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('unit');
    }
}
