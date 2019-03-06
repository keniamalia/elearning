<?php
class User extends CI_Controller{
    function index(){
        $this->load->view('call_css');
        $this->load->view('login');
    }
    function user_login(){
        $userName = $this->input->post('username');
        $password = md5($this->input->post('password')); //MD5

        if($userName != null && $password != null){

            $login = $this->m_user->login($userName, $password);

            if($login == TRUE){
                $session_data = array(
                    'id_user'   => $login['dataresult']['id_user'],
                    'username' => $login['dataresult']['username'],
                    'role_name' => $login['dataresult']['role_name']
                );
                //set session userdata
                $this->session->set_userdata($session_data);

            }else{
                echo "<script type='text/javascript'>
	               		alert('Invalid Username or Password');
	                  </script>";
            }
        }
        else{
            echo "<script type='text/javascript'>
	                alert('Some field is empty');
	              </script>";
        }

        
    }
    
    function register_user(){
        $userName = $this->input->post('username');
        $password = md5($this->input->post('password')); //MD5
        $fullname = $this->input->post('fullname'); //MD5
        $email = $this->input->post('email'); //MD5
        $no_telp = $this->input->post('no_telp'); //MD5
        $role_id = $this->input->post('role_id'); //MD5

        if($userName != NULL && $password != NULL && $fullname != NULL && $email != NULL && $no_telp != NULL && $role_id != NULL){
            $check_data = $this->ms_user->check_user($userName, $email);

            if($check_data != TRUE){
                $this->m_user->add_user($userName, $password, $fullname, $no_telp, $email, $role_id);
                
            }
        }
    }
}
?>