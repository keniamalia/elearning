<div class="form-style-2">
        <div class="form-style-2-heading">Edit Course</div>
            <form action="<?php echo base_url() . 'home/edit_course'?>" method="post">
                    <label for="field1">
                            <span>Course ID 
                                <span class="required">*</span>
                            </span>
                            <input type="text" class="input-field" name="course" value="<?php echo $data->id_course ?>" disabled/>
                        </label>
                <label for="field1">
                    <span>Course Name 
                        <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="course_name" value="<?php echo $data->course_name ?>" />
                </label>
                <label for="field2">
                    <span>Duration
                        <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="duration" value="<?php echo $data->duration ?>" />
                </label>
                <label for="field5">
                    <span>Description
                        <span class="required">*</span>
                    </span>
                    <textarea name="description" class="textarea-field" value="<?php echo $data->description ?>"></textarea>
                </label>
                <label for="field4">
                    <span>Attachment
                        <span class="required">*</span>
                    </span>
                    <input type="file" name="image" />
                    <input type="hidden" name="oldImage" value="<?php echo $data->attachment ?>" />
                    <input type="hidden" name="id_course" value="<?php echo $data->id_course ?>" />
                </label>
        
                <label>
                    <span> </span>
                    <input type="submit" value="Submit" />
                </label>
            </form>
        </div>
    </div>