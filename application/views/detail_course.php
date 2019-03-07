<div class="headline">
    <h2>Detail Course</h2>
    <hr>    
    <br>
    <div class="items">
        <div class="details-body">
            <div class="details-left">
                <img src="<?php echo base_url() . $data->attachment?>" />
            </div>
            <div class="details-right">
                <h1><?php echo $data->course_name?></h1>
                <p>Duration: <?php echo $data->duration?> Jam</p>
                <br>
                <hr>
                <p style="font-size: 18px"><?php echo $data->description?></p>
            </div>
        </div>
        <div class="details-body">
                <form action="<?php echo base_url() . 'comment/insert_comment/' ?>" method="post" >
                    <h3>Add Comment</h3>
                    <textarea name="comment" rows="10" cols="121" ></textarea>
                    <br>
                    <input type="hidden" name="id_course" value="<?php echo $data->id_course?>" />
                    <input type="hidden" name="id_role" value="<?php echo $this->session->userdata('id_role') ?>" />
                    <button class="dropbtn" type="submit">Comment</button>
                </form>
        </div>
        
    </div>
</div>