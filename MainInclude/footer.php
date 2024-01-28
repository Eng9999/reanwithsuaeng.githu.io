<button type="button" class="btn btn-primary none" data-bs-toggle="modal" data-bs-target="#AdminLoginexampleModal">
  Admin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Registeration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Start Student Registration From -->
        <?php include('studentRegistration.php');?>
        <!-- End student Registration form -->
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">SignUp</button>
        <button type="button" class="btn btn-secondary" >Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Register students  Models-->
<!-- Modal -->
<!-- Login -->
<div class="modal fade" id="LoginexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Login start -->
        <?php include('studentLogin.php') ?>

          <!-- end Login students -->
      </div>
      <div class="modal-footer">
      <small id="successLogMsg"></small>
      <button type="button" class="btn btn-primary" onclick="checkStuLogin()" id="stuLoginBtn">LOGIN</button>
      <button type="button" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- admin start -->
<div class="modal fade" id="AdminLoginexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Admins</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Login admin start -->
        <form id="stuLoginForm">
            <div class="mb-3">
              <i class="fas fa-evenlope"></i>
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="adminLogEmail" name="adminLogemail" placeholder="Email">
            </div>
            <div class="mb-3">
              <i class="fas fa-key"></i>
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="adminLogPass" name="adminLogpass" placeholder="passwords">
            </div>
          </form>

          <!-- end admin Login students -->
      </div>
      <div class="modal-footer">
      <small id="successAdminLogMsg"></small>
      <button type="button" class="btn btn-primary" onclick="checkAdminStuLogin()" id="adminlogin">login</button>
      <button type="button" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- admin End -->

    <!-- Jquery and Bootstrat Js -->
  <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/all.min.js"></script>
 <script type="text/javascript" src="js/ajaxrequest.js"></script>
 <script type="text/javascript" src="js/adminajaxrequest.js"></script>
 </body>
 </html>