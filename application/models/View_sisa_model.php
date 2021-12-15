<?php

class View_sisa_model extends CI_Model
{
    public function getSisa($limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_sisa')->result_array();
    }

    public function getDetailSisa($id = null)
    {
        return $this->db->get_where('view_sisa', ['id' => $id])->row_array();
    }

    public function findSisa($kro = null, $limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get_where('view_sisa', ['kro' => $kro])->result_array();
    }

    public function countSisa($kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        return $this->db->get('view_sisa')->num_rows();
    }
}
