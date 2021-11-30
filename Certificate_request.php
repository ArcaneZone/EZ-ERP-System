<?php
session_start();  
$user_name = $_SESSION['firstname'].$_SESSION['lastname'];
if(!$_SESSION['auth'])
    {
        echo '<script>alert("You are not logged in.Kindly please log in.")</script>';
        header('location:./index.php');
    } 
if($_POST)
{
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "dpuerp";
    
    $student_name = $_POST['student'];
    $reason=$_POST['reason'];
    
    $conn = mysqli_connect($host,$user,$pass,$db);
	
    $query ="INSERT INTO certificate_user(student_name,reason) values('$user_name','$reason'); ";
	$result = mysqli_query($conn,$query);
	if($result)
	{
        echo '<script>alert(" data updated")</script>';
	}
	else
	{
        echo '<script>alert(" data not updated")</script>';
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
    <title>Certificate Request</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper "> 
        <div class="sidebar" data-color="orange">
            
        <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
   
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
                        <a href="user.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="./acadCal.pdf">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Academic Calender</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./Certificate_request.php">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>Certificate Request</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Grade_Card.php">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Grade Card</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Timetable.pdf">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Timetable</p>
                        </a>
                    </li>
                    <li>
                        <a href="./Attendance.php">
                            <i class="now-ui-icons text_caps-small"></i>
                            <p>Attendance</p>
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
                        <a class="navbar-brand" href="https://engg.dypvp.edu.in/">Dr. D.Y. Patil Institute of Technology</a>
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
                                    <a class="dropdown-item" href="user.php">User Profile</a>
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
                    <h2 class="title">Certificate Request</h2>
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
                        <form class="login100-form validate-form" method="post">
                            <div class="card-header">
                                <h4 class="card-title">Request Certificate</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control"  name="student" disabled  placeholder="Certificate Name" value="<?php echo $user_name;  ?>"  >
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Reason for Certificate</label>
                                            <input type="text" class="form-control" name="reason"  placeholder="Reason" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-block" type="submit" onclick="demo.showNotification('bottom','left')">Submit</button>
                                </div>
                            </div>
                        </form>
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