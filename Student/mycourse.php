<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail= $_SESSION['stuLogEmail'];

}else{
    echo "<script> location.href='../index.php'; </script>";
}

?>

<!-- ----------------------------- -->
<div class=" col-sm-9 mt-5">
    <div class=" row gx-5">
        <div class="jumbotrom">
            <h4 class="text-center">All Course </h4>
            <?php 
            $sql = "SELECT * FROM `course` LIMIT 3 ";

            $result =$conn->query($sql);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){ ?>
            <div class="bg-light mb-3">
                <h5 class="card-header">Name:<?php echo $row['course_name'] ?></h5>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?php echo $row['course_img'] ?>" alt="pic" class="card-img-top mt-4" >  
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card-body">
                            <p class="card-title"></p>
                            <small class="card-text">Duration:<?php echo $row['course_duration'] ?></small><br>
                            <small class="card-text">Instructor:<?php echo $row['course_author'] ?></small><br>
                            <small class="card-text">Description:<?php echo $row['course_desc'] ?></small><br>
                            <p class="card-text d-inline">Price:<?php echo $row['course_original_price'] ?><small><del>&#8377</del></small>
                            <span class="font-weight-border">NO: <?php echo $row['course_price'] ?></span></p>
                            <a href="watchcourse.php?course_id=<?php echo $row['course_id']?>" 
                            class="btn btn-primary mt-5 float-right" > Watch Course:</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                     
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
include('./stuInclude/footer.php');
?>