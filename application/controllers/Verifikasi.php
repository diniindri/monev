<?php

use Spipu\Html2Pdf\Html2Pdf;

class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_upload_model', 'upload');
        $this->load->model('Data_tagihan_model', 'tagihan');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('verifikasi/index');
        $config['total_rows'] = $this->viewtagihan->countTagihan(2);
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
            $data['tagihan'] = $this->viewtagihan->findTagihan($notagihan, $limit, $offset, 2);
        } else {
            $data['tagihan'] = $this->viewtagihan->getTagihan($limit, $offset, 2);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('verifikasi/index', $data);
        $this->load->view('template/footer');
    }

    public function tolak($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 0
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditolak.');
        redirect('verifikasi');
    }

    public function kirim($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 3
        ];
        $jnstagihan = $this->viewtagihan->getDetailTagihan($id)['jnstagihan'];
        $tglspm = $this->viewtagihan->getDetailTagihan($id)['tglspm'];
        $berkas03 = $this->upload->cekBerkas($id, '03');

        if ($jnstagihan == 1) {
            if ($tglspm != null) {
                // jika tgl spm sudah terisi
                // cek berkas 03
                if ($berkas03 > 0) {
                    $this->tagihan->updateTagihan($data, $id);
                    $this->session->set_flashdata('berhasil', 'Data berhasil dikirim.');
                } else {
                    $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena berkas belum lengkap.');
                }
            } else {
                // jika tgl spm belum terisi
                $this->session->set_flashdata('gagal', 'Data tidak dapat dikirim karena  tanggal spm belum terisi.');
            }
        } else {
            $this->tagihan->updateTagihan($data, $id);
            $this->session->set_flashdata('berhasil', 'Data berhasil dikirim.');
        }



        redirect('verifikasi');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // load data packing yang akan diubah
        $data['tagihan'] = $this->tagihan->getDetailTagihan($id);

        $rules = [
            [
                'field' => 'tglspm',
                'label' => 'Tanggal SPM',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tglspm' => strtotime(htmlspecialchars($this->input->post('tglspm', true)))
            ];
            // update data di database melalui model
            $this->tagihan->updateTagihan($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('verifikasi');
        }

        // meload view pada tagihan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('verifikasi/update', $data);
        $this->load->view('template/footer');
    }
}
