<?php
    class M_Course extends CI_Model{
        function get_list_cource(){
            $query = $this->db->query("SELECT * from MS_Course");

            $result = $query->result_array();

            $course = array();

            foreach($result as $row){
                $temp = array('success' => "true", 'id_course' => $row['id_course'], 'course_name' => $row['course_name'],
                                'description' =>  $row['description'],'attachment' => base_url() + $row['attachment'], 'duration' => $row['duration']);
                array_push($course, $temp);
            }

            return $course;
        }

        function insert_course($course_name, $duration, $descrtiption, $attachment){
            $data_array = array(
                'course_name' => $course_name,
                'duration' => $duration,
                'description' => $descrtiption,
                'attachment' => $attachment
            );

            $this->db->insert('ms_course', $data_array);

            return $this->db->affected_rows();
        }

        function detail_courses($id_course){
            $query = $this->db->where('ms_course.id_course', $id_course)->limit(1)->get('ms_course')->row();

            return $query;
        }
    }
?>