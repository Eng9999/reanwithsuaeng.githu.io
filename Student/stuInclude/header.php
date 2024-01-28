<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit;
}

$sql = "SELECT stu_img FROM student WHERE stu_email='$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color:#225470;">
        <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">
            E-Learning
        </a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3"><a href="http://localhost:8080/ELearning/index.php">
                            <img src="<?php echo htmlspecialchars($stu_img); ?>" alt="studentimage" class="img-thumbnail rounded-circle" width="100px" height="100px">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link <?php if ('profile' == $page) {
                                echo 'active';
                            } ?>">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mycourse.php" class="nav-link <?php if ('mycourse' == $page) {
                                echo 'active';
                            } ?>">
                               <i class="fa-solid fa-file"></i>
                                My Courses <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link <?php if ('feedback' == $page) {
                                echo 'active';
                            } ?>">
                                <i class="fa-solid fa-comment"></i>
                                Feedback <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePass.php" class="nav-link <?php if ('changepassword' == $page) {
                                echo 'active';
                            } ?>">
                                <i class="fa-solid fa-lock"></i>
                                Change Password <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link <?php if('logout' == $page) {
                                echo 'active';
                            } ?>">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <!-- Rest of the HTML content goes here -->
        <?php include('footer.php')?>
  