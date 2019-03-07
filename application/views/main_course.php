
<div class="headline">
    <h1>Course</h1>
    <hr>
    <br>
        <li class="row-grid">
            <?php
                foreach($data as $row){
            ?> 
            <ul class="view-grid">
                <div class="outer">
                    <img src="<?php echo $row['attachment']?>" alt="Image"   >
                </div>
                <div class="inner">
                    <h2><?php echo $row['course_name']?></h2>
                    <hr>
                    <p><?php echo $row['description']?></p>
                    <p>Duration: <?php echo $row['duration']?></p>
                    <form action="<?php echo base_url() . 'home/detail_course/' ?>" method="post">
                    <input type="hidden" name="id_course" value="id_course" />
                        <button type="submit" class="dropbtn">See Details</button>
                    <?php
                        if(strtolower($this->session->userdata('role_name') == strtolower("dosen"))){
                            ?>
                            <div class="dropdown">
                                <button class="dropbtn">Action</button>
                                    <div class="dropdown-content">
                                        <a href="<?php echo base_url() . '/home/edit/' . $row['id_course'] ?>">Edit</a>
                                        <a href="<?php echo base_url() . '/home/detail_course/' . $row['id_course'] ?>">Delete</a>
                                    </div>
                            </div>
                        <?php }
                    ?>
                    
            </form>
                </div>
                	
            </ul>
            <?php
                }
            ?>
        </li>
</div>
