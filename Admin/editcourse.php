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
$msg = '';

if (isset($_POST['requestUpdate'])) {
    if (empty($_POST['course_name']) || empty($_POST['course_desc']) ||
        empty($_POST['course_author']) || empty($_POST['course_duration']) ||
        empty($_POST['course_price']) || empty($_POST['course_original_price'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
    } else {
        $cid = $_POST['course_id'];
        $cname = $_POST['course_name'];
        $cdesc = $_POST['course_desc'];
        $cauthor = $_POST['course_author'];
        $cduration = $_POST['course_duration'];
        $cprice = $_POST['course_price'];
        $coriginalprice = $_POST['course_original_price'];
        $cimg = '../image/courseimg/' . $_FILES['course_img']['name'];
        move_uploaded_file($_FILES['course_img']['tmp_name'], $cimg);

        $sql = "UPDATE course SET course_id='$cid', course_name='$cname', course_desc='$cdesc', course_author='$cauthor',
        course_duration='$cduration', course_price='$cprice',
        course_original_price='$coriginalprice',
        course_img='$cimg' WHERE course_id='$cid'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update course!</div>';
        }
    }
}

?>
<div class="col-sm-5 mt-5 mx-3 bg-body-secondary" style="border-radius: 12px;">
    <h3 class="text-center">Update Course Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM course WHERE course_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id"
                   value="<?php if (isset($row['course_id'])) {
                       echo $row['course_id'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
                   value="<?php if (isset($row['course_name'])) {
                       echo $row['course_name'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc" rows="2"><?php if (isset($row['course_desc'])) {
                    echo $row['course_desc'];
                } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author"
                   value="<?php if (isset($row['course_author'])) {
                       echo $row['course_author'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration"
                   value="<?php if (isset($row['course_duration'])) {
                       echo $row['course_duration'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price"
                   value="<?php if (isset($row['course_original_price'])) {
                       echo $row['course_original_price'];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price"
                   value="<?php if (isset($row['course_price'])) {
                       echo $row['course_price'];
                   } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Course Image</label><br>
            <img src="<?php if (isset($row['course_img'])) {
                echo $row['course_img'];
            } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requestUpdate" name="requestUpdate">
                Update
            </button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
            <br><br>
            <?php echo $msg; ?>
        </div>
    </form>
</div>

<?php include('./admininclude/footer.php'); ?>