<?php

class Ref_pagu_model extends CI_Model
{
    public function getPagu($limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get('ref_pagu')->result_array();
    }

    public function getDetailPagu($id = null)
    {
        return $this->db->get_where('ref_pagu', ['id' => $id])->row_array();
    }

    public function findPagu($kro = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get_where('ref_pagu', ['kro' => $kro])->result_array();
    }

    public function countPagu()
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get('ref_pagu')->num_rows();
    }

    public function createPagu($data = null)
    {
        $this->db->insert('ref_pagu', $data);
        return $this->db->affected_rows();
    }

    public function updatePagu($data = null, $id = null)
    {
        $this->db->update('ref_pagu', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePagu($id = null)
    {
        $this->db->delete('ref_pagu', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPagu()
    {
        $this->db->order_by('kegiatan', 'ASC');
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get('ref_pagu')->result_array();
    }

    public function findJumlahPagu($kro = null, $ro = null)
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->get_where('ref_pagu', ['kro' => $kro, 'ro' => $ro])->row_array();
    }

    public function deletePaguAll()
    {
        $this->db->delete('ref_pagu', ['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        return $this->db->affected_rows();
    }
}
