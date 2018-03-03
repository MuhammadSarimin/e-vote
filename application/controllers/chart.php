<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_vote');
    }

    public function index(){
        $data['report'] = $this->model_vote->akumulasi_presma();
        $this->load->view('chart', $data);

    }

    /*

	public function ranking(){
		$this->load->model('model_vote');
		$query = $this->model_vote->akumulasi_presma();
		$data['rank'] = null;

		if($query){
			$data['rank'] = $query;
		}

		$this->load->view('login', $data);
	}
	*/
}
