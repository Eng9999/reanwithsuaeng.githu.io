<?php 
include('./dbConnection.php');
include('./MainInclude/header.php');
?>
<div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <br><br>
        <img src="image/user/picture1.jpg" alt="picture" class="text-centered">
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to OnlineSchool</h1>
        <small class="my-content">Learn and Impliments</small><br>
        <!-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Start</a> -->
      </div>
    </div>

    <div class="container mt-5">
        <?php
        if(isset($_GET['course_id'])){
            $course_id=$_GET['course_id'];
            $_SESSION['course_id']=$course_id;
            $sql="SELECT *FROM course WHERE course_id='$course_id'";
            $result = $conn->query($sql);
            $row=$result->fetch_assoc();

        }
        ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo str_replace('..','.', $row['course_img'])?>" alt="" class="card-img-top" width="10rem">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Course Name: <?php echo $row['course_name'] ?></h5>
                    <p class="card-text">Description:<?php echo $row['course_desc'] ?>.
                    </p>
                    <p class="card-text">Duration: <?php echo $row['course_duration'] ?> Days</p>
                    <form action="" method="post">
                        <p class="card-text d-inline">Price: <small><del>$ <?php echo $row['course_original_price'] ?></del></small>
                    <span class="font-weighht-bolder">  : $<?php echo $row['course_price'] ?></span></p>
                    <button type="submit" class="btn btn-primary text-white 
                    font-weight-bolder float-sm-end" name="buy"> <a href="./Student/studentProfile.php" class="text-white">Direction</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <table class="table table-border table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Lesson No.</th>
                            <th scope="col">Lesson Name.</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                        <?php 
                        $sql="SELECT *FROM lesson";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                            $num=0;
                            while($row=$result->fetch_assoc()){
                                if($course_id==$row['course_id']){
                                    $num++;
                                echo '
                                
                                <tr>
                                <a href="#">
                                    <th scope="row">'.$num.'</th>
                                    <td>'.$row['lesson_name'].'</td>
   
                                 </a>  
                                </tr>
                               
                                ';
                                }
                            }
                        }

                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>


    <?php 
        include('./MainInclude/footer.php')
    ?>