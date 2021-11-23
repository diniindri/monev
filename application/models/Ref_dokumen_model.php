<?php

class Ref_dokumen_model extends CI_Model
{
    public function getDokumen($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_dokumen')->result_array();
    }

    public function getDetailDokumen($id = null)
    {
        return $this->db->get_where('ref_dokumen', ['id' => $id])->row_array();
    }

    public function findDokumen($nmdokumen = null, $limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_dokumen', ['nmdokumen' => $nmdokumen])->result_array();
    }

    public function countDokumen()
    {
        return $this->db->get('ref_dokumen')->num_rows();
    }

    public function createDokumen($data = null)
    {
        $this->db->insert('ref_dokumen', $data);
        return $this->db->affected_rows();
    }

    public function updateDokumen($data = null, $id = null)
    {
        $this->db->update('ref_dokumen', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteDokumen($id = null)
    {
        $this->db->delete('ref_dokumen', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllDokumen()
    {
        $this->db->order_by('kegiatan', 'ASC');
        return $this->db->get('ref_dokumen')->result_array();
    }

    public function findJumlahDokumen($kddokumen = null, $nmdokumen = null)
    {
        return $this->db->get_where('ref_dokumen', ['kddokumen' => $kddokumen, 'nmdokumen' => $nmdokumen])->row_array();
    }
}
