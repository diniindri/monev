<?php

class Ref_bulan_model extends CI_Model
{
    public function getBulan($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_bulan')->result_array();
    }

    public function getDetailBulan($id = null)
    {
        return $this->db->get_where('ref_bulan', ['id' => $id])->row_array();
    }

    public function findBulan($nmppk = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_bulan', ['nmppk' => $nmppk])->result_array();
    }

    public function countBulan()
    {
        return $this->db->get('ref_bulan')->num_rows();
    }

    public function createBulan($data = null)
    {
        $this->db->insert('ref_bulan', $data);
        return $this->db->affected_rows();
    }

    public function updateBulan($data = null, $id = null)
    {
        $this->db->update('ref_bulan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteBulan($id = null)
    {
        $this->db->delete('ref_bulan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllBulan()
    {
        $this->db->order_by('kegiatan', 'ASC');
        return $this->db->get('ref_bulan')->result_array();
    }

    public function findJumlahBulan($kdbulan = null, $nmbulan = null)
    {
        return $this->db->get_where('ref_bulan', ['kdbulan' => $kdbulan, 'nmbulan' => $nmbulan])->row_array();
    }

    public function getNamaBulan($kdbulan = null)
    {
        return $this->db->get_where('ref_bulan', ['kdbulan' => $kdbulan])->row_array()['nmbulan'];
    }
}
