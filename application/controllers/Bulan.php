<?php

use Spipu\Html2Pdf\Html2Pdf;

class Bulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_ppk_model.php
        $this->load->model('Ref_bulan_model', 'bulan');
    }

    public function index()
    {
        // menangkap data pencarian ppk
        $nmbulan = $this->input->post('nmbulan');

        // settingan halaman
        $config['base_url'] = base_url('bulan/index');
        $config['total_rows'] = $this->bulan->countBulan();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmbulan'] = $nmbulan;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ppk
        if ($nmbulan) {
            $data['page'] = 0;
            $offset = 0;
            $data['bulan'] = $this->bulan->findBulan($nmbulan, $limit, $offset);
        } else {
            $data['bulan'] = $this->bulan->getBulan($limit, $offset);
        }

        // meload view pada bulan/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bulan/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdbulan',
            'label' => 'Kode bulan',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmbulan',
            'label' => 'Nama bulan',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdbulan' => htmlspecialchars($this->input->post('kdbulan', true)),
                'nmbulan' => htmlspecialchars($this->input->post('nmbulan', true))
            ];
            // simpan data ke database melalui model
            $this->bulan->createBulan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('bulan');
        }

        // meload view pada bulan/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bulan/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data bulan yang akan diubah
        $data['bulan'] = $this->bulan->getDetailBulan($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdbulan' => htmlspecialchars($this->input->post('kdbulan', true)),
                'nmbulan' => htmlspecialchars($this->input->post('nmbulan', true))
            ];
            // update data di database melalui model
            $this->bulan->updateBulan($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('bulan');
        }

        // meload view pada bulan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bulan/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->ppk->deleteBulan($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('bulan');
    }
}
