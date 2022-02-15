<?php

use Spipu\Html2Pdf\Html2Pdf;

class Pagu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_pagu_model.php
        $this->load->model('Ref_pagu_model', 'pagu');
    }

    public function index()
    {
        // menangkap data pencarian KRO
        $kro = $this->input->post('kro');

        // settingan halaman
        $config['base_url'] = base_url('pagu/index');
        $config['total_rows'] = $this->pagu->countPagu();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['kro'] = $kro;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian KRO
        if ($kro) {
            $data['page'] = 0;
            $offset = 0;
            $data['pagu'] = $this->pagu->findPagu($kro, $limit, $offset);
        } else {
            $data['pagu'] = $this->pagu->getPagu($limit, $offset);
        }

        // meload view pada pagu/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pagu/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'program',
            'label' => 'Program',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'kegiatan',
            'label' => 'Kegiatan',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'kro',
            'label' => 'KRO',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'ro',
            'label' => 'RO',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'komponen',
            'label' => 'Komponen',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'subkomponen',
            'label' => 'Subkomponen',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'akun',
            'label' => 'Akun',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'anggaran',
            'label' => 'Anggaran',
            'rules' => 'required|trim|numeric'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'program' => htmlspecialchars($this->input->post('program', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'kro' => htmlspecialchars($this->input->post('kro', true)),
                'ro' => htmlspecialchars($this->input->post('ro', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true)),
                'anggaran' => htmlspecialchars($this->input->post('anggaran', true)),
                'tahun' => sesi()['tahun'],
                'kdsatker' => sesi()['kdsatker']
            ];
            // simpan data ke database melalui model
            $this->pagu->createPagu($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('pagu');
        }

        // meload view pada pagu/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pagu/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data pagu yang akan diubah
        $data['pagu'] = $this->pagu->getDetailPagu($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'program' => htmlspecialchars($this->input->post('program', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'kro' => htmlspecialchars($this->input->post('kro', true)),
                'ro' => htmlspecialchars($this->input->post('ro', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true)),
                'anggaran' => htmlspecialchars($this->input->post('anggaran', true))
            ];
            // update data di database melalui model
            $this->pagu->updatePagu($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('pagu');
        }

        // meload view pada pagu/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pagu/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->pagu->deletePagu($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('pagu');
    }
}
