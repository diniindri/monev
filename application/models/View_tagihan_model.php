<?php

class View_tagihan_model extends CI_Model
{
    public function getTagihanPpk($limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdppk', sesi()['kdppk']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->order_by('notagihan', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function getDetailTagihan($id = null)
    {
        return $this->db->get_where('view_tagihan', ['id' => $id])->row_array();
    }

    public function findTagihanPpk($notagihan = null, $limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdppk', sesi()['kdppk']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->like('notagihan', $notagihan);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function countTagihanPpk($status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdppk', sesi()['kdppk']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        return $this->db->get('data_tagihan')->num_rows();
    }

    public function getTagihan($limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->order_by('notagihan', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function findTagihan($notagihan = null, $limit = null, $offset = 0, $status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->like('notagihan', $notagihan);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function countTagihan($status = 0)
    {
        $this->db->where('status', $status);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('tahun', sesi()['tahun']);
        return $this->db->get('data_tagihan')->num_rows();
    }

    public function getTagihanAll($limit = null, $offset = 0)
    {
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('kdppk', sesi()['kdppk']);
        $this->db->order_by('notagihan', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function findTagihanAll($notagihan = null, $limit = null, $offset = 0)
    {
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('kdppk', sesi()['kdppk']);
        $this->db->like('notagihan', $notagihan);
        $this->db->limit($limit, $offset);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function countTagihanAll()
    {
        $this->db->where('tahun', sesi()['tahun']);
        $this->db->where('kdsatker', sesi()['kdsatker']);
        $this->db->where('kdppk', sesi()['kdppk']);
        return $this->db->get('data_tagihan')->num_rows();
    }

    public function getPerRegister($id = null)
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker'], 'register_id' => $id]);
        return $this->db->get('view_tagihan')->result_array();
    }

    public function getRegister()
    {
        $this->db->where(['tahun' => sesi()['tahun'], 'kdsatker' => sesi()['kdsatker']]);
        $this->db->where(['register_id' => null]);
        return $this->db->get('view_tagihan')->result_array();
    }
}
