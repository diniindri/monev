<?php

class Ref_nomor_model extends CI_Model
{
    public function getNomor($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_nomor')->result_array();
    }

    public function getDetailNomor($id = null)
    {
        return $this->db->get_where('ref_nomor', ['id' => $id])->row_array();
    }

    public function findNomor($nomor = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_nomor', ['nomor' => $nomor])->result_array();
    }

    public function countNomor()
    {
        return $this->db->get('ref_nomor')->num_rows();
    }

    public function createNomor($data = null)
    {
        $this->db->insert('ref_nomor', $data);
        return $this->db->affected_rows();
    }

    public function updateNomor($data = null, $id = null)
    {
        $this->db->update('ref_nomor', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteNomor($id = null)
    {
        $this->db->delete('ref_nomor', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllNomor()
    {
        $this->db->order_by('nomor', 'ASC');
        return $this->db->get('ref_nomor')->result_array();
    }

    public function findJumlahNomor($nomor = null)
    {
        return $this->db->get_where('ref_nomor', ['nomor' => $nomor])->row_array();
    }

    public function getNoReg()
    {
        // return $this->db->get_where('ref_nomor', ['kdsatker' => sesi()['kdsatker'], 'tahun' => sesi()['tahun']])->row_array();

        $this->db->where(['kdsatker' => sesi()['kdsatker'], 'tahun' => sesi()['tahun']]);
        return $this->db->get('ref_nomor')->row_array();
    }

    public function updateNoReg($data)
    {
        $this->db->update('ref_nomor', $data, ['kdsatker' => sesi()['kdsatker'], 'tahun' => sesi()['tahun']]);
        return $this->db->affected_rows();
    }
}
