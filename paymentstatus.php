<?php include('./MainInclude/header.php')?>
<div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <img src="image/user/picture1.jpg" alt="picture" class="text-centered">
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to OnlineSchool</h1>
        <small class="my-content">Learn and Impliments</small><br>
        <!-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Start</a> -->
      </div>
    </div>
    <div class="container">
        <h2 class="text-center my-4">Payment Statuse</h2>
        <form action="" method="post">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Order ID:</label>
            <input type="email" class="form-control" id="inputEmail4">
            </div>
            <br><br>
            <div>
                <input type="submit" class="btn btn-primary mx-1" value="View">
            </div>
            </div>
        </form>
    </div>
    <!-- start contact us -->
    <div class="container">
        <?php 
        include('./contact.php')
        ?>
    </div>
    