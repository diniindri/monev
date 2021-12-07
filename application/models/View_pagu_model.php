<?php

class View_pagu_model extends CI_Model
{
    public function getPagu($limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('view_pagu')->result_array();
    }

    public function getDetailPagu($id = null)
    {
        return $this->db->get_where('view_pagu', ['id' => $id])->row_array();
    }

    public function findPagu($kro = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('view_pagu', ['kro' => $kro])->result_array();
    }

    public function countPagu()
    {
        return $this->db->get('view_pagu')->num_rows();
    }
}
