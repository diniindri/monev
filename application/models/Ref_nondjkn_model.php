<?php

class Ref_nondjkn_model extends CI_Model
{
    public function getNondjkn($limit = null, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('ref_nondjkn')->result_array();
    }

    public function getDetailNondjkn($id = null)
    {
        return $this->db->get_where('ref_nondjkn', ['id' => $id])->row_array();
    }

    public function findNondjkn($nama = null, $limit = 0, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_where('ref_nondjkn', ['nama' => $nama])->result_array();
    }

    public function countNondjkn()
    {
        return $this->db->get('ref_nondjkn')->num_rows();
    }

    public function createNondjkn($data = null)
    {
        $this->db->insert('ref_nondjkn', $data);
        return $this->db->affected_rows();
    }

    public function updateNondjkn($data = null, $id = null)
    {
        $this->db->update('ref_nondjkn', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteNondjkn($id = null)
    {
        $this->db->delete('ref_nondjkn', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllNondjkn()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('ref_nondjkn')->result_array();
    }

    public function findJumlahNondjkn($nip = null, $nama = null)
    {
        return $this->db->get_where('ref_nondjkn', ['nip' => $nip, 'nama' => $nama])->row_array();
    }

    public function getNamaNondjkn($nip = null)
    {
        return $this->db->get_where('ref_nondjkn', ['nip' => $nip])->row_array()['nama'];
    }

    public function getNipNondjkn($nip = null)
    {
        return $this->db->get_where('ref_nondjkn', ['nip' => $nip])->row_array();
    }
}
