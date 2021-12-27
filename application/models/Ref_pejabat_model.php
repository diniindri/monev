<?php

class Ref_pejabat_model extends CI_Model
{
    public function getPejabat($limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_bendahara')->result_array();
    }

    public function getDetailPejabat($id = null)
    {
        return $this->db->get_where('ref_bendahara', ['id' => $id])->row_array();
    }

    public function findPejabat($nama = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_bendahara', ['nama' => $nama])->result_array();
    }

    public function countPejabat()
    {
        return $this->db->get('ref_bendahara')->num_rows();
    }

    public function createPejabat($data = null)
    {
        $this->db->insert('ref_bendahara', $data);
        return $this->db->affected_rows();
    }

    public function updatePejabat($data = null, $id = null)
    {
        $this->db->update('ref_bendahara', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePejabat($id = null)
    {
        $this->db->delete('ref_bendahara', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPejabat()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('ref_bendahara')->result_array();
    }

    public function getKodePejabat($kode = null)
    {
        return $this->db->get_where('ref_bendahara', ['kode' => $kode])->row_array();
    }
}
