<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>

<body>
    <nav class="navbar navbar-dark-top p-0 shadow" style="background-color: #225470">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">សិក្សាតាម :Online <small
                class="text-white">​ក្នុងសាលា</small></a>
    </nav>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link">
                            <i class="fa-regular fa-address-card"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lessons.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Lesson
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link">
                                <i class="fa fa-users"></i>
                                Students
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-table"></i>
                                Sell Report
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-table"></i>
                                Payment Status
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminChangPass.php" class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>