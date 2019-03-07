
<div class="headline">
    <h1>Courses</h1>
    
    <div class="row">
        <?php
         if(strtolower($this->session->userdata('role_name') == strtolower("dosen"))){
        ?>
        <form class="container right" action="<?php echo base_url() . 'home/index_course' ?>">
            <button type="submit" class="dropbtn">Add Course </button>
        </form>
    <?php
        }
        foreach($data as $row){
    ?>
    <div class="container items">
        <div class="col-5">
            <div class="course">
                <img src="<?php echo base_url() . $row['attachment'] ?>">
            </div>
        </div>
        <div class="col-7">
            <h3><?php echo $row['course_name']?></h3><hr>
            <h4>Duration: <?php echo $row['duration']?> Jam</h4>
            <form class="btn" action="<?php echo base_url() . 'home/download/'?>" method="post">
                <input type="hidden" name="download" value="<?php echo $row['attachment'] ;?>" />
                <button type="submit" class="dropbtn">Download Attachment</button>
            </form>
            <form class="btn" action="<?php echo base_url() . 'home/detail_course/'; ?>" method="post">
                <input type="hidden" name="id_course" value="<?php echo $row['id_course']?>" />
                <button type="submit" class="dropbtn">See Details</button>
            <?php
                if(strtolower($this->session->userdata('role_name') == strtolower("dosen"))){
                    ?>
                    <div class="dropdown">
                        <button class="dropbtn">Action</button>
                            <div class="dropdown-content">
                                <a href="<?php echo base_url() . '/home/index_edit/' . $row['id_course'] ?>">Edit</a>
                                <a href="<?php echo base_url() . '/home/remove_course/' . $row['id_course'] ?>">Delete</a>
                            </div>
                    </div>
                <?php }
            ?>
            </form> 
        </div>
    </div>
    <?php
        }
    ?>
    </div>
</div>