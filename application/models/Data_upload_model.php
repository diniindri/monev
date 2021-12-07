<?php

use GuzzleHttp\Client;

class Data_upload_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'verify' => false,
            'auth' => auth()
        ]);
    }

    public function getUpload($tagihan_id = null, $limit = 0, $offset = 0)
    {
        $this->db->select('a.*,b.nmberkas');
        $this->db->from('data_upload a');
        $this->db->join('ref_berkas b', 'a.kdberkas=b.kdberkas', 'left');
        $this->db->where('a.tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function getDetailUpload($id = null)
    {
        return $this->db->get_where('data_upload', ['id' => $id])->row_array();
    }

    public function findUpload($tagihan_id = null, $keterangan = null, $limit = null, $offset = 0)
    {
        $this->db->select('a.*,b.nmberkas');
        $this->db->from('data_upload a');
        $this->db->join('ref_berkas b', 'a.kdberkas=b.kdberkas', 'left');
        $this->db->like('a.keterangan', $keterangan);
        $this->db->where('a.tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function countUpload($tagihan_id = null)
    {
        $this->db->where('tagihan_id', $tagihan_id);
        return $this->db->get('data_upload')->num_rows();
    }

    public function createUpload($data = null)
    {
        $this->db->insert('data_upload', $data);
        return $this->db->affected_rows();
    }

    public function updateUpload($data = null, $id = null)
    {
        $this->db->update('data_upload', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteUpload($id = null)
    {
        $this->db->delete('data_upload', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
