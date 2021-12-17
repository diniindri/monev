<?php

use Spipu\Html2Pdf\Html2Pdf;

class Dnp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // is_level();
        $this->load->model('Data_dnp_model', 'dnp');
        $this->load->model('Ref_pph_model', 'pph');
        $this->load->model('View_tagihan_model', 'viewtagihan');
    }

    public function index($tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id tagihan ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('dnp/index/' . $tagihan_id . '');
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

        // meload view pada realisasi/index.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dnp/index', $data);
        $this->load->view('template/footer');
    }

    public function tarik_pegawai_gaji($tagihan_id = null)
    {
        // cek apakah ada rute id apa tidak
        if (!isset($tagihan_id)) show_404();

        // mengirim data id sk ke view
        $data['tagihan_id'] = $tagihan_id;

        // menangkap data pencarian nama
        $nama = $this->input->post('nama');

        // settingan halaman
        $config['base_url'] = base_url('dnp/tarik-pegawai-gaji/' . $tagihan_id . '');
        $config['total_rows'] = $this->dnp->countPegawaiGaji();
        $config['per_page'] = 10;
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data['nama'] = $nama;
        $limit = $config["per_page"];
        $offset = $data['page'];

        // pilih tampilan data, semua atau berdasarkan pencarian nama
        if ($nama) {
            $data['page'] = 0;
            $offset = 0;
            $data['pegawai'] = $this->dnp->findPegawaiGaji($nama, $limit, $offset);
        } else {
            $id = null;
            $data['pegawai'] = $this->dnp->getPegawaiGaji($id, $limit, $offset);
        }

        // meload view pada pegawai/tarik_pegawai_gaji.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dnp/tarik_pegawai_gaji', $data);
        $this->load->view('template/footer');
    }

    public function pilih_pegawai_gaji($nip = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($nip)) show_404();
        if (!isset($tagihan_id)) show_404();

        //load data berdasarkan nip dari data pegawai gaji
        $pegawai = $this->dnp->findPegawaiGaji($nip, null, 0);

        foreach ($pegawai as $r) {
            $data = [
                'tagihan_id' => $tagihan_id,
                'nip' => $r['nip'],
                'nama' => $r['nmpeg'],
                'kdgol' => $r['kdgapok'],
                'bruto' => 0,
                'pph' => 0,
                'netto' => 0,
                'rekening' => $r['rekening'],
                'nmbank' => $r['nm_bank'],
                'nmrek' => $r['nmrek']
            ];
            // simpan data di database melalui model
            $this->dnp->createDnp($data);
        }
        // update timeline
        $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
        redirect('dnp/index/' . $tagihan_id . '');
    }

    // validasi inputan pada seluruh form
    private $rules = [
        [
            'field' => 'bruto',
            'label' => 'bruto',
            'rules' => 'numeric'
        ],
        [
            'field' => 'pph',
            'label' => 'pph',
            'rules' => 'numeric'
        ],
        [
            'field' => 'netto',
            'label' => 'netto',
            'rules' => 'numeric'
        ]
    ];

    public function update($id = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        if (!isset($tagihan_id)) show_404();

        // load data tagihan id ke view
        $data['tagihan_id'] = $tagihan_id;
        // load data dnp ke view berdasarkan id dnp
        $data['dnp'] = $this->dnp->getDetailDnp($id);

        $validation = $this->form_validation->set_rules($this->rules);

        // jika validasi sukses
        if ($validation->run()) {
            $bruto = htmlspecialchars($this->input->post('bruto', true));
            $kdgol = substr($this->dnp->getDetailDnp($id)['kdgol'], 0, 1);

            $kddokumen = $this->viewtagihan->getDetailTagihan($tagihan_id)['kddokumen'];
            if ($kddokumen == '02' or $kddokumen == '03') {
                $tarifpph = $this->pph->getTarifPph($kdgol);
                $pph = $bruto * $tarifpph;
            } else {
                $pph = 0;
            }

            $data = [
                'tagihan_id' => $tagihan_id,
                'bruto' => $bruto,
                'pph' => $pph,
                'netto' => $bruto - $pph
            ];
            // update data di database melalui model
            $this->dnp->updateDnp($data, $id);
            $bruto = $this->viewtagihan->getDetailTagihan($tagihan_id)['bruto'];
            $dnp = $this->dnp->sumDnp($tagihan_id)['bruto'];
            if ($bruto > $dnp) {
                $this->session->set_flashdata('kurang', 'total dnp kurang dari jumlah bruto tagihan.');
            } elseif ($bruto < $dnp) {
                $this->session->set_flashdata('lebih', 'total dnp lebih dari jumlah bruto tagihan.');
            } else {
                $this->session->set_flashdata('sama', 'total dnp sama dengan jumlah bruto tagihan.');
            }
            redirect('dnp/index/' . $tagihan_id . '');
        }

        // meload view pada realisasi/update.php
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dnp/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null, $tagihan_id = null)
    {
        // cek apakah ada id apa tidak
        if (!isset($id)) show_404();
        if (!isset($tagihan_id)) show_404();

        // hapus data di database melalui model
        if ($this->dnp->deleteDnp($id)) {
            $bruto = $this->viewtagihan->getDetailTagihan($tagihan_id)['bruto'];
            $dnp = $this->dnp->sumDnp($tagihan_id)['bruto'];
            if ($bruto > $dnp) {
                $this->session->set_flashdata('kurang', 'total dnp kurang dari jumlah bruto tagihan.');
            } elseif ($bruto < $dnp) {
                $this->session->set_flashdata('lebih', 'total dnp lebih dari jumlah bruto tagihan.');
            } else {
                $this->session->set_flashdata('sama', 'total dnp sama dengan jumlah bruto tagihan.');
            }
        }
        redirect('dnp/index/' . $tagihan_id . '');
    }

    public function cetak($tagihan_id = null)
    {
        // cek apakah ada sk id apa tidak
        if (!isset($tagihan_id)) show_404();

        $data['dnp'] = $this->dnp->getDnp($tagihan_id);
        $data['tagihan'] = $this->viewtagihan->getDetailTagihan($tagihan_id);

        ob_start();
        $this->load->view('dnp/cetak', $data);
        $html = ob_get_clean();

        $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(20, 10, 20, 10));
        $html2pdf->addFont('Arial');
        $html2pdf->pdf->SetTitle('DNP');
        $html2pdf->writeHTML($html);
        $html2pdf->output('dnp-' . $tagihan_id . '.pdf');
    }
}
