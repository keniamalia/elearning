<?php
class M_User extends CI_Model{
    function get_user($userName, $password){
        $query = $this->db->query("SELECT * FROM user WHERE username = '" . $userName . "' and password = '" . $password . "'");
 		return $query->row();
	}
}
?>