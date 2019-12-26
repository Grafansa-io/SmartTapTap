<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');

	}

	function index(){
		$this->load->view('welcome_message');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => sha1($password)
			);
		$cek = $this->login_model->cek_login("data_akses",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("blog"));

		}else{
			//echo "Username dan password salah !";
			$data['username'] = $username;
  	  		$data['pesan'] = "Mungkin anda lupa password nya.";
  	  		echo "Anda gagal login";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
?>