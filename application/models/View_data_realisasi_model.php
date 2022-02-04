<?php

class View_data_realisasi_model extends CI_Model
{
    // realisasi per jenis belanja
    public function getJenisBelanja($jenis = 1)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_unit' : $table = 'view_data_realisasi_unit_sp2d';
        $query = "SELECT left(a.akun,2) AS jenis_belanja, 
                        sum(a.anggaran) AS pagu, 
                        sum(b.realisasi) as realisasi,
                        c.nama 
                        FROM ref_pagu a 
                        LEFT JOIN $table b ON a.tahun=b.tahun
                                                    AND a.kdsatker=b.kdsatker 
                                                    AND a.program=b.program 
                                                    AND a.kegiatan=b.kegiatan 
                                                    AND a.kro=b.kro 
                                                    AND a.ro=b.ro 
                                                    AND a.komponen=b.komponen 
                                                    AND a.subkomponen=b.subkomponen 
                                                    AND a.akun=b.akun
                                                    AND a.kdunit=b.kdunit 
                        LEFT JOIN ref_jenis_belanja c on left(a.akun,2)=c.kode 
                        WHERE a.tahun=" . sesi()['tahun'] . " AND a.kdsatker=" . sesi()['kdsatker'] . " 
                        GROUP BY left(a.akun,2), c.nama";
        return $this->db->query($query)->result_array();
    }

    // realisasi berdasarkan unit
    public function getRealisasiUnit($jenis = 1)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_unit' : $table = 'view_data_realisasi_unit_sp2d';
        $query = "SELECT c.kdunit, c.nmunit,
                        sum(a.anggaran) AS pagu, 
                        sum(b.realisasi) as realisasi
                        FROM ref_pagu a 
                        LEFT JOIN $table b ON a.tahun=b.tahun
                                                    AND a.kdsatker=b.kdsatker 
                                                    AND a.program=b.program 
                                                    AND a.kegiatan=b.kegiatan 
                                                    AND a.kro=b.kro 
                                                    AND a.ro=b.ro 
                                                    AND a.komponen=b.komponen 
                                                    AND a.subkomponen=b.subkomponen 
                                                    AND a.akun=b.akun
                                                    AND a.kdunit=b.kdunit 
                        LEFT JOIN ref_unit c on a.kdunit=c.kdunit 
                        WHERE a.tahun=" . sesi()['tahun'] . " AND a.kdsatker=" . sesi()['kdsatker'] . " 
                        GROUP BY c.kdunit, c.nmunit ORDER BY c.kdunit ASC";
        return $this->db->query($query)->result_array();
    }

    public function getRealisasiUnitBulan($jenis = 1, $kdunit = null)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_unit_bulan' : $table = 'view_data_realisasi_unit_bulan_sp2d';
        $query = "SELECT b.kdbulan,
                        b.nmbulan,
                        SUM(a.realisasi) AS realisasi 
                    FROM $table a
                    LEFT JOIN ref_bulan b ON a.bulan=b.kdbulan 
                    WHERE a.tahun=" . sesi()['tahun'] . " AND a.kdsatker=" . sesi()['kdsatker'] . " AND a.kdunit='$kdunit'
                    GROUP BY b.kdbulan,b.nmbulan ORDER BY b.kdbulan ASC";
        return $this->db->query($query)->result_array();
    }

    public function getDetailRealisasiUnitBulan($jenis = 1, $kdunit = null, $kdbulan = null)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_unit_bulan' : $table = 'view_data_realisasi_unit_bulan_sp2d';
        return $this->db->get_where($table, ['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker'], 'kdunit' => $kdunit, 'bulan' => $kdbulan])->result_array();
    }

    public function getDetailRealisasiUnitBulanTagihan($jenis = 1, $kdunit = null, $kdbulan = null, $kode = null)
    {
        $jenis == 1 ? $field = 'b.tgltagihan' : $field = 'b.tglsp2d';
        $program = substr($kode, 0, 2);
        $kegiatan = substr($kode, 2, 4);
        $kro = substr($kode, 6, 3);
        $ro = substr($kode, 9, 3);
        $komponen = substr($kode, 12, 3);
        $subkomponen = substr($kode, 15, 1);
        $akun = substr($kode, 16, 6);

        $query = "SELECT a.*, b.uraian
                    FROM data_realisasi a 
                    LEFT JOIN data_tagihan b 
                    ON a.tagihan_id=b.id 
                    WHERE a.tahun=" . sesi()['tahun'] . " AND 
                        a.kdsatker=" . sesi()['kdsatker'] . " AND 
                        a.kdunit='$kdunit' AND 
                        date_format(from_unixtime($field), '%m') = '$kdbulan' AND 
                        a.program = '$program' AND
                        a.kegiatan = '$kegiatan' AND
                        a.kro = '$kro' AND
                        a.ro = '$ro' AND
                        a.komponen = '$komponen' AND
                        a.subkomponen= '$subkomponen' AND
                        a.akun= '$akun'";
        return $this->db->query($query)->result_array();
    }


    // realisasi berdasarkan ppk
    public function getRealisasiPpk($jenis = 1)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_ppk' : $table = 'view_data_realisasi_ppk_sp2d';
        $query = "SELECT c.kdppk, c.nmppk,
                        sum(a.anggaran) AS pagu, 
                        sum(b.realisasi) as realisasi
                        FROM ref_pagu a 
                        LEFT JOIN $table b ON a.tahun=b.tahun
                                                    AND a.kdsatker=b.kdsatker 
                                                    AND a.program=b.program 
                                                    AND a.kegiatan=b.kegiatan 
                                                    AND a.kro=b.kro 
                                                    AND a.ro=b.ro 
                                                    AND a.komponen=b.komponen 
                                                    AND a.subkomponen=b.subkomponen 
                                                    AND a.akun=b.akun
                                                    AND a.kdppk=b.kdppk 
                        LEFT JOIN ref_ppk c on a.kdppk=c.kdppk 
                        WHERE a.tahun=" . sesi()['tahun'] . " AND a.kdsatker=" . sesi()['kdsatker'] . " 
                        GROUP BY c.kdppk, c.nmppk ORDER BY c.kdppk ASC";
        return $this->db->query($query)->result_array();
    }

    public function getRealisasiPpkBulan($jenis = 1, $kdppk = null)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_ppk_bulan' : $table = 'view_data_realisasi_ppk_bulan_sp2d';
        $query = "SELECT b.kdbulan,
                        b.nmbulan,
                        SUM(a.realisasi) AS realisasi 
                    FROM $table a
                    LEFT JOIN ref_bulan b ON a.bulan=b.kdbulan 
                    WHERE a.tahun=" . sesi()['tahun'] . " AND a.kdsatker=" . sesi()['kdsatker'] . " AND a.kdppk='$kdppk'
                    GROUP BY b.kdbulan,b.nmbulan ORDER BY b.kdbulan ASC";
        return $this->db->query($query)->result_array();
    }

    public function getDetailRealisasiPpkBulan($jenis = 1, $kdppk = null, $kdbulan = null)
    {
        $jenis == 1 ? $table = 'view_data_realisasi_ppk_bulan' : $table = 'view_data_realisasi_ppk_bulan_sp2d';
        return $this->db->get_where($table, ['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker'], 'kdppk' => $kdppk, 'bulan' => $kdbulan])->result_array();
    }

    public function getDetailRealisasiPpkBulanTagihan($jenis = 1, $kdppk = null, $kdbulan = null, $kode = null)
    {
        $jenis == 1 ? $field = 'b.tgltagihan' : $field = 'b.tglsp2d';
        $program = substr($kode, 0, 2);
        $kegiatan = substr($kode, 2, 4);
        $kro = substr($kode, 6, 3);
        $ro = substr($kode, 9, 3);
        $komponen = substr($kode, 12, 3);
        $subkomponen = substr($kode, 15, 1);
        $akun = substr($kode, 16, 6);

        $query = "SELECT a.*, b.uraian
                    FROM data_realisasi a 
                    LEFT JOIN data_tagihan b 
                    ON a.tagihan_id=b.id 
                    WHERE a.tahun=" . sesi()['tahun'] . " AND 
                        a.kdsatker=" . sesi()['kdsatker'] . " AND 
                        a.kdppk='$kdppk' AND 
                        date_format(from_unixtime($field), '%m') = '$kdbulan' AND 
                        a.program = '$program' AND
                        a.kegiatan = '$kegiatan' AND
                        a.kro = '$kro' AND
                        a.ro = '$ro' AND
                        a.komponen = '$komponen' AND
                        a.subkomponen= '$subkomponen' AND
                        a.akun= '$akun'";
        return $this->db->query($query)->result_array();
    }
}
