<?php

class C_ppru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $link = base_url();
        if ($this->session->nim == ""){
            session_start();
            redirect($link);
        }
        if ($this->session->status != "3"){
            $this->session->sess_destroy();
            redirect($link);
        }

        $this->load->library('pagination');
        $this->load->model('model_vote');
        $this->load->model('model_user');
        $this->load->model('model_tps');
        $this->load->library('pdf');

    }

    public function index() {
        $tps = $this->session->userdata('no_tps');
        $data['PERCENT'] = $this->model_vote->persentase_dpt($tps);
        $this->load->view('ppru/index', $data);
    }

    public function load(){
        $this->load->model('model_user');
        $tps = $this->session->userdata('no_tps');

        if (isset($_POST['keyword'])) {
            $search = $this->input->post('key');
            $total = $this->model_user->count_dpt_search($tps, $search);
        }
        else {
            $search = null;
            $total = $this->model_user->count_dpt($tps);
        }


        $page = $this->input->get('per_page');

        $batas = 10; //jlh data yang ditampilkan per halaman
        if(!$page){     //jika page bernilai kosong maka batas akhirnya akan di set 0
           $offset = 0;
        }else{
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        }
        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url('index.php/c_ppru/load');   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $total; // jlh total dpt
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas
        $config['uri_segment'] = $page; //posisi pagination dalam url
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();
        $data['jlhpage'] = $page;

        $data['dpt'] = $this->model_user->lihat_dpt($tps,$search,$batas,$offset); //query model

        $this->load->view('ppru/dpt',$data);
    }

    public function validasi($nim){
        $tps = $this->session->userdata('no_tps');
        $karakter = "ABCDEFGHIJKLMNOPQRSTUVWQYZ1234567890";
        $password = substr(str_shuffle($karakter),0,8);
        $datas = array(
            'pass' => md5($password),
            'status' => 0
        );

        $this->load->model('model_user');
        $validasi = $this->model_user->update($nim, $datas);

        if($validasi){
            $link = base_url('index.php/c_ppru/load');
            echo "<script>alert('Validasi User dengan NIM : $nim Sukses. Simpan Password Berikut : $password');window.location.replace('$link');</script>";
        }

    }

    public function report(){
        $this->load->model('model_vote');
        $tps = $this->session->userdata('no_tps');
        $query = $this->model_vote->akumulasi_tps('PRES', $tps);
        $data['KLASEMEN'] = null;
        if($query){
            $data['KLASEMEN'] = $query;
        }

        $query1 = $this->model_vote->akumulasi_tps('DPM', $tps);
        $data['RANKING'] = null;
        if($query1){
            $data['RANKING'] = $query1;
        }
        $this->load->view('ppru/report', $data);
    }

    public function hasil_vote(){

    }

    public function chart() {
        $this->load->model('model_vote');
        $tps = $this->session->userdata('no_tps');
        $query = $this->model_vote->akumulasi_tps('PRES', $tps);
        $json_data = array();
        foreach ($query as $result) {
            $data['kandidat'] = $result->nama_kddt.' - '.$result->nama_psgn;
            $data['persentase'] = $result->persentase.'%';
            array_push($json_data,$data);
        }
        print json_encode($json_data);
    }

    public function cetak_ba(){
        $tps = $this->session->userdata('no_tps');
        $nama = 'Berita Acara TPS '.$tps;
        $query = $this->model_vote->vote_tps('PRES', $tps);
        $data['HASIL'] = null;
        if($query){
            $data['HASIL'] = $query;
        }
        $result = $this->model_tps->get_fakultas($tps)->row(); //mendapatkan fakultas tps
        $data['FAKULTAS'] = $result->nama;
        //$this->load->view('mypdf', $data);
        $this->pdf->setPaper('A4');
        $this->pdf->load_view('mypdf', $data);
        $this->pdf->render();
        $this->pdf->stream($nama);
    }
}

?>
