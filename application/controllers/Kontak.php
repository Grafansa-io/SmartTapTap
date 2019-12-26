<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('idcard');
        if ($id == '') {
            $card = $this->db->get('card')->result();
        } else {
            $this->db->where('idcard', $id);
            $card = $this->db->get('card')->result();
        }
        $this->response($card, 200);
    }

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'idcard'           => $this->post('id'),
                    'idnfc'          => $this->post('idnfc'),
                    'nis_siswa'    => $this->post('nis_siswa'));
        $insert = $this->db->insert('card', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>