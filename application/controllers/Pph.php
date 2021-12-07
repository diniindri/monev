<?php

use Spipu\Html2Pdf\Html2Pdf;

class Pph extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_pph_model.php
        $this->load->model('Ref_pph_model', 'pph');
    }

    public function index()
    {
        // menangkap data pencarian ppk
        $kdgol = $this->input->post('kdgol');

        // settingan halaman
        $config['base_url'] = base_url('pph/index');
        $config['total_rows'] = $this->pph->countPph();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['kdgol'] = $kdgol;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ppk
        if ($kdgol) {
            $data['page'] = 0;
            $offset = 0;
            $data['pph'] = $this->pph->findPph($kdgol, $limit, $offset);
        } else {
            $data['pph'] = $this->pph->getPph($limit, $offset);
        }

        // meload view pada pph/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pph/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdgol',
            'label' => 'Kode Golongan',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'tarifpph',
            'label' => 'tarif PPH',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'tarifpph' => htmlspecialchars($this->input->post('tarifpph', true))
            ];
            // simpan data ke database melalui model
            $this->pph->createPph($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('pph');
        }

        // meload view pada ppk/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pph/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data ppk yang akan diubah
        $data['pph'] = $this->pph->getDetailPph($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'tarifpph' => htmlspecialchars($this->input->post('tarifpph', true))
            ];
            // update data di database melalui model
            $this->pph->updatePph($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('pph');
        }

        // meload view pada pph/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pph/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->pph->deletePph($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('pph');
    }
}
