<?php

use Spipu\Html2Pdf\Html2Pdf;

class Ppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_ppk_model.php
        $this->load->model('Ref_ppk_model', 'ppk');
    }

    public function index()
    {
        // menangkap data pencarian ppk
        $nmppk = $this->input->post('nmppk');

        // settingan halaman
        $config['base_url'] = base_url('ppk/index');
        $config['total_rows'] = $this->ppk->countPpk();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nmppk'] = $nmppk;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ppk
        if ($nmppk) {
            $data['page'] = 0;
            $offset = 0;
            $data['ppk'] = $this->ppk->findPpk($nmppk, $limit, $offset);
        } else {
            $data['ppk'] = $this->ppk->getPpk($limit, $offset);
        }

        // meload view pada ppk/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ppk/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'kdppk',
            'label' => 'Kode PPK',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmppk',
            'label' => 'Nama PPK',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'nip',
            'label' => 'NIP',
            'rules' => 'required|trim|numeric|exact_length[18]'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdppk' => htmlspecialchars($this->input->post('kdppk', true)),
                'nmppk' => htmlspecialchars($this->input->post('nmppk', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'tahun' => sesi()['tahun'],
                'kdsatker' => sesi()['kdsatker']
            ];
            // simpan data ke database melalui model
            $this->ppk->createPpk($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('ppk');
        }

        // meload view pada ppk/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ppk/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data ppk yang akan diubah
        $data['ppk'] = $this->ppk->getDetailPpk($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'kdppk' => htmlspecialchars($this->input->post('kdppk', true)),
                'nmppk' => htmlspecialchars($this->input->post('nmppk', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true))
            ];
            // update data di database melalui model
            $this->ppk->updatePpk($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('ppk');
        }

        // meload view pada ppk/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ppk/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->ppk->deletePpk($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('ppk');
    }
}
