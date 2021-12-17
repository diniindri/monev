<?php

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        $this->load->model('Data_upload_model', 'data_upload');
        $this->load->model('Ref_berkas_model', 'berkas');
    }

    public function index($tagihan_id = null, $asal = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;
        $data['asal'] = $asal;

        $data['upload'] = $this->data_upload->getUpload($tagihan_id);


        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('upload/index', $data);
        $this->load->view('template/footer');
    }

    public function create($tagihan_id = null, $asal = null)
    {
        if (!isset($tagihan_id)) show_404();
        $data['tagihan_id'] = $tagihan_id;
        $data['berkas'] = $this->berkas->getBerkas();
        $data['asal'] = $asal;

        $validation = $this->form_validation->set_rules('file', 'File', 'trim');
        if ($validation->run() && $_FILES) {
            //upload file pdf
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['remove_spaces'] = TRUE;
                $config['max_size']     = '10000';
                $config['encrypt_name']     = TRUE;
                $config['upload_path'] = 'assets/files/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file', $new_file);
                    //simpan data ke tabel data_upload
                    $data = [
                        'tagihan_id' => $tagihan_id,
                        'kdberkas' => htmlspecialchars($this->input->post('kdberkas', true)),
                        'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                        'date_created' => time()
                    ];
                    $this->data_upload->createUpload($data);
                    $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
                    redirect('upload/index/' . $tagihan_id . '/' . $asal . '');
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('pesan_gagal', 'Upload file gagal, mohon menggunakan format file pdf dan ukuran maksimal 10 MB!');
                    redirect('upload/index/' . $tagihan_id . '/' . $asal . '');
                }
            }
        }

        // form
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('upload/create', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null, $tagihan_id = null, $file = null, $asal = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data['asal'] = $asal;
        // hapus data di database melalui model
        if ($this->data_upload->deleteUpload($id)) {
            unlink('assets/files/' . $file);
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('upload/index/' . $tagihan_id . '/' . $asal . '');
    }
}
