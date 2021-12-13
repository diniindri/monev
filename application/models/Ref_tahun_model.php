<?php

class Ref_tahun_model extends CI_Model
{
    public function getTahun($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_tahun')->result_array();
    }

    public function getDetailTahun($id = null)
    {
        return $this->db->get_where('ref_tahun', ['id' => $id])->row_array();
    }

    public function findTahun($tahun = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_tahun', ['tahun' => $tahun])->result_array();
    }

    public function countTahun()
    {
        return $this->db->get('ref_tahun')->num_rows();
    }

    public function createTahun($data = null)
    {
        $this->db->insert('ref_tahun', $data);
        return $this->db->affected_rows();
    }

    public function updateTahun($data = null, $id = null)
    {
        $this->db->update('ref_tahun', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteTahun($id = null)
    {
        $this->db->delete('ref_tahun', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllTahun()
    {
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('ref_tahun')->result_array();
    }

    public function findJumlahTahun($tahun = null)
    {
        return $this->db->get_where('ref_tahun', ['tahun' => $tahun])->row_array();
    }
}
