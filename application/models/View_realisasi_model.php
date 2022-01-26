<?php

class View_realisasi_model extends CI_Model
{
    public function realisasiUnit($kdsatker = null, $tahun = null)
    {
        $query = "SELECT b.nmunit,sum(a.anggaran) AS pagu, sum(a.realisasi) AS realisasi, sum(a.sisa) AS sisa FROM view_realisasi a LEFT JOIN ref_unit b ON a.kdunit=b.kdunit WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' GROUP BY b.nmunit";
        return $this->db->query($query)->result_array();
    }

    public function getDetail($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null)
    {
        $this->db->where(['kdsatker' => $kdsatker, 'tahun' => $tahun, 'kdunit' => $kdunit, 'bulan' => $bulan]);
        return $this->db->get('view_realisasi')->result_array();
    }

    public function getBulan($kdsatker = null, $tahun = null, $kdunit = null)
    {
        $query = "SELECT DISTINCT bulan FROM view_realisasi WHERE kdsatker='$kdsatker' AND tahun='$tahun' AND kdunit='$kdunit' order by bulan asc";
        return $this->db->query($query)->result_array();
    }

    public function countRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null)
    {
        $this->db->where(['kdsatker' => $kdsatker, 'tahun' => $tahun, 'kdunit' => $kdunit, 'bulan' => $bulan]);
        return $this->db->get('view_realisasi')->num_rows();
    }

    public function findRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null, $limit = null, $offset = 0, $kode = null)
    {
        $this->db->select('a.*,b.nmppk');
        $this->db->from('view_realisasi a');
        $this->db->join('ref_ppk b', 'a.kdppk=b.kdppk', 'left');
        $this->db->like('kode', $kode);
        $this->db->where('bulan', $bulan);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->where('kdunit', $kdunit);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function getRealisasi($kdsatker = null, $tahun = null, $kdunit = null, $bulan = null, $limit = null, $offset = 0)
    {
        $this->db->select('a.*,b.nmppk');
        $this->db->from('view_realisasi a');
        $this->db->join('ref_ppk b', 'a.kdppk=b.kdppk', 'left');
        $this->db->where('bulan', $bulan);
        $this->db->where('kdsatker', $kdsatker);
        $this->db->where('tahun', $tahun);
        $this->db->where('kdunit', $kdunit);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function getRealisasiBulan($kdsatker = null, $tahun = null, $kdunit = null)
    {
        $query = "SELECT b.nmbulan,sum(a.realisasi) as realisasi FROM view_realisasi a left join ref_bulan b on a.bulan = b.kdbulan WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' AND a.kdunit='$kdunit' group by b.nmbulan ";
        return $this->db->query($query)->result_array();
    }

    public function getBulanPpk($kdsatker = null, $tahun = null, $kdppk = null)
    {
        $query = "SELECT DISTINCT bulan FROM view_realisasi WHERE kdsatker='$kdsatker' AND tahun='$tahun' AND kdppk='$kdppk' order by bulan asc";
        return $this->db->query($query)->result_array();
    }

    public function countRealisasiPpk($kdsatker = null, $tahun = null, $kdppk = null, $bulan = null)
    {
        $this->db->where(['kdsatker' => $kdsatker, 'tahun' => $tahun, 'kdppk' => $kdppk, 'bulan' => $bulan]);
        return $this->db->get('view_realisasi')->num_rows();
    }

    public function findRealisasiPpk($kdsatker = null, $tahun = null, $kdppk = null, $bulan = null, $limit = null, $offset = 0, $kode = null)
    {
        $this->db->select('a.*,b.nmunit');
        $this->db->from('view_realisasi a');
        $this->db->join('ref_unit b', 'a.kdunit=b.kdunit', 'left');
        $this->db->like('a.kode', $kode);
        $this->db->where('a.bulan', $bulan);
        $this->db->where('a.kdsatker', $kdsatker);
        $this->db->where('a.tahun', $tahun);
        $this->db->where('a.kdppk', $kdppk);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function getRealisasiPpk($kdsatker = null, $tahun = null, $kdppk = null, $bulan = null, $limit = null, $offset = 0)
    {
        $this->db->select('a.*,b.nmunit');
        $this->db->from('view_realisasi a');
        $this->db->join('ref_unit b', 'a.kdunit=b.kdunit', 'left');
        $this->db->where('a.bulan', $bulan);
        $this->db->where('a.kdsatker', $kdsatker);
        $this->db->where('a.tahun', $tahun);
        $this->db->where('a.kdppk', $kdppk);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function getRealisasiBulanPpk($kdsatker = null, $tahun = null, $kdppk = null)
    {
        $query = "SELECT b.nmbulan,sum(a.realisasi) as realisasi FROM view_realisasi a left join ref_bulan b on a.bulan = b.kdbulan WHERE a.kdsatker='$kdsatker' AND a.tahun='$tahun' AND a.kdppk='$kdppk' group by b.nmbulan ";
        return $this->db->query($query)->result_array();
    }
}
