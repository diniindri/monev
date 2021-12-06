<?php

use Spipu\Html2Pdf\Html2Pdf;

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_berkas_model.php
        $this->load->model('Ref_berkas_model', 'berkas');
    }

    public function index()
    {
        // menangkap data pencarian ppk
        $nmberkas = $this->input->post('nmberkas');

        // settingan halaman
        $config['base_url'] = base_url('berkas/index');
        $config['total_rows'] = $this->berkas->countBerkas();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmberkas'] = $nmberkas;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian berkas
        if ($nmberkas) {
            $data['page'] = 0;
            $offset = 0;
            $data['berkas'] = $this->berkas->findBerkas($nmberkas, $limit, $offset);
        } else {
            $data['berkas'] = $this->berkas->getBerkas($limit, $offset);
        }

        // meload view pada berkas/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('berkas/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdberkas',
            'label' => 'Kode Berkas',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmberkas',
            'label' => 'Nama Berkas',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdberkas' => htmlspecialchars($this->input->post('kdberkas', true)),
                'nmberkas' => htmlspecialchars($this->input->post('nmberkas', true))
            ];
            // simpan data ke database melalui model
            $this->berkas->createBerkas($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('berkas');
        }

        // meload view pada berkas/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('berkas/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data ppk yang akan diubah
        $data['berkas'] = $this->berkas->getDetailBerkas($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdberkas' => htmlspecialchars($this->input->post('kdberkas', true)),
                'nmberkas' => htmlspecialchars($this->input->post('nmberkas', true))
            ];
            // update data di database melalui model
            $this->berkas->updateBerkas($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('berkas');
        }

        // meload view pada berkas/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('berkas/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->berkas->deleteBerkas($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('berkas');
    }
}
