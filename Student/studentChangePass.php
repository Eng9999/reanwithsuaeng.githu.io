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
$msg = '';

if (isset($_POST['stuPassUpdateBtn'])) {
    if (empty($_POST['stuNewPass'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
    } else {
        $sql="SELECT * FROM student WHERE stu_email='$stuEmail'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
        $stuPass = $_POST['stuNewPass'];

        $sql = "UPDATE student SET stu_pass='$stuPass' WHERE stu_email='$stuEmail'";
    }
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Admin Updated Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update Admin Password!</div>';
        }
    }
}
?>

<div class="col-sm-4 mt-7 mx-3 bg-body-secondary" style="border-radius: 12px;">
<br><br><br>
    <h3 class="text-center">Update Profile Password</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail">Admin Email</label>
            <input type="email" class="form-control" id="InputEmail" value="<?php echo $stuEmail; ?>" disabled>
        </div>
        <br>
        <div class="form-group">
            <label for="adminPass">New Password</label>
            <input type="password" class="form-control" id="inputNewPass" 
            name="stuNewPass" placeholder="New Password">
        </div>
        <br><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger mr-4 mt-4" id="stuPassUpdateBtn" 
            name="stuPassUpdateBtn">UPDATE</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <br><br>
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
        </div>
    </form>
</div>

<?php
include('./stuInclude/footer.php');
?>