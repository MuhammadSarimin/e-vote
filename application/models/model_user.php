<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function cek_user($data) {
        $query = $this->db->get_where('tb_user', $data);
        return $query;
    }

    public function add_user($data){
        $this->db->insert('tb_user', $data);
        return TRUE;
    }

    public function del_user($nim){
        $this->db->where('nim', $nim);
        $this->db->delete('tb_user');
        return TRUE;
    }

    public function get_user($status) {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('status', $status);
        $this->db->order_by('no_tps');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('nim', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function lihat_dpt($tps,$key=null,$batas=null,$offset=null){
    	$this->db->select('*');
    	$this->db->from('tb_user');
    	$this->db->where('no_tps', $tps);
    	$this->db->where('status', '1');

        if($batas != null){
            $this->db->limit($batas,$offset);
        }

        if ($key != null) {    
            if (is_numeric($key)) {
                $this->db->like('nim',$key);
            } else {
                $this->db->like('nama',$key);
            }
        }

        $query = $this->db->get();
        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        
    }

    function count_dpt($tps){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('no_tps', $tps);
        $this->db->where('status', '1');
        $query = $this->db->get()->num_rows();
        return $query;
    }

    function count_dpt_search($tps, $key){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('no_tps', $tps);
        $this->db->where('status', '1');
        if (is_numeric($key)) {
                $this->db->like('nim',$key);
        } else {
                $this->db->like('nama',$key);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function update($nim, $data){
    	$this->db->where('nim', $nim);
    	$query = $this->db->update('tb_user', $data);
    	return TRUE;
    }
}

?>
