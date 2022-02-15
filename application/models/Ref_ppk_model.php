<?php

class Ref_ppk_model extends CI_Model
{
    public function getPpk($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get_where('ref_ppk')->result_array();
    }

    public function getDetailPpk($id = null)
    {
        return $this->db->get_where('ref_ppk', ['id' => $id])->row_array();
    }

    public function findPpk($nmppk = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get_where('ref_ppk', ['nmppk' => $nmppk])->result_array();
    }

    public function countPpk()
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get('ref_ppk')->num_rows();
    }

    public function createPpk($data = null)
    {
        $this->db->insert('ref_ppk', $data);
        return $this->db->affected_rows();
    }

    public function updatePpk($data = null, $id = null)
    {
        $this->db->update('ref_ppk', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePpk($id = null)
    {
        $this->db->delete('ref_ppk', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPpk()
    {
        $this->db->order_by('kegiatan', 'ASC');
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get('ref_ppk')->result_array();
    }

    public function findJumlahPpk($kdppk = null, $nmppk = null)
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get_where('ref_ppk', ['kdppk' => $kdppk, 'nmppk' => $nmppk])->row_array();
    }

    public function getNamaPpk()
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker'], 'kdppk' => sesi()['kdppk']]);
        return $this->db->get('ref_ppk')->row_array();
    }
}
