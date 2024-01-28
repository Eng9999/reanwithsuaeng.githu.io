<?php
// កន្លែង បិទមិនអោយ គេចូលក្នុងadmin
if(!isset($_SESSION)){
    session_start();
 }
include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
}
?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3"
                        style="max-width:18rem">
                        <div class="card-header">Courses</div>
                        <div class="card-body">
                            <h4 class="card-title">
                            5
                            </h4>
                            <a class="btn text-white" href="#">view</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3"
                        style="max-width:18rem">
                        <div class="card-header">Students</div>
                        <div class="card-body">
                            <h4 class="card-title">
                            25
                            </h4>
                            <a class="btn text-white" href="#">view</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3"
                        style="max-width:18rem">
                        <div class="card-header">Courses-Order</div>
                        <div class="card-body">
                            <h4 class="card-title">
                            2
                            </h4>
                            <a class="btn text-white" href="#">view</a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <!-- ------Table---- -->
                    <p class="bg-dark text-white p-2">Course Order</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">22</th>
                                <td>100</td>
                                <td>suaengmail.com</td>
                                <td>20/10/2020</td>
                                <td>2000</td>
                                <td><button type="submit" class="btn btn-secondary" 
                                name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>

<?php include('./admininclude/footer.php') ?>