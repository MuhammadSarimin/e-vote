<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  /**
    * Get All Data from this method.
    *
    * @return Response
   */

  public function index(){
    $this->mypdf();
  }

   /**
    * Get Download PDF File
    *
    * @return Response
   */

  function mypdf(){
    $this->load->library('pdf');
    $this->pdf->setPaper('A4');
  	$this->pdf->load_view('mypdf');
  	$this->pdf->render();
  	$this->pdf->stream('welcome.pdf');
    //header('Content-Type: application/pdf');
    //header('Content-Disposition: attachment; filename="'.$file.'"');
    //readfile($file);

   }

}

?>