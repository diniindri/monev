<?php

class Ref_pph_model extends CI_Model
{
    public function getPph($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_pph')->result_array();
    }

    public function getDetailPph($id = null)
    {
        return $this->db->get_where('ref_pph', ['id' => $id])->row_array();
    }

    public function findPph($kdgol = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_pph', ['kdgol' => $kdgol])->result_array();
    }

    public function countPph()
    {
        return $this->db->get('ref_pph')->num_rows();
    }

    public function createPph($data = null)
    {
        $this->db->insert('ref_pph', $data);
        return $this->db->affected_rows();
    }

    public function updatePph($data = null, $id = null)
    {
        $this->db->update('ref_pph', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePph($id = null)
    {
        $this->db->delete('ref_pph', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllPph()
    {
        $this->db->order_by('kdgol', 'ASC');
        return $this->db->get('ref_pph')->result_array();
    }

    public function findJumlahPph($kdgol = null)
    {
        return $this->db->get_where('ref_pph', ['kdgol' => $kdgol])->row_array();
    }

    public function getTarifPph($kdgol = null)
    {
        return $this->db->get_where('ref_pph', ['kdgol' => $kdgol])->row_array()['tarifpph'];
    }
}
