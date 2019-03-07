<?php

class Upload extends CI_Controller {

    public function do_upload() {
        $config['upload_path'] = './uploads/image/';
        $config['allowed_types'] = 'jpg|jpeg|png|';
        $config['max_size'] = 900000000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data(), 'file' => $this->input->image);
            //$this->load->view('upload_success', $data);
        }
    }

    public function _remap($method) {
        if ($method == 'do_upload') {
            $this->$method();
        } else {
            $this->index();
        }
    }
}