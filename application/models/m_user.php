<?php
class M_User extends CI_Model{
    function login($username, $password){
        $query = $this->db->query("SELECT a.id_user, a.fullname, a.username, a.password, a.role_id, b.role_name
                                   FROM user a
                                   JOIN user_role b on a.role_id = b.iduser_role
                                   WHERE username = '" . $username . "'");
        
        if($query->num_rows() == 0){
            $dataresult = array(array('status' => false, 'message' => 'Invalid Username or Password'));
        }
        else{
            $row = $query->row();
            
            if(password_verify($password, $row->password)){
                $dataresult = array('status' => true, 'id_user' => $row->id_user, 'username' => $row->username,
                                    'password' => $row->password, 'role_name' => $row->role_name, 'role_id' => $row->role_id);
                
            }
            return array('status' => true, 'dataresult' => $dataresult);
        }
        
    }
    
    function add_user($username, $password, $fullname, $noTelp, $email, $role_id){
        $data = array('username' =>$username ,
                      'password' =>$password,
                      'fullname' => $fullname,
                      'no_telp' =>$noTelp,
                      'email' => $email,
                      'fullname'=> $fullname,
                      'role_id' => $role_id
 					 );
		return $this->db->insert('user', $data);      
    }

    function check_user($username, $email){
        $check_username = $this->db->where('user.username', $username)->get('user')->num_rows();

        if($check_username > 0){
            return TRUE;
        }
        else{
            $check_email = $this->db->where('user.email', $email)->get('user')->num_rows();

            if($check_email > 0){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
    function get_user_role(){
        $query = $this->db->get('user_role');

        $result = $query->result_array();

        return $result;
    }
}
?>