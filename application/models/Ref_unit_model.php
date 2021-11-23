<?php

class Ref_unit_model extends CI_Model
{
    public function getUnit($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_unit')->result_array();
    }

    public function getDetailUnit($id = null)
    {
        return $this->db->get_where('ref_unit', ['id' => $id])->row_array();
    }

    public function findUnit($nmunit = null, $limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_unit', ['nmunit' => $nmunit])->result_array();
    }

    public function countUnit()
    {
        return $this->db->get('ref_unit')->num_rows();
    }

    public function createUnit($data = null)
    {
        $this->db->insert('ref_unit', $data);
        return $this->db->affected_rows();
    }

    public function updateUnit($data = null, $id = null)
    {
        $this->db->update('ref_unit', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteUnit($id = null)
    {
        $this->db->delete('ref_unit', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllUnit()
    {
        $this->db->order_by('kegiatan', 'ASC');
        return $this->db->get('ref_unit')->result_array();
    }

    public function findJumlahUnit($kdunit = null, $nmunit = null)
    {
        return $this->db->get_where('ref_unit', ['kdunit' => $kdunit, 'nmunit' => $nmunit])->row_array();
    }
}
