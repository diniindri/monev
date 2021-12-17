<?php

use GuzzleHttp\Client;

class Data_realisasi_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'verify' => false,
            'auth' => auth()
        ]);
    }

    public function getRealisasi($tagihan_id = null, $limit = 0, $offset = 0)
    {
        $this->db->where('tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get('data_realisasi')->result_array();
    }

    public function getDetailRealisasi($id = null)
    {
        return $this->db->get_where('data_realisasi', ['id' => $id])->row_array();
    }

    public function findRealisasi($tagihan_id = null, $kro = null, $ro = null, $limit = null, $offset = 0)
    {
        $this->db->like('kro', $kro);
        $this->db->like('ro', $ro);
        $this->db->where('tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get('data_realisasi')->result_array();
    }

    public function countRealisasi($tagihan_id = null)
    {
        $this->db->where('tagihan_id', $tagihan_id);
        return $this->db->get('data_realisasi')->num_rows();
    }

    public function createRealisasi($data = null)
    {
        $this->db->insert('data_realisasi', $data);
        return $this->db->affected_rows();
    }

    public function updateRealisasi($data = null, $id = null)
    {
        $this->db->update('data_realisasi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteRealisasi($id = null)
    {
        $this->db->delete('data_realisasi', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePerTagihan($tagihan_id = null)
    {
        $this->db->delete('data_realisasi', ['tagihan_id' => $tagihan_id]);
        return $this->db->affected_rows();
    }

    public function getBruto($tagihan_id = null)
    {
        $query = "SELECT tagihan_id, SUM(realisasi) AS bruto FROM data_realisasi WHERE tagihan_id='$tagihan_id' GROUP BY tagihan_id";
        return $this->db->query($query)->row_array();
    }
}
