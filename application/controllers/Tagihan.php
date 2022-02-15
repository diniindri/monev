<?php

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        // meload file Data_tagihan_model.php
        $this->load->model('Data_tagihan_model', 'tagihan');
        $this->load->model('Ref_unit_model', 'unit');
        $this->load->model('Ref_dokumen_model', 'dokumen');
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_upload_model', 'upload');
        $this->load->model('Data_dnp_model', 'dnp');
        $this->load->model('Data_realisasi_model', 'realisasi');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('tagihan/index');
        $config['total_rows'] = $this->viewtagihan->countTagihanPpk(0);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['notagihan'] = $notagihan;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor tagihan
        if ($notagihan) {
            $data['page'] = 0;
            $offset = 0;
            $data['tagihan'] = $this->viewtagihan->findTagihanPpk($notagihan, $limit, $offset, 0);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihanPpk($limit, $offset, 0);
        }

        // meload view pada tagihan/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/index', $data);
        $this->load->view('template/footer');
    }

    // validasi inputan pada form
    private $rules1 = [
        [
            'field' => 'notagihan',
            'label' => 'Nomor Tagihan',
            'rules' => 'required|trim|numeric|exact_length[5]|is_unique[view_spp.notagihan]'
        ],
        [
            'field' => 'tgltagihan',
            'label' => 'Tanggal Tagihan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'uraian',
            'label' => 'Uraian Tagihan',
            'rules' => 'required|trim'
        ]
    ];

    private $rules2 = [
        [
            'field' => 'notagihan',
            'label' => 'Nomor Tagihan',
            'rules' => 'required|trim|numeric|exact_length[5]|is_unique[view_spby.notagihan]'
        ],
        [
            'field' => 'tgltagihan',
            'label' => 'Tanggal Tagihan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'uraian',
            'label' => 'Uraian Tagihan',
            'rules' => 'required|trim'
        ]
    ];

    private $rules3 = [
        [
            'field' => 'tgltagihan',
            'label' => 'Tanggal Tagihan',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'uraian',
            'label' => 'Uraian Tagihan',
            'rules' => 'required|trim'
        ]
    ];
    public function create()
    {
        $jnstagihan = htmlspecialchars($this->input->post('jnstagihan', true));
        if ($jnstagihan == 1) {
            $validation = $this->form_validation->set_rules($this->rules1);
        } else {
            $validation = $this->form_validation->set_rules($this->rules2);
        }
        $data['unit'] = $this->unit->getUnit();
        $data['dokumen'] = $this->dokumen->getDokumen();


        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'notagihan' => htmlspecialchars($this->input->post('notagihan', true)),
                'tgltagihan' => strtotime(htmlspecialchars($this->input->post('tgltagihan', true))),
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'jnstagihan' => $jnstagihan,
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'kddokumen' => htmlspecialchars($this->input->post('kddokumen', true)),
                'kdsatker' => $this->session->userdata('kdsatker'),
                'tahun' => $this->session->userdata('tahun'),
                'kdppk' => $this->session->userdata('kdppk')
            ];
            // simpan data ke database melalui model
            $this->tagihan->createTagihan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('tagihan');
        }

        // meload view pada tagihan/create.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/create', $data);
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data packing yang akan diubah


        $jnstagihan = htmlspecialchars($this->input->post('jnstagihan', true));
        $validation = $this->form_validation->set_rules($this->rules3);

        $data['tagihan'] = $this->tagihan->getDetailTagihan($id);
        $data['unit'] = $this->unit->getUnit();
        $data['dokumen'] = $this->dokumen->getDokumen();

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tgltagihan' => strtotime(htmlspecialchars($this->input->post('tgltagihan', true))),
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'jnstagihan' => $jnstagihan,
                'kdunit' => htmlspecialchars($this->input->post('kdunit', true)),
                'kddokumen' => htmlspecialchars($this->input->post('kddokumen', true))
            ];
            // update data di database melalui model
            $this->tagihan->updateTagihan($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('tagihan');
        }

        // meload view pada tagihan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tagihan/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->tagihan->deleteTagihan($id)) {
            $this->dnp->deletePerTagihan($id);
            $this->realisasi->deletePerTagihan($id);
            $this->upload->deletePerTagihan($id);
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('tagihan');
    }

    public function kirim($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 1
        ];

        $statusdok = $this->viewtagihan->getDetailTagihan($id)['statusdok'];
        $bruto = $this->viewtagihan->getDetailTagihan($id)['bruto'];
        $dnp = $this->dnp->sumDnp($id)['bruto'];
        $berkas01 = $this->upload->cekBerkas($id, '01');
        $berkas02 = $this->upload->cekBerkas($id, '02');
        if ($bruto > 0) {
            if ($statusdok != 0) {
                // harus cek dnp 
                if ($bruto == $dnp) {
                    // jika tagihan sama dengan dnp
                    // cek berkas 01
                    if ($berkas01 > 0) {
                        //cek berkas 02
                        if ($berkas02 > 0) {
                            $this->tagihan->updateTagihan($data, $id);
                            $this->session->set_flashdata('berhasil', 'Data berhasil dikirim.');
                        } else {
                            $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena berkas belum lengkap.');
                        }
                    } else {
                        $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena berkas belum lengkap.');
                    }
                } else {
                    // jika tagihan tidak sama dengan dnp
                    $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena total dnp tidak sama dengan total tagihan.');
                }
            } else {
                // tidak cek dnp
                // cek berkas 01
                if ($berkas01 > 0) {
                    //cek berkas 02
                    if ($berkas02 > 0) {
                        $this->tagihan->updateTagihan($data, $id);
                        $this->session->set_flashdata('berhasil', 'Data berhasil dikirim.');
                    } else {
                        $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena berkas belum lengkap.');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena berkas belum lengkap.');
                }
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena belum dilakukan input realisasi.');
        }


        redirect('tagihan');
    }
}
