<?php

class view_realisasi_sp2d_model extends CI_Model
{
    public function realisasiUnit($kdsatker = null, $tahun = null)
    {
        $query = "SELECT b.nmunit,sum(a.anggaran) AS pagu, sum(a.realisasi) AS realisasi, sum(a.sisa) AS sisa FROM view_realisasi_sp2d a LEFT JOIN ref_unit b ON a.kdunit=b.kdunit WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' GROUP BY b.nmunit";
        return $this->db->query($query)->result_array();
    }

    public function getBulan($kdsatker = null, $tahun = null, $kdunit = null)
    {
        $query = "SELECT DISTINCT bulan FROM view_realisasi_sp2d WHERE kdsatker='$kdsatker' AND tahun='$tahun' AND kdunit='$kdunit' order by bulan asc";
        return $this->db->query($query)->result_array();
    }

    public function getDetail($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null)
    {
        $this->db->where(['kdsatker' => $kdsatker, 'tahun' => $tahun, 'kdunit' => $kdunit, 'bulan' => $bulan]);
        return $this->db->get('view_realisasi_sp2d')->result_array();
    }

    public function countRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null)
    {
        $this->db->where(['kdsatker' => $kdsatker, 'tahun' => $tahun, 'kdunit' => $kdunit, 'bulan' => $bulan]);
        return $this->db->get('view_realisasi_sp2d')->num_rows();
    }

    public function findRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null, $limit = 0, $offset = 0, $kode = null)
    {
        $this->db->like('kode', $kode);
        $this->db->where('bulan', $bulan);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->where('kdunit', $kdunit);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_realisasi_sp2d')->result_array();
    }

    public function getRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null, $limit = null, $offset = 0)
    {
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->where('bulan', $bulan);
        $this->db->where('kdunit', $kdunit);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_realisasi_sp2d')->result_array();
    }
}
