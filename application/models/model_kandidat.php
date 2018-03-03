<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_kandidat extends CI_Model {

    public function tambah_kddt($data) {
        $this->db->insert('tb_kandidat', $data);
        return TRUE;
    }

    public function all_kddt(){
    	$query = $this->db->get('tb_kandidat');
    	return $query->result();
    }

    public function lihat_kddt($fakultas, $kode){
    	$this->db->select('*');
    	$this->db->from('tb_kandidat');
    	$this->db->like('kode_kddt', $kode, 'after');
    	$this->db->where('fakultas', $fakultas);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function kddt_presma($kode){
        $this->db->select('*');
        $this->db->from('tb_kandidat');
        $this->db->like('kode_kddt', $kode, 'after');
        $query = $this->db->get();
        return $query->result();
    }
}

