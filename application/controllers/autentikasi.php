<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('model_vote');
        $data['report'] = $this->model_vote->akumulasi('PRES');
        $this->load->view('index');
    }

    public function chart_js() {
        $this->load->model('model_vote');
        $query = $this->model_vote->akumulasi('PRES');
        $json_data = array();
        foreach ($query as $result) {
            $data['kandidat'] = $result->nama_kddt.' - '.$result->nama_psgn;
            $data['persentase'] = $result->persentase.'%';
            array_push($json_data,$data);
        }
        print json_encode($json_data);
    }


    public function count_js() {
        $this->load->model('model_vote');
        $query = $this->model_vote->count_suara_masuk('PRES');
        $json_data = array();
        foreach ($query as $result) {
            $data['total'] = $result->entry;
            array_push($json_data,$data);
        }
        print json_encode($json_data);
    }

    public function cek_login() {
        $pass = $this->input->post('pass');
        $passx = $pass;
        $data = array(
            'nim' => $this->input->post('nim', TRUE),
            'pass' => $passx
        );
        $this->load->model('model_user'); // load model_user
        $hasil = $this->model_user->cek_user($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['nim'] = $sess->nim;
                $sess_data['nama'] = $sess->nama;
                $sess_data['no_tps'] = $sess->no_tps;
                $sess_data['status'] = $sess->status;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('status') == 0) {
                redirect('c_pemilih');
            } elseif ($this->session->userdata('status') == 1) {
                echo "<script>
                alert('Anda belum melakukan validasi. Silahkan validasi kepada Panitia Pemira.');history.go(-1);
                </script>";
            } elseif ($this->session->userdata('status') == 2) {
                redirect('c_admin');
            } elseif ($this->session->userdata('status') == 3) {
                redirect('c_ppru');
            } elseif ($this->session->userdata('status') == 99) {
                echo "<script>
                alert('Anda telah selesai memilih. Tidak dapat masuk ke dalam sistem kembali.');history.go(-1);
                </script>";
            }
        } else {
            echo "<script>alert('Gagal login: Cek username atau password! lah gblk');history.go(-1);</script>";
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $link = base_url();
        redirect($link);
    }

    public function reset_pass(){
        $nim = $this->session->userdata('nim');
        $pass = $this->input->post('password');
        $this->load->model('model_user');
        $data = array(
            'pass' => md5($pass)
        );
        $update = $this->model_user->update($nim, $data);
        if($update){
            echo "<script>alert('Sukses: Password telah diubah');history.go(-1);</script>";
        }
        else{
            echo "<script>alert('Gagal: Tidak dapat merubah password');history.go(-1);</script>";
        }
    }
}