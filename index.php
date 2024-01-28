 <?php
  include('./dbConnection.php');
  include('./MainInclude/header.php'); 
  ?>
  
    <!-- End Navigation  -->
    <!-- Start Video Background -->
    <div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <video playsinline autoplay muted loop>
        <source src="video/typing.mp4">
        </video>
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content">
        
         <h1 class="my-content">Welcome to OnlineSchool</h1>
        <small class="my-content">Learn and Impliments</small><br>
        <?php 

        if(!isset($_SESSION['is_login'])){
          echo'<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Start</a> ';
        }else{
          echo'
          <a href="student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a></li>
          ';
        }
        ?>
      </div>
    </div>
    <!-- End Video Background -->
    <!-- Start Text Banner -->
    <!-- <div class="container-fluid bg-danger txt-banner">
      <div class="row bottom-banner">
        <div class="col-sm">
          <h5><i class="fa-solid fa-school"></i> ងាយស្រួស​ ក្នុងការសិក្សា</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fa-brands fa-connectdevelop"></i> ជំនាញក្នុងការ Develop</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fa-solid fa-infinity"></i> រៀនបាន​ បានមួយជីវិត</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fa-solid fa-money-bill"></i> គ្មាន ចំណាយលុយ</h5>
        </div>
      </div>
    </div> -->
    <!-- End Text Banner -->
    <!-- Start Most Pupular Course -->
    <div class="container mt-4">
      <h1 style="text-align: center;"><u>Popular Course</u> </h1>
      <!-- start Most Popular Course 1st Card Deck -->
      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php 
          $sql="SELECT *FROM course LIMIT 3, 3";
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
                    <small class="text-body-secondary"><dels>$ '.$row['course_original_price'].' 
                    to </dels></small><span>$ '.$row['course_price'].'</span></p>
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

        <!-- start Most Popular Course 1st Card Deck -->
      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
          $sql="SELECT *FROM course LIMIT 3";
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
                    <small class="text-body-secondary"><dels>$ '.$row['course_original_price'].' 
                    to </dels></small><span>$ '.$row['course_price'].'</span></p>
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
        <br><br>
        <div class="text-center">
          <button class="btn btn-danger text-center"><a href="courses.php">view All Course</a></button>
        </div>
      </div>
    <!--  End Most popular Course -->
    <!-- Form contect -->
    <?php include('./contact.php') ?>
    <!-- start Feedback -->
    <h1> Feedback's students</h1>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <br>
  <?php
$sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
$result = $conn->query($sql);

if ($result) {
  if ($result->num_rows > 0) {
    $active = true;
    while ($row = $result->fetch_assoc()) {
      $s_img = $row['stu_img'];
      $n_img = str_replace('..', '.', $s_img);
?>
      <div class="carousel-item <?php echo $active ? 'active' : '' ?>" data-bs-interval="10000">
        <img src="<?php echo $n_img; ?>" class="rounded-circle" alt="..." width="100px" height="100px">
        <h5><?php echo $row['stu_name']; ?></h5>
        <small><?php echo $row['stu_occ']; ?></small>
        <h4>Online School</h4>
        <p style="color: white" class="rounded-end" >
          <?php echo $row['f_content']; ?><br>
        </p>
      </div>
<?php
      $active = false;
    }
  } else {
    echo "No feedback found.";
  }
} else {
  echo "Error executing the query: " . $conn->error;
}
?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <!-- End FeedBack -->

<?php include('./MainInclude/footer.php')?> 
<!-- End footer -->
<!-- Register students  Models-->
<!-- Button trigger modal -->
