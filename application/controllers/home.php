<?php
    class Home extends CI_Controller{
        function index(){
            $this->load->view('call_css');
            $this->load->view('header');
            
            $getListData['data'] = $this->m_course->get_list_cource();

            $this->load->view('main_course', $getListData);
        }

        function detail_course(){
            $id_course = $this->input->post('id_course');

            echo $id_course;
            $this->load->view('call_css');

            $getDetail = $this->m_course->detail_courses($id_course);

            echo $getDetail;

            // if($getDetail != false){
            //     $this->load->view('detail_course', $getDetail);
            // }
            // else{
            //     echo "<script type='text/javascript'>
	        //        		alert('Data is empty');
	        //           </script>";
            // }
        }

    }
?>