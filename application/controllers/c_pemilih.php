<?php

class C_pemilih extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $link = base_url();
        if ($this->session->nim == ""){
            session_start();
            redirect($link);
        }
        if ($this->session->status != "0"){
            $this->session->sess_destroy();
            redirect($link);
        }
    }

    public function index() {
        $this->load->model('model_user');
        $data['nim'] = $this->session->userdata('nim');
        $data['nama'] = $this->session->userdata('nama');
        $data['no_tps'] = $this->session->userdata('no_tps');
        $this->lihat_kddt_pres();
    }

    public function lihat_kddt_pres(){
        $this->load->model('model_kandidat');
        $query = $this->model_kandidat->kddt_presma('PRES'); //lihat kandidat dengan kode PRES
        $data['KANDIDAT'] = null;
        if($query){
            $data['KANDIDAT'] = $query;
        }
        $this->load->view('pemilih/index', $data);
    }

    public function lihat_kddt_dpm(){
        $tps = $this->session->userdata('no_tps');
        $this->load->model('model_tps');
        $result = $this->model_tps->get_fakultas($tps)->row(); //mendapatkan fakultas asal pemilih
        $fakultas = $result->fakultas;
        $this->load->model('model_kandidat');
        $query = $this->model_kandidat->lihat_kddt($fakultas, 'DPM'); //lihat kandidat dengan kode DPM
        $dpm['KANDIDAT'] = null;
        if($query){
            $dpm['KANDIDAT'] = $query;
        }
        $this->load->view('pemilih/index', $dpm);
    }

    public function pilih_kddt($kode){
        $wil = $this->session->userdata('no_tps');
        $nim = $this->session->userdata('nim');

        $vote = array(
            'no_tps' => $wil,
            'kode_kddt' => $kode
        );
        $this->load->model('model_vote');
        $query = $this->model_vote->insert_data($vote);
        if($query){
            $datas = array(
                'status' => 99
            );
            $this->load->model('model_user');
            $change = $this->model_user->update($nim, $datas);

            if($change){
                $link = base_url();
                $this->session->sess_destroy();
            }
            echo "<script>alert('Anda telah selesai memilih. Terima kasih.');window.location.replace('$link');</script>";
        }
    }
}

?>