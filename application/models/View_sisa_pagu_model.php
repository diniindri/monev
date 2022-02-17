<?php

class View_sisa_pagu_model extends CI_Model
{
    public function getSisaPagu($limit = 0, $offset = null)
    {
        $query = "SELECT a.*, 
                        b.realisasi 
                FROM ref_pagu a 
                LEFT JOIN view_data_realisasi_ppk b ON a.tahun=b.tahun
                                            AND a.kdsatker=b.kdsatker 
                                            AND a.program=b.program 
                                            AND a.kegiatan=b.kegiatan 
                                            AND a.kro=b.kro 
                                            AND a.ro=b.ro 
                                            AND a.komponen=b.komponen 
                                            AND a.subkomponen=b.subkomponen 
                                            AND a.akun=b.akun
                                            AND a.kdppk=b.kdppk 
                WHERE a.tahun=" . sesi()['tahun'] . " AND 
                    a.kdsatker=" . sesi()['kdsatker'] . "  AND 
                    a.kdppk=" . sesi()['kdppk'] . "
                LIMIT $limit OFFSET $offset";
        return $this->db->query($query)->result_array();
    }

    public function findSisaPagu($kode = null, $limit = 0, $offset = null)
    {
        $query = "SELECT a.*, 
                        b.realisasi 
                FROM ref_pagu a 
                LEFT JOIN view_data_realisasi_ppk b ON a.tahun=b.tahun
                                            AND a.kdsatker=b.kdsatker 
                                            AND a.program=b.program 
                                            AND a.kegiatan=b.kegiatan 
                                            AND a.kro=b.kro 
                                            AND a.ro=b.ro 
                                            AND a.komponen=b.komponen 
                                            AND a.subkomponen=b.subkomponen 
                                            AND a.akun=b.akun
                                            AND a.kdppk=b.kdppk 
                WHERE a.tahun=" . sesi()['tahun'] . " AND 
                    a.kdsatker=" . sesi()['kdsatker'] . "  AND 
                    a.kdppk=" . sesi()['kdppk'] . " AND 
                    CONCAT(a.program,a.kegiatan,a.kro,a.ro,a.komponen,a.subkomponen,a.akun) LIKE '%$kode%'
                LIMIT $limit OFFSET $offset";
        return $this->db->query($query)->result_array();
    }

    public function countSisaPagu()
    {
        $query = "SELECT a.*, 
                        b.realisasi 
                FROM ref_pagu a 
                LEFT JOIN view_data_realisasi_ppk b ON a.tahun=b.tahun
                                            AND a.kdsatker=b.kdsatker 
                                            AND a.program=b.program 
                                            AND a.kegiatan=b.kegiatan 
                                            AND a.kro=b.kro 
                                            AND a.ro=b.ro 
                                            AND a.komponen=b.komponen 
                                            AND a.subkomponen=b.subkomponen 
                                            AND a.akun=b.akun
                                            AND a.kdppk=b.kdppk 
                WHERE a.tahun=" . sesi()['tahun'] . " AND 
                    a.kdsatker=" . sesi()['kdsatker'] . "  AND 
                    a.kdppk=" . sesi()['kdppk'] . "";
        return $this->db->query($query)->num_rows();
    }

    public function getDetailSisaPagu($kode = null)
    {
        $query =
            "SELECT a.*, 
                    b.realisasi,
                    (a.anggaran-b.realisasi) AS sisa
                FROM ref_pagu a 
                LEFT JOIN view_data_realisasi_ppk b ON a.tahun=b.tahun
                                            AND a.kdsatker=b.kdsatker 
                                            AND a.program=b.program 
                                            AND a.kegiatan=b.kegiatan 
                                            AND a.kro=b.kro 
                                            AND a.ro=b.ro 
                                            AND a.komponen=b.komponen 
                                            AND a.subkomponen=b.subkomponen 
                                            AND a.akun=b.akun
                                            AND a.kdppk=b.kdppk 
                WHERE a.tahun=" . sesi()['tahun'] . " AND 
                    a.kdsatker=" . sesi()['kdsatker'] . "  AND 
                    a.kdppk=" . sesi()['kdppk'] . " AND 
                    CONCAT(a.program,a.kegiatan,a.kro,a.ro,a.komponen,a.subkomponen,a.akun) = '$kode'";
        return $this->db->query($query)->row_array();
    }
}
