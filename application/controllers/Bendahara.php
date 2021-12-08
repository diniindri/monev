<?php

use Spipu\Html2Pdf\Html2Pdf;

class Bendahara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_upload_model', 'data_upload');
        $this->load->model('Data_tagihan_model', 'tagihan');
        $this->load->model('Data_dnp_model', 'dnp');
    }

    public function index()
    {
        // menangkap data pencarian nomor tagihan
        $notagihan = $this->input->post('notagihan');

        // settingan halaman
        $config['base_url'] = base_url('bendahara/index');
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
        $this->load->view('bendahara/index', $data);
        $this->load->view('template/footer');
    }

    public function kirim($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 3
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil dikirim.');
        redirect('bendahara');
    }

    public function update($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        $data['tagihan'] = $this->tagihan->getDetailTagihan($id);

        $rules = [
            [
                'field' => 'tglsp2d',
                'label' => 'Tanggal SP2D',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nosp2d',
                'label' => 'Nomor SP2D',
                'rules' => 'required|trim|exact_length[15]'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);

        // jika validasi sukses
        if ($validation->run()) {
            $data = [
                'tglsp2d' => strtotime(htmlspecialchars($this->input->post('tglsp2d', true))),
                'nosp2d' => htmlspecialchars($this->input->post('nosp2d', true))
            ];
            // update data di database melalui model
            $this->tagihan->updateTagihan($data, $id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('bendahara');
        }

        // meload view pada tagihan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bendahara/update', $data);
        $this->load->view('template/footer');
    }

    public function payroll($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('bendahara/payroll/' . $tagihan_id . '');
        $config['total_rows'] = $this->dnp->countDnp($tagihan_id);
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian ro 
        if ($nama) {
            $data['page'] = 0;
            $offset = 0;
            $data['dnp'] = $this->dnp->findDnp($tagihan_id, $nama, $limit, $offset);
        } else {
            $data['dnp'] = $this->dnp->getDnp($tagihan_id, $limit, $offset);
        }

        // meload view pada tagihan/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bendahara/payroll', $data);
        $this->load->view('template/footer');
    }

    public function excel($tagihan_id = null)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'no');
        $sheet->setCellValue('B1', 'nama');
        $sheet->setCellValue('C1', 'nominal');
        $sheet->setCellValue('D1', 'rekening');
        $sheet->setCellValue('E1', 'nmbank');

        $pegawai = $this->dnp->getDnp($tagihan_id);

        $no = 1;
        $i = 2;
        foreach ($pegawai as $r) {
            $sheet->setCellValue('A' . $i, $no++);
            $sheet->setCellValue('B' . $i, ' ' . $r['nmrek']);
            $sheet->setCellValue('C' . $i, $r['netto']);
            $sheet->setCellValue('D' . $i, $r['rekening']);
            $sheet->setCellValue('E' . $i, $r['nmbank']);
            $i++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $i = $i - 1;
        $sheet->getStyle('A1:E' . $i)->applyFromArray($styleArray);

        // simpan datanya
        $date = date('d-m-y-' . substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "excel_" . $date . ".xlsx";
        try {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
        header("Content-Disposition: attachment; filename=" . $filename);
        unlink($filename);
        exit($content);
    }

    public function tolak($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        $data = [
            'status' => 1
        ];
        // update data di database melalui model
        $this->tagihan->updateTagihan($data, $id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditolak.');
        redirect('bendahara');
    }
}
