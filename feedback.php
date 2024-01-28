<?php
  include('./dbConnection.php');
  include('./MainInclude/header.php'); 
  ?>

<br><br><br><br><br>
<h1 class="text-center font-b"> Feedback's students</h1>
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
        <p style="color:white">
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

    <!--