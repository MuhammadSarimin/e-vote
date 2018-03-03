<?php

class C_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $link = base_url();
        $mode = 'DPM';

        if ($this->session->nim == ""){
            session_start();
            redirect($link);
        }
        if ($this->session->status != "2"){
            $this->session->sess_destroy();
            redirect($link);
        }

        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    public function index() {
        $this->load->model('model_vote');
        $data['PERCENT'] = $this->model_vote->persentase_dpt();
        $this->load->view('admin/index', $data);
    }

    public function hal_kddt(){
        $this->load->model('model_kandidat');
        $query = $this->model_kandidat->all_kddt(); // data ppru
        $data['KANDIDAT'] = null;
        if($query){
            $data['KANDIDAT'] = $query;
        }
        $this->load->view('admin/kandidat', $data);
    }

    public function hal_dpt(){
        $this->load->view('admin/dpt');
    }

    public function hal_ppru(){
        $this->load->model('model_user');
        $query = $this->model_user->get_user(3); // data ppru
        $data['PPRU'] = null;
        if($query){
            $data['PPRU'] = $query;
        }
        $this->load->view('admin/ppru', $data);
    }

    public function hal_tps(){
        $this->load->model('model_tps');
        $query = $this->model_tps->get_data(); // data ppru
        $data['TPS'] = null;
        if($query){
            $data['TPS'] = $query;
        }
        $this->load->view('admin/tps', $data);
    }

    public function tambah_kddt() {
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses
        $config['max_size'] = '2048000'; //maksimum besar file
        $config['max_width']  = '2400'; //lebar maksimum .. px
        $config['max_height']  = '1200'; //tinggi maksimum .. px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                $filename = $gbr['file_name'];
        }

        $datas = array(
            'kode_kddt' => $this->input->post('kode_kddt'),
            'nama_kddt' => $this->input->post('nama_kddt'),
            'nim' => $this->input->post('nim_kddt'),
            'nama_psgn' => $this->input->post('nama_psgn'),
            'nim_psgn' => $this->input->post('nim_psgn'),
            'fakultas' => $this->input->post('fakultas'),
            'foto' => $this->upload->data()['file_name']
        );
        //oke. buat upload foto udah ada nih
        $this->load->model('model_kandidat');
        $add = $this->model_kandidat->tambah_kddt($datas);
        
        if($add){ //jika mengembalikan nilai true
            echo "<script>alert('Data Berhasil Di perbarui');history.go(-1);</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data');history.go(-1);</script>";
        }
    }

    public function cetak_ba(){
        //$this->load->view('mypdf');
        $this->load->library('pdf');
        $this->pdf->setPaper('A4');
        $this->pdf->load_view('mypdf');
        $this->pdf->render();
        $this->pdf->stream('welcome');
    }


    public function cetak_sk(){

    }

    /*public function add_dpt(){
        $this->load->library('upload');
        $fileName = "file_".time(); //nama file
        $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 1024000;
        $this->upload->initialize($config);
         
        if(!$this->upload->do_upload('excel')) $this->upload->display_errors(); 

        if ($this->upload->do_upload('excel')){
                $xcl = $this->upload->data();
                $Name = $xcl['file_name'];
                $link = base_url();
                $inputFileName = './assets/'.$this->upload->data()['file_name'];
        
        }

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
             
        for ($row = 2; $row <= $highestRow; $row++){ //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);

            //Sesuaikan sama nama kolom tabel di database                                
            $data = array(
                "nim"=> $rowData[0][0],
                "nama"=> $rowData[0][1],
                "no_tps"=> $rowData[0][2],
                "status"=> 1
            );
                 
            //sesuaikan nama dengan nama tabel
            $this->load->model('model_user');
            $insert = $this->model_user->add_user($data);
            if($insert){
                echo "<script>alert('Data Berhasil Di perbarui');history.go(-1);</script>";
            }  else {
                echo "<script>alert('Gagal menambahkan data');history.go(-1);</script>";
            }
        }
    }*/

    public function report_dpm(){
        $this->load->model('model_vote');
        $query = $this->model_vote->tps('DPM');
        $data['KLASEMEN'] = null;
        if($query){
            $data['KLASEMEN'] = $query;
        }
        $this->load->view('admin/dpm_report', $data);
    }

    public function report_pres(){
        $this->load->model('model_vote');
        $query = $this->model_vote->tps('PRES');
        $data['KLASEMEN'] = null;
        if($query){
            $data['KLASEMEN'] = $query;
        }
        $this->load->view('admin/presma_report', $data);
    }

    public function chart(){
        $this->load->model('model_vote');
        $data['report'] = $this->model_vote->akumulasi('PRES');
        $this->load->view('admin/pres_chart', $data);
    }


    public function ajax_edit($id){
        $this->load->model('model_user');
        $data = $this->model_user->get_by_id($id);
        echo json_encode($data);
    }

    public function add_ppru(){
        $datas = array(
            'nim' => $this->input->post('user'),
            'nama' => $this->input->post('nama'),
            'pass' => md5('12345'),
            'no_tps' => $this->input->post('tps'),
            'status' => 3
        );
        $this->load->model('model_user');
        $add = $this->model_user->add_user($datas);
        $link = base_url('index.php/c_admin/hal_ppru');
        if($add){ //jika mengembalikan nilai true
            echo "<script>alert('Data Berhasil Ditambah');window.location.replace('$link');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data');window.location.replace('$link');</script>";
        }
    }

    public function edit_ppru(){
        $nim = $this->input->post('user');
        $datas = array(
            'nama' => $this->input->post('nama'),
            'pass' => md5('12345'),
            'no_tps' => $this->input->post('tps'),
            'status' => 3
        );
        $this->load->model('model_user');
        $update = $this->model_user->update($nim, $datas);
        $link = base_url('index.php/c_admin/hal_ppru');
        if($update){ //jika mengembalikan nilai true
            echo "<script>alert('Data Berhasil Diubah');window.location.replace('$link');</script>";
        } else {
            echo "<script>alert('Gagal mengubah data');window.location.replace('$link');</script>";
        }
    }

    public function delete($nim){
        $this->load->model('model_user');
        $del = $this->model_user->del_user($nim);
        $link = base_url('index.php/c_admin/hal_ppru');
        if($del){ //jika mengembalikan nilai true
            echo "<script>alert('Data Berhasil Dihapus');window.location.replace('$link');</script>";
        } else {
            echo "<script>alert('Gagal menghapus data');window.location.replace('$link');</script>";
        }
    }
}

?>