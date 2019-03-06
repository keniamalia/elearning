<?php

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller{

    public function index_post() {
        $action = $this->input->post('action');
        echo $action;
        switch ($action) {
            case "login":
            $this->login();
            break;
            default :
            break;
        }
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login= $this->m_user->login($username, $password);

        if ($login == true) {
            $this->set_response($login['dataresult'], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($login['dataresult'], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }
}
?>