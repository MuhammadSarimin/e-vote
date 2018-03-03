<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_vote extends CI_Model {

    public function insert_data($data){
      $this->db->insert('tb_vote', $data); 
      return TRUE;
    }
    
    public function akumulasi_tps($kode, $tps){
      $sql = "SELECT *, ROUND((total_suara / (SELECT SUM(total_suara) FROM TPS WHERE kode_kddt LIKE '$kode%' ))*100, 2)  as persentase FROM TPS WHERE kode_kddt LIKE '$kode%' AND no_tps=$tps ORDER BY kode_kddt";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0){
        foreach ($query->result() as $data) {
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    public function tps($kode){
      $sql = "SELECT *, ((total_suara / (SELECT SUM(total_suara) FROM TPS WHERE kode_kddt LIKE '$kode%' ))*100)  as persentase FROM TPS WHERE kode_kddt LIKE '$kode%' ORDER BY kode_kddt";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0){
        foreach ($query->result() as $data) {
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    public function akumulasi($kode){
      $sql = "SELECT *, ROUND((total_suara / (SELECT SUM(total_suara) FROM AKUMULASI WHERE kode_kddt LIKE '$kode%' ))*100, 2)  as persentase FROM AKUMULASI WHERE kode_kddt LIKE '$kode%' ORDER BY kode_kddt";
      
      $query = $this->db->query($sql);
      if($query->num_rows() > 0){
        foreach ($query->result() as $data) {
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    public function count_suara_masuk($kode){
      $sql = "SELECT SUM(total_suara) as Entry FROM akumulasi where kode_kddt LIKE '$kode%'";
      $query = $this->db->query($sql);
      return $query;
    }

    public function vote_tps($kode, $no_tps){
      $this->db->select('*');
      $this->db->from('TPS');
      $this->db->where('no_tps', $no_tps);
      $this->db->like('kode_kddt', $kode);
      $this->db->group_by('kode_kddt');
      $query = $this->db->get();
      return $query->result();
    }

    public function persentase_dpt($tps=null){
      if($tps==null){
        $sql = "SELECT *, SUM(total_dpt - suara_masuk) AS belum, ROUND( SUM((suara_masuk / total_dpt)*100), 2) AS persentase_masuk FROM suara_masuk GROUP BY no_tps;";
      }
      else{
        $sql = "SELECT *, SUM(total_dpt - suara_masuk) AS belum, ROUND( SUM((suara_masuk / total_dpt)*100), 2) AS persentase_masuk FROM suara_masuk WHERE no_tps = $tps GROUP BY no_tps;";
      }
      $query = $this->db->query($sql);
      return $query->result();
    }

}
