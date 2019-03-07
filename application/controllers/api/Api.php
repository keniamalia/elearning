<?php

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller{

    public function index_post() {
        $action = $this->input->post('action');
        switch ($action) {
            case "login":
            $this->login();
            break;
            case "insertCourse":
            $this->insertCourse();
            break;
            default :
            $this->not_found();
            break;
        }
    }
    public function index_get() {
        $action = $this->input->get('action');
        switch ($action) {
            case "getListCourse":
            $this->getListCourse();
            break;
            default :
            $this->not_found();
            break;
        }
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login= $this->m_user->login($username, $password);

        if ($login == true) {
            $this->set_response($login, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($login, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }

    public function getListCourse(){
        $list_course = $this->m_course->get_list_cource();

        if(!empty($list_course)){
            $this->set_response($list_course, REST_Controller::HTTP_OK);
        }
        else{
            $this->empty_data();
        }
    }

    public function insertCourse(){
        $course_name = $this->input->post('course_name');
        $duration = $this->input->post('duration');
        $attachment = $this->input->post('attachment');
        $desc = $this->input->post('description');

        $insert = $this->m_course->insert_course($course_name, $duration, $desc, $attachment);

        if($insert > 0){
            $this->response_success();
        }
        else{
            $this->response_failed();
        }
    }

    public function empty_data() {
        $this->set_response([[
        'success' => "false",
        'message' => 'empty data'
            ]], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
    }

    public function response_success() {
        $this->set_response([[
        'success' => "true",
        'message' => 'Insert successfully'
            ]], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
    }
    public function response_failed() {
        $this->set_response([[
        'success' => "false",
        'message' => 'Insert Failed'
            ]], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
    }
}
?>