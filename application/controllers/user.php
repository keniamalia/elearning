<?php
class User extends CI_Controller{
    function index(){
        $this->load->view('call_css');
        $this->load->view('login');
    }
    function register_index(){
        $this->load->view('call_css');

        $data_role['data'] = $this->m_user->get_user_role();

        if(count($data_role) > 0){
            $this->load->view('register', $data_role);
        }

    }
    function user_login(){
        $userName = $this->input->post('username');
        $password = $this->input->post('password'); //MD5

        if($userName != null && $password != null){

            $login = $this->m_user->login($userName, $password);

            if($login == TRUE){
                $session_data = array(
                    'id_user'   => $login['dataresult']['id_user'],
                    'username' => $login['dataresult']['username'],
                    'role_name' => $login['dataresult']['role_name'],
                    'id_role' => $login['dataresult']['role_id']
                );
                //set session userdata
                $this->session->set_userdata($session_data);

                redirect("home");
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
        $password = $this->my_lib->hashing($this->input->post('password'));
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email'); 
        $no_telp = $this->input->post('no_telp');
        $role_id = $this->input->post('roles');

        //echo $role_id;

        if($userName != NULL && $password != NULL && $fullname != NULL && $email != NULL && $no_telp != NULL && $role_id != NULL){
            $check_data = $this->m_user->check_user($userName, $email);

            if($check_data != TRUE){
                $regis = $this->m_user->add_user($userName, $password, $fullname, $no_telp, $email, $role_id);

                if($regis == TRUE){
                    $this->load->view('call_css');
                    $this->load->view('login');
                }
                else{
                    echo "<script type='text/javascript'>
	               		alert('Failed to add user');
	                  </script>";
                }
                
            }else{
                echo "<script type='text/javascript'>
	               		alert('Email or Username already exist');
	                  </script>";
            }
        }
        else{
            echo "<script type='text/javascript'>
	               	alert('Some field is empty');
	              </script>";
        }
    }

    function user_logout(){
        $this->session->sess_destroy();
        
        $this->load->view('login');
    }

}
?>