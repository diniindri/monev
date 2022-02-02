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

    public function realisasiUnit($kdsatker = null, $tahun = null)
    {
        $query = "SELECT a.kdunit,b.nmunit,sum(a.anggaran) AS pagu, sum(a.realisasi) AS realisasi, sum(a.sisa) AS sisa FROM view_pagu a LEFT JOIN ref_unit b ON a.kdunit=b.kdunit WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' GROUP BY a.kdunit,b.nmunit";
        return $this->db->query($query)->result_array();
    }

    public function realisasiPpk($kdsatker = null, $tahun = null)
    {
        $query = "SELECT a.kdppk,b.nmppk,sum(a.anggaran) AS pagu, sum(a.realisasi) AS realisasi, sum(a.sisa) AS sisa FROM view_pagu a LEFT JOIN ref_ppk b ON a.kdppk=b.kdppk WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' GROUP BY a.kdppk,b.nmppk";
        return $this->db->query($query)->result_array();
    }

    public function getJenisBelanja()
    {
        $query = "SELECT left(a.akun,2) AS jenis_belanja, sum(a.anggaran) AS pagu, sum(a.realisasi) as realisasi, sum(a.sisa) as sisa,b.nama from view_pagu a left join ref_jenis_belanja b on left(a.akun,2)=b.kode WHERE a.kdsatker=" . sesi()['kdsatker'] . " AND a.tahun=" . sesi()['tahun'] . " group by left(a.akun,2),b.nama";
        return $this->db->query($query)->result_array();
    }

    public function getRealisasiPpk()
    {
        $query = "SELECT b.kdppk,b.nmppk,sum(a.anggaran) AS pagu, sum(a.realisasi) as realisasi from view_pagu a left join ref_ppk b on a.kdppk=b.kdppk WHERE a.kdsatker=" . sesi()['kdsatker'] . " AND a.tahun=" . sesi()['tahun'] . " group by b.kdppk,b.nmppk order by b.kdppk asc";
        return $this->db->query($query)->result_array();
    }

    public function getRealisasiUnit()
    {
        $query = "SELECT b.kdunit,b.nmunit,sum(a.anggaran) AS pagu, sum(a.realisasi) as realisasi from view_pagu a left join ref_unit b on a.kdunit=b.kdunit WHERE a.kdsatker=" . sesi()['kdsatker'] . " AND a.tahun=" . sesi()['tahun'] . " group by b.kdunit,b.nmunit order by b.kdunit asc";
        return $this->db->query($query)->result_array();
    }
}
