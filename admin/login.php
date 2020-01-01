<?php 
	require'dbcon.php';
	session_start();
	
	if(isset($_SESSION['useremail_login'])){
		header('location:index.php');
//uporer if condition dara url dara login/index page a r jawa jabe na		
	}
	
	if(isset($_POST['login'])){ 
// value dhora hosse registration.php er moto	
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$email_check = mysqli_query($link,"SELECT * FROM `users` WHERE `email` ='$email'");
//1 line a kora holo nahole onek line code kora lagto
	
	if(mysqli_num_rows($email_check)>0){
	
	$row = mysqli_fetch_assoc($email_check);
    
		if($row['password'] == md5($password)){
			if($row['status'] == 'active'){
//ai code er kaj holo status active thakle se login korte parbe				
				$_SESSION['useremail_login'] = $email;
//shothik email r password dia login page a jabe tasara url dia index page a jete parbe na 				
				header('location: index.php');
			} else {
				$status_inactive = "Your Status is Inactive at DB.";
			}
		} else {
			$wrong_password = "This Password is not match to DB!";
	}
		} else{
			$email_not_found = "This Email is not found in DB!";
	}
//ata dara username check kora hosse jar dara login page db te j username ase seguloi sudhu login korbe,db te username na thakle uporer message show korbe		
//amra sudhu username db er sathe check korsi password ta check korsi na, tai username thik thakle login hobe but password match na korle o login hobe
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">

    <title>Students Management System</title>
  </head>
  <body style="background: #ccccff">
    <div class="col-lg-12 text-center">
		<h1 style="font-family:Lucida Console" class="animated shake">Students Management System</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 offset-4">
				<form name="form1" action="login.php" method="POST" class="animated shake">
					<h2 class="text-center">Admin Login Form</h2><br/>
					<div> <center><h6>Email:<h6/></center>
						<input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?php if(isset($email)){echo $email;}?>"/>
					</div><br/>
					<div> <center><h6>Password:<h6/></center>
						<input type="password" class="form-control" placeholder="Password" name="password" required="" value="<?php if(isset($password)){echo $password;}?>"/>
<!-- value er moddhe ai condition dara username r password check kora hosse login page a but -->						
					</div><br/>
					<div>
						<input type="submit" value="Login" name="login" class="btn btn-info float-right btn-primary">
					</div><a href="../">Back</a>
				</form>
			</div>
		</div><br/>
		<?php if(isset($email_not_found)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$email_not_found.'</div>';} ?>
		<?php if(isset($wrong_password)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$wrong_password.'</div>';} ?>
		<?php if(isset($status_inactive)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$status_inactive.'</div>';} ?>
	</div>
  </body>
</html>