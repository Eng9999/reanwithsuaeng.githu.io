<?php
// កន្លែង បិទមិនអោយ គេចូលក្នុងadmin
if(!isset($_SESSION)){
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
}

// ---------------------------------------------------------------------
if (isset($_POST['lessonSubmitBtn'])) { // Check if the form has been submitted
    if (empty($_POST['lesson_name']) || empty($_POST['lesson_desc']) ||
        empty($_POST['course_id']) || empty($_POST['course_name'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
    } else {
        $lesson_name = $_POST['lesson_name'];
        $lesson_desc = $_POST['lesson_desc'];
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lessonvideos/' .$lesson_link;

        // Check if the uploaded file is a video and if it's not too large
        $allowed_extensions = array("mp4", "avi", "mov", "flv", "wmv");
        $file_extension = pathinfo($lesson_link, PATHINFO_EXTENSION);
        if(!in_array($file_extension, $allowed_extensions)){
            die("Error: Please select a valid video file format.");
        }
        $file_size = $_FILES['lesson_link']['size'];
        if($file_size > 500000000000000000000000){ // Limit the video size to 50MB (size is in bytes)
            die("Error: File size exceeds limit.");
        }

        move_uploaded_file($lesson_link_temp,$link_folder);

        $sql = "INSERT INTO `lesson`(`lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`)
                VALUES (' $lesson_name', ' $lesson_desc', ' $link_folder', '$course_id', '$course_name')";

        if ($conn->query($sql)==TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add course!</div>';
        }
    }
}
// ----------------------------------------------------------
?>






<div class="col-sm-5 mt-5 mx-3 bg-body-secondary" style="border-radius: 12px;">
    <h3 class="text-center">Add New Lessson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id"
             value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
            value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>"
            >
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson video Link</label><br>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link" readonly>
        </div>
        <br><br>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
            <br><br>
            <?php if(isset($msg)){echo $msg; } ?>
        </div>
    </form>
</div>

<?php include('./admininclude/footer.php'); ?>