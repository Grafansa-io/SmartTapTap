<?php

class Card extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('data_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$data['dtsiswa'] = $this->data_model->get_siswa();
		$data['record'] = $this->data_model->get_card();
		$this->load->view('card_view', $data);
	}

	function savecard(){
    $idnfc = $this->input->post('idnfc');
    $nis_siswa = $this->input->post('nis_siswa');
    $this->data_model->savecard($idnfc,$nis_siswa);
    redirect(base_url("card"));
  }
}
?>