<?php

use Spipu\Html2Pdf\Html2Pdf;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeShrink;
use Endroid\QrCode\Writer\PngWriter;
use GuzzleHttp\Client;

class Register extends CI_Controller
{
    private $_client;

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // meload file ref_register_model.php
        $this->load->model('Data_register_model', 'register');
        $this->load->model('Ref_nomor_model', 'nomor');
        $this->load->model('View_tagihan_model', 'viewtagihan');
        $this->load->model('Data_tagihan_model', 'tagihan');
        $this->load->model('Ref_satker_model', 'satker');
        $this->load->model('Ref_ppk_model', 'ppk');
        $this->load->helper('string');
        $this->load->helper('esign');
        $this->_client = new Client([
            'base_uri' => base_uri_esign(),
            'verify' => false,
            'auth' => auth_esign()
        ]);
    }

    public function index()
    {
        // menangkap data pencarian nomor
        $nomor = $this->input->post('nomor');

        // settingan halaman
        $config['base_url'] = base_url('register/index');
        $config['total_rows'] = $this->register->countRegister();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['nomor'] = $nomor;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nomor
        if ($nomor) {
            $data['page'] = 0;
            $offset = 0;
            $data['register'] = $this->register->findRegister($nomor, $limit, $offset);
        } else {
            $data['register'] = $this->register->getRegister($limit, $offset);
        }

        // meload view pada register/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $file = random_string('alnum', 64) . '.pdf';
        $data = [
            'tahun' => sesi()['tahun'],
            'kdsatker' => sesi()['kdsatker'],
            'kdppk' => sesi()['kdppk'],
            'nomor' => nomor()['nomor'],
            'ekstensi' => nomor()['ekstensi'],
            'tanggal' => time(),
            'jumlah' => 0,
            'status' => 0,
            'file' => $file
        ];
        // simpan data ke database melalui model
        $this->register->createRegister($data);

        // ubah nomor ref_nomor
        $this->nomor->updateNoReg(['nomor' => nomor()['next']]);

        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('register');
    }

    public function delete($id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();

        // hapus data di database melalui model
        if ($this->register->deleteRegister($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        }
        redirect('register');
    }

    public function detail($id = null)
    {
        $data['register_id'] = $id;
        $data['tagihan'] = $this->viewtagihan->getPerRegister($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/detail', $data);
        $this->load->view('template/footer');
    }

    public function create_detail($register_id = null)
    {
        $data['register_id'] = $register_id;
        $data['tagihan'] = $this->viewtagihan->getTagihanRegister();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/create_detail', $data);
        $this->load->view('template/footer');
    }

    public function pilih($tagihan_id = null, $register_id = null)
    {
        $this->tagihan->updateTagihan(['register_id' => $register_id], $tagihan_id);
        $jumlah = $this->viewtagihan->countPerRegister($register_id);
        $total = $this->viewtagihan->sumPerRegister($register_id)['total'];
        $this->register->updateRegister(['jumlah' => $jumlah, 'total' => $total], $register_id);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('register/detail/' . $register_id . '');
    }

    public function delete_detail($tagihan_id = null, $register_id = null)
    {
        $this->tagihan->updateTagihan(['register_id' => null], $tagihan_id);
        $jumlah = $this->viewtagihan->countPerRegister($register_id);
        $total = $this->viewtagihan->sumPerRegister($register_id)['total'];
        $this->register->updateRegister(['jumlah' => $jumlah, 'total' => $total], $register_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('register/detail/' . $register_id . '');
    }

    public function preview($id = null)
    {
        $data['register'] = $this->register->getDetailRegister($id);
        $data['satker'] = $this->satker->getNamaSatker();
        $data['ppk'] = $this->ppk->getNamaPpk();
        $data['tagihan'] = $this->viewtagihan->getPerRegister($id);

        // membuat qrcode
        // $file = random_string('alnum', 64) . '.pdf';
        // $qr = base_url() .  'public/downloadcode/' . $file;
        // $writer = new PngWriter();
        // $qrCode = QrCode::create($qr)
        //     ->setEncoding(new Encoding('UTF-8'))
        //     ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        //     ->setSize(100)
        //     ->setMargin(0)
        //     ->setRoundBlockSizeMode(new RoundBlockSizeModeShrink())
        //     ->setForegroundColor(new Color(0, 0, 0))
        //     ->setBackgroundColor(new Color(255, 255, 255));
        // $logo = Logo::create(FCPATH .  'assets/img/kemenkeu.png')
        //     ->setResizeToWidth(20);
        // $result = $writer->write($qrCode, $logo);
        // $data['uri'] = $result->getDataUri();

        // membuat file pdf
        ob_start();
        $this->load->view('register/surat', $data);
        $html = ob_get_clean();
        $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 10, 10));
        $html2pdf->addFont('Arial');
        $html2pdf->pdf->SetTitle('Register Tagihan');
        $html2pdf->writeHTML($html);
        $html2pdf->output('register_tagihan.pdf');
        // $html2pdf->output(FCPATH .  'public/download/' . $file, 'F');

        // membuat data cetak
        // $data_cetak = [
        //     'tahun' => date('Y'),
        //     'nip_asal' => $nip,
        //     'nip_tujuan' => $data['profil']['nip_ttd_skp'],
        //     'nama_tujuan' => $data['profil']['nama_ttd_skp'],
        //     'jenis' => 'skp',
        //     'nomor' => $data['no_urut_skp'] . $data['ext_skp'],
        //     'tanggal' => $data['tanggal'],
        //     'tujuan' => $nama,
        //     'perihal' => 'Permohonan Surat Keterangan Penghasilan Bulan ' . $data['bulan']['bulan'] . ' ' . $thn,
        //     'file' => $file,
        //     'date' => '',
        //     'id_dokumen' => '',
        //     'status' => 0
        // ];
        // $this->cetak->createDataCetak($data_cetak);
        redirect('register');
    }

    public function esign($id = null)
    {
        // validasi passphrase
        $rules = [[
            'field' => 'passphrase',
            'label' => 'Passphrase',
            'rules' => 'required|trim'
        ]];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {

            $data['register'] = $this->register->getDetailRegister($id);
            $data['satker'] = $this->satker->getNamaSatker();
            $data['ppk'] = $this->ppk->getNamaPpk();
            $data['tagihan'] = $this->viewtagihan->getPerRegister($id);
            // $cetak = $this->register->getDetailRegister($id);

            // membuat file pdf
            // membuat qrcode
            $file = $data['register']['file'];
            $qr = base_url() .  'public/downloadcode/' . $file;
            $writer = new PngWriter();
            $qrCode = QrCode::create($qr)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(100)
                ->setMargin(0)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeShrink())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));
            $logo = Logo::create(FCPATH .  'assets/img/kemenkeu_color.png')
                ->setResizeToWidth(20);
            $result = $writer->write($qrCode, $logo);
            $data['uri'] = $result->getDataUri();
            // membuat file pdf
            ob_start();
            $this->load->view('register/surat_esign', $data);
            $html = ob_get_clean();
            $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 10, 10));
            $html2pdf->addFont('Arial');
            $html2pdf->pdf->SetTitle('Register Tagihan');
            $html2pdf->writeHTML($html);
            $html2pdf->output(FCPATH .  'public/download/' . $file, 'F');

            // mulai proses esign
            try {
                $response = $this->_client->request('POST', 'pdf', [
                    'query' => [
                        'nik' => $this->session->userdata('nik'),
                        'passphrase' => htmlspecialchars($this->input->post('passphrase', true)),
                        'jenis_dokumen' => 'Register Tagihan',
                        'nomor' => $data['register']['nomor'] . $data['register']['ekstensi'],
                        'tujuan' => 'Pejabat Penandatangan SPM',
                        'perihal' => 'Register Tagihan',
                        'info' => 'Register Tagihan',
                        'tampilan' => 'invisible'
                    ],
                    'multipart' => [
                        [
                            'name'     => 'file',
                            'contents' => fopen(FCPATH .  'public/download/' . $data['register']['file'], 'r'),
                            'filename' => $data['register']['file']
                        ]
                    ]
                ]);
                $result_header = $response->getHeaders();
                $result_body = $response->getBody()->getContents();
                $data = [
                    'date' => $result_header['Date'][0],
                    'id_dokumen' => $result_header['id_dokumen'][0],
                    'status' => 1
                ];
                $this->register->updateRegister($data, $id);
                $this->tagihan->updateTagihanRegister(['status' => 2], $id);

                // simpan file hasil esign
                header('Content-Type:application/pdf');
                header('Content-Disposition:attachment;filename=' . $data['register']['file'] . '');
                file_put_contents(FCPATH .  'public/downloadcode/' . $data['register']['file'], $result_body);
                $this->session->set_flashdata('success', 'Proses penandatanganan berhasil!');
                redirect('register');
            } catch (GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
                $responseBodyAsString = json_decode($response->getBody()->getContents(), true);
                $this->session->set_flashdata('error', $responseBodyAsString['error']);
                redirect('register');
            }
            // selesai esign
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('register/esign');
        $this->load->view('template/footer');
    }
}
