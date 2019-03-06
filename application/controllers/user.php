<?php
class User extends CI_Controller{
    function index(){
        $this->load->view('login');
    }
    function login_user(){
		    $userName = $this->input->post('username');
            $password = $this->input->post('password');

			$data['show_user'] = $this->m_user->get_user($userName, $password);
            
            $this->load->view('coba', $data);
	
	}
}
?>