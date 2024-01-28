<?php
if(!isset($_SESSION)){
    session_start();
}

include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail= $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Course learning</title>
</head>
<body>
    <div class="container-fluid bg-success p-4">
        <h3>Welcome to Online Learning</h3>
        <a href="./mycourse.php" class="btn btn-danger">My Course</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-4 w-75 ml-3 " controls></video>
            </div>
    

            <div class="col-sm-4 border-right-3">
                <ul id="playlist" class=" nav flex-column " >
                    <?php 
                    if(isset($_GET['course_id'])){
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id='$course_id'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '<li class="nav-item border-bottom py-2"
                                 movieurl='.$row['lesson_link'].'
                                  style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            
        </div>
    </div>
    <script   type="text/javascript" src="../js/jquery.min.js"></script>
    <script  type="text/javascript" src="../js/popper.min.js"></script>
    <script  type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script  type="text/javascript" src="../js/all.min.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>
