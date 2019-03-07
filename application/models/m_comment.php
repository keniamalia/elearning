<?php
    class M_Comment extends CI_Model{
        public function add_comment($comment, $id_course, $id_user){
            $data_array = array(
                'comment_desc' => $comment,
                'id_course' => $id_course,
                'id_user' => $id_user
            );

            $query = $this->db->insert('comment', $data_array);

            return $query;
        }
    }