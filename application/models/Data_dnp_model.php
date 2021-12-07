<?php

use GuzzleHttp\Client;

class Data_dnp_model extends CI_Model
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

    public function getDnp($tagihan_id = null, $limit = null, $offset = 0)
    {
        $this->db->where('tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get('data_dnp')->result_array();
    }

    public function getDetailDnp($id = null)
    {
        return $this->db->get_where('data_dnp', ['id' => $id])->row_array();
    }

    public function findDnp($tagihan_id = null, $nama = null, $limit = null, $offset = 0)
    {
        $this->db->like('nama', $nama);
        $this->db->where('tagihan_id', $tagihan_id);
        $this->db->limit($limit, $offset);
        return $this->db->get('data_dnp')->result_array();
    }

    public function countDnp($tagihan_id = null)
    {
        $this->db->where('tagihan_id', $tagihan_id);
        return $this->db->get('data_dnp')->num_rows();
    }

    public function createDnp($data = null)
    {
        $this->db->insert('data_dnp', $data);
        return $this->db->affected_rows();
    }

    public function updateDnp($data = null, $id = null)
    {
        $this->db->update('data_dnp', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteDnp($id = null)
    {
        $this->db->delete('data_dnp', ['id' => $id]);
        return $this->db->affected_rows();
    }

    // data pegawai gaji

    public function getPegawaiGaji($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-pegawai', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findPegawaiGaji($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-pegawai', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function countPegawaiGaji()
    {
        $response = $this->_client->request('GET', 'count-data-pegawai', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
