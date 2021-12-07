<?php

class View_tagihan_model extends CI_Model
{
    public function getTagihan($limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->order_by('notagihan', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function getDetailTagihan($id = null)
    {
        return $this->db->get_where('view_tagihan', ['id' => $id])->row_array();
    }

    public function findTagihan($notagihan = null, $limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->like('notagihan', $notagihan);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function countTagihan($status = 0)
    {
        $this->db->where('status', $status);
        return $this->db->get('data_tagihan')->num_rows();
    }
}
