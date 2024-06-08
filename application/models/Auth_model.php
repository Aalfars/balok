<?php 
class Auth_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    public function get_username($username){
        $query = $this->db->get_where('pengguna', array('username' => $username));
        return $query->row();
    }
      
}
?>