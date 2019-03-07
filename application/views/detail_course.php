<div class="headline">
        <h2>Detail Course</h2>
        <hr>    
    <br>
        <div class="details-body">
            <div class="details-left">
                <img src="<?php echo base_url() . $data['attachment']?>" />
                <hr>
                <p><a href="<?php echo base_url() . '/home/download/' . $data['attachment']?>">Download Attachment</a></p>
            </div>
            <div class="details-right">
                <h1><?php echo $data['course_name']?></h1>
                <p>Duration: <?php echo $data['duration']?></p>
                <br>
                <hr>
                <p style="font-size: 18px"><?php echo $data['description']?></p>
            </div>
        </div>
        <div class="details-body">
                <center><h3>Add Comment</h3></center>
                <form action="<?php echo base_url() . 'home/add_comment/' ?>" method="post">
                    <center><textarea name="comment" rows="10" cols="150"></textarea>
                    <input type="hidden" name="<?php $data['id_course']?>" value="<?php $data['id_course']?>" />
                    
                    <input type="hidden" name="<?php echo $this->session->userdata('id_role')?>" value="<?php echo $this->session->userdata('id_role') ?>" />
                    <br>
                    <button class="dropbtn" type="submit">Comment</button></center>
                </form>
        </div>
    </div>