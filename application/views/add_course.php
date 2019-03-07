<div class="form-style-2">
        <div class="form-style-2-heading">Create New Course</div>
            <form action="<?php echo base_url() . 'home/insert_course/'?>" method="post" enctype="multipart/form-data">
                <label for="field1">
                    <span>Course Name 
                        <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="course_name" value="" />
                </label>
                <label for="field2">
                    <span>Duration
                        <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="duration" value="" />
                </label>
                <label for="field5">
                    <span>Description
                        <span class="required">*</span>
                    </span>
                    <textarea name="description" class="textarea-field"></textarea>
                </label>
                <label for="field4">
                    <span>Attachment
                        <span class="required">*</span>
                    </span>
                    <input type="file" name="image" />
                </label>
        
                <label>
                    <span> </span>
                    <input type="submit" value="Submit" />
                </label>
            </form>
        </div>
    </div>