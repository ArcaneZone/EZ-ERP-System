<?php
session_start();

if(!$_SESSION['auth'])
{
    echo '<script>alert("You are not logged in.Kindly please log in.")</script>';
    header('location:./index.php');
}

if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$extension = pathinfo($_FILES["pdfFile"]["name"], PATHINFO_EXTENSION);
        $name='Timetable';

		
			move_uploaded_file( $source_file,$name.".".$extension )
			or die ("Error!!");
		
	}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Upload Timetable</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
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
                <li >
                        <a href="./admin_user.php">
                            <i class="now-ui-icons education_hat"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>
                    <li >
                        <a href="./Admin_add_user.php">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Add Student</p>
                        </a>
                    </li>
                    <li >
                        <a href="./Admin_Remove_Student.php">
                            <i class="now-ui-icons ui-1_simple-delete"></i>
                            <p>Remove Student</p>
                        </a>
                    </li>
                    <li >
                        <a href="./Admin_student_records.php">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>View Student Records</p>
                        </a>
                    </li>
                    <li class="active" >
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
                    <li >
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
                    <h2 class="title">Upload Time Table</h2>
                    <!-- <p class="category">Handcrafted by our friend
                        <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                        <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
                    </p> -->
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upload File</h4>
                            </div>
                            <div class="card-body">
                                <form action="Admin_Upload_Timetable.php" method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4 pr-1">                                        
                                            <label>Please select your file</label>
                                            <input type="file" class="btn btn-sucess btn-block" name="pdfFile">
                                        </div>                                  
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info" type="submit" name="save">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


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
<script src="./assets/js/core/jquery.min.js"></script>
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="./assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/demo/demo.js"></script>

</html>