<?php 
if(session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">    
  <title>OnlineSchool</title>
</head>
<body>
  <!-- Start Navigation  -->
 
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
    <div class="container-fluid">
    <div class="spinner-grow text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
      </div>
      <a class="navbar-brand" href="index.php">រៀនអនឡាញ</a>
      <span class="navbar-text text-primary g-col-4">សិក្សាបន្ថែម!​</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
        <ul class="navbar-nav custom-nav">       
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> Home</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link"><i class="fa-brands fa-discourse"></i> Courses</a></li>
          <!-- <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment_Status</a></li> -->
          <li class="nav-item custom-nav-item"><a href="feedback.php" class="nav-link"><i class="fa-solid fa-comments"></i> Feedback</a></li>
          <li class="nav-item custom-nav-item"><a href="contact.php" class="nav-link"><i class="fa-solid fa-address-card"></i> Contact</a></li>
          <?php
         
         if (isset($_SESSION['is_login'])) {
             echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link"><i class="fa-solid fa-user-plus"></i>  My Profile</a></li>';
             echo '<li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>';
         } else {
             echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#LoginexampleModal"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
             echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-plus"></i> Signup</a></li>';
         }
         ?>
        </ul>
      </div>
      
    </div>
    
  </nav>
  
  <!-- Rest of the HTML content goes here -->
  <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/all.min.js"></script>
 <script type="text/javascript" src="js/ajaxrequest.js"></script>
 <script type="text/javascript" src="js/adminajaxrequest.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>
</html>