<?php
class Blog extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      $this->load->model('data_model');
      if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
	  }
  }
   
  function index(){
  	  $data['admin'] = "Admin 1";
  	  $data['Title'] = "Selamat datang di halaman utama.";
      $this->load->view('blog_view', $data);
  }

  function datasiswa(){
  	  $data['product'] = $this->product_model->get_siswa();
      $this->load->view('blog_view',$data);
  }
   
}
?>