<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_tps extends CI_Model {

    public function get_fakultas($tps) {
    	$this->db->select('*');
    	$this->db->from('tb_tps');
    	$this->db->where('no_tps', $tps);
        return $this->db->get();
    }

    public function get_data() {
        $this->db->select('*');
        $this->db->from('tb_tps');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tps($fakultas) {
        $query = $this->db->get_where('tb_tps', $fakultas);
        return $query->result();
    }
}
?>
