<form action="<?php echo base_url() . 'home/insert_course/'?>" method="post" enctype="multipart/form-data">
    <label for="course_name">Course Name</label>
    <input type="text" name="course_name" />
    <label for="duration">Duration</label>
    <input type="text" name="duration" />
    <label for="description">Descrtiption</label>
    <textarea name="description"></textarea>
    <label for="image">Attachment</label>
    <input type="file" name="image" />
    <button type="submit">Save</button>
</form>