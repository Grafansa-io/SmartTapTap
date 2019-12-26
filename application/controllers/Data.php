<?php
class Data extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('data_model');
    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
	  }
  }

  function index(){
    $data['Title'] = "Data apa yang anda mau lihat ?";
    $this->load->view('blog_view',$data);
  }

  function siswa(){
  	$data['Title'] = "Menampilkan data siswa.";
    $data['record'] = $this->data_model->get_siswa();
    $this->load->view('blog_view',$data);
  }

  function absen(){
  	$data['Title'] = "Menampilkan data absen.";
    $data['record'] = $this->data_model->get_absen();
    $this->load->view('blog_view',$data);
  }

}
?>