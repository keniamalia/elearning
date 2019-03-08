<?php

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller{

    public function index_post() {
        $action = $this->post('action');
        switch ($action) {
            case "login":
            $this->login();
            break;
            case "insertCourse":
            $this->insertCourse();
            break;
            case "insertComment":
            $this->insertComment();
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
            case "getDetailCourse":
            $this->getDetailCourse();
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
        $description = $this->input->post('description');


        $path = './uploads/image/'. $course_name. '/';

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = 'course'.time();
            $config['max_size'] = 60000;

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload($this->post('image'));

            $uploadData = $this->upload->data();

            $picture = $uploadData['file_name'];

            $imageurl = substr($path, 2).$picture;

            $insert = $this->m_course->insert_course($course_name, $duration, $description, $imageurl);

            if($insert > 0){
                $this->response_success();
            }
            else{
                $this->response_failed();
            }
        
    }
    private function empty_data() {
        $this->set_response([[
        'success' => "false",
        'message' => 'empty data'
            ]], REST_Controller::HTTP_OK); 
    }
    private function not_found() {
        $this->set_response([[
        'success' => "false",
        'message' => "Not found"
            ]], REST_Controller::HTTP_OK);
    }

    private function response_success() {
        $this->set_response([[
        'success' => "true",
        'message' => 'Insert successfully'
            ]], REST_Controller::HTTP_OK);
    }
    private function response_failed() {
        $this->set_response([[
        'success' => "false",
        'message' => 'Insert Failed'
            ]], REST_Controller::HTTP_OK);
    }

    public function getDetailCourse(){
        $id_course = $this->get('id_course');

        if($id_course == null || $id_course == 0){
            $this->set_response([[
                'success' => "false",
                'message' => "ID cannot be null"
            ]], REST_Controller::HTTP_OK);
        }
        else{
            $data = $this->m_course->detail_courses($id_course);

            if(!empty($data)){
                $course_data = array('success' => "true", 'id_course' => $data->id_course, 'course_name' => $data->course_name, 'duration' => $data->duration,
                              'description' => $data->description, 'attachment' => base_url() . $data->attachment);
                
                $this->set_response($course_data, REST_Controller::HTTP_OK);
            }
            else{
                $this->empty_data();
            }
        }

    }

    public function insertComment(){
        $comment = $this->post('comment');
        $id_course = $this->post('id_course');
        $id_user = $this->post('id_user');

        $insert = $this->m_comment->add_comment($comment, $id_course, $id_user);

        if($insert){
            $this->response_success();
        }
        else{
            $this->response_failed();
        }
    }
}
?>