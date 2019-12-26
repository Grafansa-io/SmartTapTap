<?php
class Login_model extends CI_Model{
    //cek username dan password login
    function cek_login($table,$where){      
        return $this->db->get_where($table,$where);
    }
 
}

?>