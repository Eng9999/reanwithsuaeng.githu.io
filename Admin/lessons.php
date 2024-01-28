<?php
// Make sure to start the session before any output
session_start();

include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
    exit; // Add this line to stop executing the rest of the code if the user is not logged in
}
?>

<div class="col-sm-9 mt-3 mx-1">
    <form action="" class="mb-3 form-inline d-print-none" method="GET">
        <div class="form-group mr-5">
            <label for="checkid">Enter Course ID:
            <input type="text" class="form-control ml-1" id="checkid" name="checkid"></label>
            <button type="submit" class="btn btn-danger">Search</button>
        </div>      
    </form>

    <?php
    $sql="SELECT course_id FROM course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
            $sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            if($row['course_id'] == $_REQUEST['checkid']){
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
                ?>

                <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])){echo $row['course_id']; } ?>
                Course Name: <?php if(isset($row['course_name'])){echo $row['course_name']; } ?></h3>
    
               
                <?php
            }
         }
    }
?>
<?php
if(isset($_REQUEST['checkid'])) {
    $sql = "SELECT * FROM lesson WHERE course_id ={$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    echo '<table class="table">
        <thead>
            <tr>
                <th scope="col"> Lesson ID</th>
                <th scope="col"> Lesson Name</th>
                <th scope="col"> Lesson Link</th>
                <th scope="col"> Lesson Active</th>
            </tr>
        </thead>
        <tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $row['lesson_id'] . '</th>';
        echo '<td>' . $row['lesson_name'] . '</td>';
        echo '<td>' . $row['lesson_link'] . '</td>';
        echo '<td>';
        echo '<form action="editlesson.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row['lesson_id'].'> 
                <button type="submit"
                    class="btn btn-info mr-3" 
                    name="view" value="View">
                     <i class="fa fa-pen"></i>
                </button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row['lesson_id'].'> 
                    <button type="submit"
                     class="btn btn-secondary"
                    name="delete" value="Delete">
                    <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
            </tr>';
    }
    echo '</tbody></table>';
}
?>
</div>

<?php
if (isset($_SESSION['course_id'])) {
    echo '<div>
        <a class="btn btn-danger box" href="addLesson.php">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>';
    if(isset($_REQUEST['delete'])){
        $sql="DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
        if($conn->query($sql)==TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" /> ';
        }else{
            echo 'Unable to Delete Data!';
        }
    }
}

?>
<?php include('./admininclude/footer.php'); ?>