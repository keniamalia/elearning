<?php
class Comment extends CI_Controller{
    function insert_comment(){
        $comment = $this->input->post('comment');
        $id_course = $this->input->post('id_course');
        $id_user = $this->input->post('id_user');

        $insert = $this->m_comment->add_comment($comment, $id_course, $id_user);

        if($insert){
            echo "<script type='text/javascript'>
	               		alert('Success');
	                  </script>";
        }else{
            echo "<script type='text/javascript'>
	               		alert('Failed');
	                  </script>";
        }

        redirect('home');
    }
}