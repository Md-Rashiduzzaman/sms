 <?php 
session_start();
require './dbcon.php';
//ai require er maddhome index.php te joto gulo page/file ase sob gulo database er sathe connect hoye jabe
if(!isset($_SESSION['useremail_login'])){
  header('location:login.php');
}
//ai condition er kaj holo url dia login.php page a r jabe na. login page er dara ekhon index.php page a jawa lagbe
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css"><!-- ai gulo lagbe datatable styling/bootstrap4 er jonne-->
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  
  <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>

  <title>SMS</title>
</head>
<body style="background-color:#99ccff;">
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <ul class="navbar-nav mr-auto">
     
    <li class="nav-item">
      <a class="nav-link navbar-brand" href="index.php">SMS</a>
    </li>
  </ul>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
     
     <li class="nav-item">
      <a class="nav-link" href="index.php"> <i class="fa fa-home"></i> Welcome: Md.Rashiduzzaman</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="registration.php"> <i class="fa fa-user-plus"></i> Add User</a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="index.php?page=user-profile"> <i class="fa fa-user"></i> Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php"> <i class="fa fa-power-off"></i> Logout</a>
  </li>
</ul>
</div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3"> 
      <div class="list-group">
        <a href="index.php?page=dashboard" class="list-group-item active">
		<i class="fa fa-dashboard"></i> Dashboard
		</a>
		<a href="index.php?page=add-student" class="list-group-item"> <i class="fa fa-user-plus"></i> Add Student</a>
		<a href="index.php?page=all-students" class="list-group-item"> <i class="fa fa-graduation-cap"></i> All Students</a>
		<a href="index.php?page=all-users" class="list-group-item"> <i class="fa fa-users"></i> All Users</a>
      </div>
    </div>
	<div class="col-sm-9">
		<div class="content">
		
			<?php 
				
				if(isset($_GET['page'])){
//jodi get(url)	a page variable pai tahole page a variable hobe seta jeta ami click korbo				
					$page = $_GET['page'].'.php';
				} else {
// r jodi page a get(url) na pai tahole by default vabe dashboard.php page show korabe,ah-bar dashboard o click korle o dashboard.php show korabe
// ba index.php click korle o dashboard.php show korabe but get variable dara jodi kono page url a pai tobe sei file show korabe but onno file create kora nei
					
					$page = 'dashboard.php';
				}
				
				if(file_exists($page)){
//file jodi theke thake tobe url a oi file ta dekhabe sathe file interface er heading a o dekhabe					
					require $page;
				} else {
					require '404.php';
//file na pele 404.php ai page er text gulo show korabe					
				}
				
					
			?>
		
		</div>
	</div>
  </div>
</div><br/>
<footer class="footer-area bg-primary">
	<p>Copyright &COPY;2019 Students Management System. All Rights Are Reserved</p>
</footer>
</body>
</html>
