<?php

use Spipu\Html2Pdf\Html2Pdf;

class Tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_tahun_model.php
        $this->load->model('Ref_tahun_model', 'tahun');
    }

    public function index()
    {
        // menangkap data pencarian tahun
        $tahun = $this->input->post('tahun');

        // settingan halaman
        $config['base_url'] = base_url('tahun/index');
        $config['total_rows'] = $this->tahun->countTahun();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['tahun'] = $tahun;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian tahun
        if ($tahun) {
            $data['page'] = 0;
            $offset = 0;
            $data['tahun'] = $this->tahun->findTahun($tahun, $limit, $offset);
        } else {
            $data['tahun'] = $this->tahun->getTahun($limit, $offset);
        }

        // meload view pada tahun/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'tahun',
            'label' => 'Nama tahun',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tahun' => htmlspecialchars($this->input->post('tahun', true))
            ];
            // simpan data ke database melalui model
            $this->tahun->createTahun($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('tahun');
        }

        // meload view pada tahun/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data tahun yang akan diubah
        $data['tahun'] = $this->tahun->getDetailTahun($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tahun' => htmlspecialchars($this->input->post('tahun', true))
            ];
            // update data di database melalui model
            $this->tahun->updateTahun($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('tahun');
        }

        // meload view pada tahun/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->tahun->deleteTahun($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('tahun');
    }
}
