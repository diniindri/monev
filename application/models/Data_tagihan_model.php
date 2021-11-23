<?php

class Data_tagihan_model extends CI_Model
{
    public function getTagihan($limit = null, $offset = 0)
    {
        $this->db->order_by('notagihan', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('data_tagihan')->result_array();
    }

    public function getDetailTagihan($id = null)
    {
        return $this->db->get_where('data_tagihan', ['id' => $id])->row_array();
    }

    public function findTagihan($notagihan = null, $limit = null, $offset = 0)
    {
        $this->db->like('notagihan', $notagihan);
        $this->db->limit($limit, $offset);
        return $this->db->get('data_tagihan')->result_array();
    }

    public function countTagihan()
    {
        return $this->db->get('data_tagihan')->num_rows();
    }

    public function createTagihan($data = null)
    {
        $this->db->insert('data_tagihan', $data);
        return $this->db->affected_rows();
    }

    public function updateTagihan($data = null, $id = null)
    {
        $this->db->update('data_tagihan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteTagihan($id = null)
    {
        $this->db->delete('data_tagihan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllTagihan()
    {
        $this->db->order_by('notagihan', 'DESC');
        return $this->db->get('data_tagihan')->result_array();
    }
}
