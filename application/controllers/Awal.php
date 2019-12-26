<?php
//class Awal extends CI_Controller{
 
//  function index(){
      //echo "Hello World";
 // }
 // function show(){
    //  echo "I Make The World Better Place.";
  //}
 
//}


class Awal extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->view('blog');
	}
}
?>