<?php

class Data_register_model extends CI_Model
{
    public function getRegister($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('data_register')->result_array();
    }

    public function getDetailRegister($id = null)
    {
        return $this->db->get_where('data_register', ['id' => $id])->row_array();
    }

    public function findRegister($nomor = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('data_register', ['nomor' => $nomor])->result_array();
    }

    public function countRegister()
    {
        return $this->db->get('data_register')->num_rows();
    }

    public function createRegister($data = null)
    {
        $this->db->insert('data_register', $data);
        return $this->db->affected_rows();
    }

    public function updateRegister($data = null, $id = null)
    {
        $this->db->update('data_register', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteRegister($id = null)
    {
        $this->db->delete('data_register', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllRegister()
    {
        $this->db->order_by('nomor', 'ASC');
        return $this->db->get('data_register')->result_array();
    }

    public function findJumlahRegister($nomor = null)
    {
        return $this->db->get_where('data_register', ['nomor' => $nomor])->row_array();
    }
}
