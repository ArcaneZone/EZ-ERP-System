<?php
session_start();

if(!$_SESSION['auth'])
{
    echo '<script>alert("You are not logged in.Kindly please log in.")</script>';
    header('location:./index.php');
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "dpuerp";
$user_email = $_SESSION['email'];

$conn = mysqli_connect($host, $user, $pass, $db);

$query = "SELECT * from certificate_user where status is NULL";

$result = mysqli_query($conn, $query);
$singleRow = $result->fetch_row();
if($singleRow){
    $student_name = $singleRow[0];
    $reason = $singleRow[1];
    $status = $singleRow[2];
}
else{
    $student_name = "";
    $reason = "";
    $status = "";
}

if (isset($_REQUEST['approve'])) {
    $query2 = "UPDATE certificate_user set status='yes' where student_name='$student_name' and reason='$reason'";
    $result2 = mysqli_query($conn, $query2);
}
if (isset($_REQUEST['deny'])) {
    $query3 = "UPDATE certificate_user set status='no' where student_name='$student_name' and reason='$reason'";
    $result3 = mysqli_query($conn, $query3);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Approve Certificates</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">

            <div class="logo">
                <a href="https://engg.dypvp.edu.in/" class="simple-text logo-mini">
                    DPU
                </a>
                <a href="https://engg.dypvp.edu.in/" class="simple-text logo-normal">
                    ERP System
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="./admin_user.php">
                            <i class="now-ui-icons education_hat"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Admin_add_user.php">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Add Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Admin_Remove_Student.php">
                            <i class="now-ui-icons ui-1_simple-delete"></i>
                            <p>Remove Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Admin_student_records.php">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>View Student Records</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Admin_Upload_Timetable.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Upload Timetable</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Admin_upload_Attendance.php">
                            <i class="now-ui-icons ui-1_check"></i>
                            <p>Upload Attendance</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./Admin_approve_certificates.php">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Approve Certificates</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="https://engg.dypvp.edu.in/">Dr. D.Y. Patil Institute Of Technology</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./admin_user.php">User Profile</a>
                                    <a class="dropdown-item" href="#">Change Password</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header">
                <div class="header text-center">
                    <h2 class="title">Approve Certificates</h2>
                    <!-- <p class="category">Handcrafted by our friend
                        <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                        <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
                    </p> -->
                </div>
            </div>
            <div class="content">
                <form type="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Approve Certificates</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-4">
                                            <div class="form-group">
                                                <label>Student Name</label>
                                                <input type="text" class="form-control" value="<?php echo $student_name ; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Reason for Certificate</label>
                                                <input type="text" class="form-control" name="certificate_reason" value="<?php echo $reason ; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success btn-block" type="submit" name="approve" onclick="demo.showNotification('bottom','left')">Approve</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success btn-block" type="submit" name="deny" onclick="demo.showNotification('bottom','left')">Deny</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav>
                    <ul>
                        <li>
                            <a href="">
                                ArcaneZone
                            </a>
                        </li>
                        <!-- <li>
                                <a href="">
                                    About Us
                                </a>
                            </li> -->
                        <!-- <li>
                                <a href="">
                                    Blog
                                </a>
                            </li> -->
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="" target="_blank">DIT</a>. Coded by
                    <a href="" target="_blank">Arcane and Friends</a>.
                </div>
            </div>
        </footer>
    </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

</html>