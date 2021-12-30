<?php

class View_pagu_sp2d_model extends CI_Model
{
    public function getPagu($limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_pagu_sp2d')->result_array();
    }

    public function getDetailPagu($id = null)
    {
        return $this->db->get_where('view_pagu_sp2d', ['id' => $id])->row_array();
    }

    public function findPagu($kro = null, $limit = 0, $offset = 0, $kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->like('kode', $kro);
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_pagu_sp2d')->result_array();
    }

    public function countPagu($kdppk = null, $kdsatker = null, $tahun = null)
    {
        $this->db->where('kdppk', $kdppk);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        return $this->db->get('view_pagu_sp2d')->num_rows();
    }

    public function realisasiUnit($kdsatker = null, $tahun = null)
    {
        $query = "SELECT a.kdunit,b.nmunit,sum(a.anggaran) AS pagu, sum(a.realisasi) AS realisasi, sum(a.sisa) AS sisa FROM view_pagu_sp2d a LEFT JOIN ref_unit b ON a.kdunit=b.kdunit WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' GROUP BY a.kdunit,b.nmunit";
        return $this->db->query($query)->result_array();
    }
}
