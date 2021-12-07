<?php

class Ref_berkas_model extends CI_Model
{
    public function getBerkas($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_berkas')->result_array();
    }

    public function getDetailBerkas($id = null)
    {
        return $this->db->get_where('ref_berkas', ['id' => $id])->row_array();
    }

    public function findBerkas($nmberkas = null, $limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_berkas', ['nmppk' => $nmberkas])->result_array();
    }

    public function countBerkas()
    {
        return $this->db->get('ref_berkas')->num_rows();
    }

    public function createBerkas($data = null)
    {
        $this->db->insert('ref_berkas', $data);
        return $this->db->affected_rows();
    }

    public function updateBerkas($data = null, $id = null)
    {
        $this->db->update('ref_berkas', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteBerkas($id = null)
    {
        $this->db->delete('ref_berkas', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllBerkas()
    {
        $this->db->order_by('nmberkas', 'ASC');
        return $this->db->get('ref_berkas')->result_array();
    }

    public function findJumlahBerkas($kdberkas = null, $nmberkas = null)
    {
        return $this->db->get_where('ref_berkas', ['kdberkas' => $kdberkas, 'nmppk' => $nmberkas])->row_array();
    }
}
