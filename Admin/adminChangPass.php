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
}

$msg = '';

if (isset($_POST['adminUpdatePass'])) {
    if (empty($_POST['adminPass'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
    } else {
        $adminPass = $_POST['adminPass'];

        $sql = "UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";

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
    <h3 class="text-center">Update Admin Password</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="admin_email">Admin Email</label>
            <input type="email" class="form-control" id="InputEmail" value="<?php echo $adminEmail; ?>" disabled>
        </div>
        <br>
        <div class="form-group">
            <label for="adminPass">New Password</label>
            <input type="password" class="form-control" id="inputNewPass" name="adminPass" placeholder="New Password">
        </div>
        <br><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="adminUpdatePass" name="adminUpdatePass">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
            <br><br>
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
        </div>
    </form>
</div>

<?php include('./admininclude/footer.php'); ?>