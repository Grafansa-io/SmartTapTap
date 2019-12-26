<?php
class Data_model extends CI_Model{
 

  function get_siswa(){
    $result = $this->db->get('profile_siswa');
    return $result;
  }
   
  function get_absen(){
    $result = $this->db->get('data_abs_harian');
    return $result;
  }

  function get_card(){
    $this->db->select('*');
    $this->db->from('card');
    $this->db->join('profile_siswa','profile_siswa.nis_siswa=card.nis_siswa');
    $result = $this->db->get();
    return $result;
  }

  function savecard($idnfc,$nis_siswa){
    $data = array(
      'idnfc' => $idnfc,
      'nis_siswa' => $nis_siswa
    );
    $this->db->insert('card',$data);
  }

}
?>