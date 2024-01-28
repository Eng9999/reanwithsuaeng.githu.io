<?php 
include('./dbConnection.php');
include('./MainInclude/header.php');

?>
<div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <br><br><br>
        <img src="image/user/picture1.jpg" alt="picture" class="text-centered" >
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to OnlineSchool</h1>
        <small class="my-content">Learn and Impliments</small><br>
        <!-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Start</a> -->
      </div>
    </div>
    <!-- End Video Background -->
    <!-- Start Text Banner -->
    <!-- <div class="container-fluid bg-danger txt-banner">
      <div class="row bottom-banner">
        <div class="col-sm">
          <h5><i class="fas fa-book mr-3"></i>100+ Online Course</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fas fa-book mr-3"></i> Expert Instructor</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fas fa-book mr-3"></i>Lifetime Access</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fa-solid fa-r"></i> Money Back Guarantee*</h5>
        </div>
      </div>
    </div> -->
    <!-- End Text Banner -->
    <!-- Start Most Pupular Course -->
    <div class="container mt-4">
      <h1 style="text-align: center; font-weight:bold;"><u>Popular Course</u> </h1>
      <!-- start Most Popular Course 1st Card Deck -->
      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php 
          $sql="SELECT *FROM course";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $course_id=$row['course_id'];
              echo'
              <div class="col">
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding: 0px; margin:0px;">
              <div class="card h-100">
                <img src="'.str_replace('..','.', $row['course_img']).'" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$row['course_name'].'</h5>
                    <p class="card-text">'.$row['course_desc'].'</p>
                  </div>
                  <div class="card-footer">
                  <p class="card-text d-inline">Price: 
                    <small class="text-body-secondary"><dels>&#8377 '.$row['course_original_price'].'$ 
                    to </dels></small><span>&#8377 '.$row['course_price'].'</span></p>
                    <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary float-sm-end">Eroll</a>
                  </div>
              </div>
            </a>
          </div>
              ';
            }
          }
          ?>           
        </div>
      </div>
      <br>
        <!-- start Most Popular Course 1st Card Deck -->
      
      <?php include('./MainInclude/footer.php') ?>