<?php

class View_pagu_model extends CI_Model
{
    public function getPagu($limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_pagu')->result_array();
    }

    public function getDetailPagu($id = null)
    {
        return $this->db->get_where('view_pagu', ['id' => $id])->row_array();
    }

    public function findPagu($kro = null, $limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->like('kode', $kro);
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_pagu')->result_array();
    }

    public function countPagu($kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        return $this->db->get('view_pagu')->num_rows();
    }
}
