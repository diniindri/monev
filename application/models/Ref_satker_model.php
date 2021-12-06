<?php

class Ref_satker_model extends CI_Model
{
    public function getSatker($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_satker')->result_array();
    }

    public function getDetailSatker($id = null)
    {
        return $this->db->get_where('ref_satker', ['id' => $id])->row_array();
    }

    public function findSatker($nmsatker = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_satker', ['nmsatker' => $nmsatker])->result_array();
    }

    public function countSatker()
    {
        return $this->db->get('ref_satker')->num_rows();
    }

    public function createSatker($data = null)
    {
        $this->db->insert('ref_satker', $data);
        return $this->db->affected_rows();
    }

    public function updateSatker($data = null, $id = null)
    {
        $this->db->update('ref_satker', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteSatker($id = null)
    {
        $this->db->delete('ref_satker', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllSatker()
    {
        $this->db->order_by('kegiatan', 'ASC');
        return $this->db->get('ref_satker')->result_array();
    }

    public function findJumlahSatker($kdsatker = null, $nmsatker = null)
    {
        return $this->db->get_where('ref_satker', ['kdsatker' => $kdsatker, 'nmsatker' => $nmsatker])->row_array();
    }

    public function getNamaSatker($kdsatker = null)
    {
        return $this->db->get_where('ref_satker', ['kdsatker' => $kdsatker])->row_array()['nmsatker'];
    }
}
