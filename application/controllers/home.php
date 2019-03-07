<?php
    class Home extends CI_Controller{
        function index(){
            $this->load->view('call_css');
            $this->load->view('header');
            
            $getListData['data'] = $this->m_course->get_list_cource();

            $this->load->view('main_course', $getListData);
        }
        function index_course(){
            $this->load->view('call_css');
            $this->load->view('header');
            $this->load->view('add_course');
        }
        function detail_course(){
            $id_course = $this->input->post('id_course');

            //echo $id_course;
            $this->load->view('call_css');
            $this->load->view('header');
            
            $getDetail['data'] = $this->m_course->detail_courses($id_course);
            
            if($getDetail != false){
                 $this->load->view('detail_course', $getDetail);
            }
            else{
                 echo "<script type='text/javascript'>
	                		alert('Data is empty');
	                   </script>";
            }
        }

        function insert_course(){
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
                $upload = $this->upload->do_upload('image');
    
                $uploadData = $this->upload->data();

                $picture = $uploadData['file_name'];
    
                $imageurl = substr($path, 2).$picture;

                $insert = $this->m_course->insert_course($course_name, $duration, $description, $imageurl);

                if($insert > 0){
                    echo "<script type='text/javascript'>
                          alert('Success');
                          </script>";
                    redirect('home');
                }
                else{
                    echo "<script type='text/javascript'>
                          alert('Failed');
                          </script>";
                    redirect('home');
                }
        }

        function remove_course($id_course){
            $delete = $this->m_course->delete_course($id_course);

            if($delete > 0){
                echo "<script type='text/javascript'>
                alert('Success');
                </script>";
            }
            else{
                 echo "<script type='text/javascript'>
                 alert('Failed');
                 </script>";
            }

            redirect('home');
        }
        function download(){
            $filepath = $this->input->post('download');

            //echo $filepath;
            force_download($filepath, NULL);
        }
        function edit_course(){
            $id_course = $this->input->post('id_course');
            $course_name = $this->input->post('course_name');
            $duration = $this->input->post('duration');
            $description = $this->input->post('description');
            $oldImage = $this->input->post('oldImage');

            
            if($this->input->post('image') != null){
                $path = './uploads/image/'. $course_name. '/';
    
                 if (!is_dir($path)) {
                     mkdir($path, 0777, true);
                 }
    
                 $config['upload_path'] = $path;
                 $config['allowed_types'] = 'jpg|jpeg|png';
                 $config['file_name'] = 'course'.time();
                 $config['max_size'] = 60000;
    
                 $this->load->library('upload', $config);
                 $upload = $this->upload->do_upload('image');
    
                 $uploadData = $this->upload->data();

                 $picture = $uploadData['file_name'];
    
                 $imageurl = substr($path, 2).$picture;

                 $insert = $this->m_course->update_courses($course_name, $description, $duration, $imageurl, $id_course);
            }
            else{
                $insert = $this->m_course->update_courses($course_name, $description, $duration, $oldImage, $id_course);
            }

             if($insert > 0){
                 echo "<script type='text/javascript'>
                       alert('Success');
                       </script>";
                 redirect('home');
             }
             else{
                 echo "<script type='text/javascript'>
                       alert('Failed');
                       </script>";
                 echo "gagal";
             }
        }

        function index_edit($id_course){
            $getDetail['data'] = $this->m_course->detail_courses($id_course);

            $this->load->view('call_css');
            $this->load->view('header');
            $this->load->view('update_course', $getDetail);
        }
    }
?>