<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit;
}

$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row['stu_occ'];
    $stuImg = $row['stu_img'];
}

if (isset($_POST['updateStuNameBtn'])) {
    if (empty($_POST['stuName'])) {
        // Message displayed if required field is missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $stuName = $_POST["stuName"];
        $stuOcc = $_POST["stuOcc"];
        $stuImg = $_FILES['stuImg']['name'];
        $stuImgTemp = $_FILES['stuImg']['tmp_name'];
        $imgFolder = '../image/courseimg/stu/'. $stuImg;
        move_uploaded_file($stuImgTemp, $imgFolder);
        
        $sql = "UPDATE student SET stu_name='$stuName', stu_occ='$stuOcc', stu_img='$imgFolder' WHERE stu_email='$stuEmail'";

        if ($conn->query($sql) === TRUE) {
            // Display success message upon successful form submission
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Profile Updated Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update Profile!</div>';
        }
    }
}
?>

<br>
<div class="col-sm-4 mt-7 mx-1" style="border-radius: 12px;">
    <br><br><br>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID:</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuId)) { echo $stuId; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php echo $stuEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if (isset($stuName)) { echo $stuName; } ?>">
        </div>
        <div class="form-group">
            <label for="stuOcc">Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) { echo $stuOcc; } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <br>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>

        <br><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="updateStuNameBtn" name="updateStuNameBtn">Update</button>
            <a href="studentProfile.php" class="btn btn-secondary">Close</a>
            <br><br>
            <?php if (isset($msg)) { echo $msg; } ?>
        </div>
    </form>
</div>

<?php
include('./stuInclude/footer.php');
?>