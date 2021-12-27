<?php

use Spipu\Html2Pdf\Html2Pdf;

class Nondjkn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_nondjkn_model.php
        $this->load->model('Ref_nondjkn_model', 'nondjkn');
    }

    public function index()
    {
        // menangkap data pencarian pegawai non djkn
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('nondjkn/index');
        $config['total_rows'] = $this->nondjkn->countNondjkn();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian pegawai non djkn
        if ($nama) {
            $data['page'] = 0;
            $offset = 0;
            $data['nondjkn'] = $this->nondjkn->findNondjkn($nama, $limit, $offset);
        } else {
            $data['nondjkn'] = $this->nondjkn->getNondjkn($limit, $offset);
        }

        // meload view pada nondjkn/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nondjkn/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules = [
        [
            'field' => 'nip',
            'label' => 'NIP/NIK/NPWP',
            'rules' => 'required|trim|numeric|max_length[18]'
        ],
        [
            'field' => 'nama',
            'label' => 'Nama Pegawai',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'kdgol',
            'label' => 'Kode Golongan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'rekening',
            'label' => 'Nomor Rekening',
            'rules' => 'required|trim|numeric'
        ],
        [
            'field' => 'nmbank',
            'label' => 'Nama Bank',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'nmrek',
            'label' => 'Nama rekening',
            'rules' => 'required|trim'
        ]
    ];

    public function create()
    {
        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'rekening' => htmlspecialchars($this->input->post('rekening', true)),
                'nmbank' => htmlspecialchars($this->input->post('nmbank', true)),
                'nmrek' => htmlspecialchars($this->input->post('nmrek', true))
            ];
            // simpan data ke database melalui model
            $this->nondjkn->createNondjkn($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('nondjkn');
        }

        // meload view pada nondjkn/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nondjkn/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data ppk yang akan diubah
        $data['nondjkn'] = $this->nondjkn->getDetailNondjkn($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'rekening' => htmlspecialchars($this->input->post('rekening', true)),
                'nmbank' => htmlspecialchars($this->input->post('nmbank', true)),
                'nmrek' => htmlspecialchars($this->input->post('nmrek', true))
            ];
            // update data di database melalui model
            $this->nondjkn->updateNondjkn($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('nondjkn');
        }

        // meload view pada nondjkn/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nondjkn/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->nondjkn->deleteNondjkn($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('nondjkn');
    }
}
