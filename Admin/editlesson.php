<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
    exit; // Add this line to stop executing the rest of the code if the user is not logged in
}

$msg = '';

if (isset($_REQUEST['requestUpdate'])) {
    if (empty($_REQUEST['lesson_id']) || empty($_REQUEST['lesson_name']) ||
        empty($_REQUEST['lesson_desc']) || empty($_REQUEST['course_id']) ||
        empty($_REQUEST['course_name'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
    } else {
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $ccourse_id = $_REQUEST['course_id'];
        $ccourse_name = $_REQUEST['course_name'];
        $llink = '../lessonvideos/' . $_FILES['lesson_link']['name'];
        move_uploaded_file($_FILES['lesson_link']['tmp_name'], $llink);

        $sql = "UPDATE lesson SET lesson_name='$lname', lesson_desc='$ldesc',
        course_id='$ccourse_id', course_name='$ccourse_name',
        lesson_link='$llink'
        WHERE lesson_id='$lid'";

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update course!</div>';
        }
    }
}

?>

<div class="col-sm-5 mt-5 mx-3 bg-body-secondary" style="border-radius: 12px;">
    <h3 class="text-center">Update Lesson Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id"
                   value="<?php if (isset($row['lesson_id'])) {
                       echo $row['lesson_id'];
                   } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name"
                   value="<?php if (isset($row['lesson_name'])) {
                       echo $row['lesson_name'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc"
                      rows="2"><?php if (isset($row['lesson_desc'])) {
                    echo $row['lesson_desc'];
                } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id"
                   value="<?php if (isset($row['course_id'])) {
                       echo $row['course_id'];
                   } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
                   value="<?php if (isset($row['course_name'])) {
                       echo $row['course_name'];
                   } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
                <div class="ratio ratio-16x9">
                <iframe src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];} ?>" title="YouTube video" class="object-fit-cover border rounded" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <div class="text-center">
            <button type="submit"class="btn btn-danger" id="requestUpdate" name="requestUpdate">
                Update
            </button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
            <br><br>
            <?php echo $msg; ?>
        </div>
    </form>
</div>
<?php include('./admininclude/footer.php'); ?>