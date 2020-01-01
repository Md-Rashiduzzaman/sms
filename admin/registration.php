<?php 
	require'dbcon.php';
//dbcon.php file ta registration.php file er sathe connection/linkup kora holo(database er sathe connect kora holo db connect er code ja dbcon.php namok file a ase)	
	session_start();
//$SESSION maane hosse j naam a login(admin) kora hoise sei login naam k catch korte ai session set kora hoise	

	
	if(isset($_POST['registration'])){
// isset function er dara registration a click korle  ta sequentially $name variable a j name input dia holo seta post er dara $name variable dara dhora hobe ai vabe email..		
		
		$name = $_POST['name']; 
//post method er maddhome $name variable a input field er name dhora hoise ja $name variable a store hoyese 
		
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
		
		$photo = explode('.',$_FILES['photo']['name']); 
//$photo ata kintu array hesebe kaj korse
// explode function use kora hoi array hesebe ja vanga ba vag korar jonne ekhane photo file er maddhome ashbe r ekhane explode er jonne ata array te ashbe jekhane prothome photo name thakbe 
// tarpore .(dot) thakbe tarpore photo extension thakbe r array heasebe array[0] te photo name thakbe r array[1] a photo extension thakbe atai explode(vanga) function er kaj
		
		$photo = end($photo);
//$photo ata kintu array hesebe kaj korse jekhane end($photo)= photo extension store korbe ja ai line er $photo variable te save hoye gese
// end function er kaj holo file a j photo nilam array te tar last(end) array dekhate use hoi ekhane sudhu tar last array te extension dekhate end function use hoyese.array te end use kora hoi last array show korate	
		
		$photo_name = $username.'.'.$photo; 
//$photo_name ai line er jonne array but porer line er jonne variable hesebe kaj kore
// $photo_name = $username.'.'.$photo; // ai code dara username er j input pawa jabe maane input a j username hobe tar sathe end function er last array te  photor extension show korbe   	
		
		$input_error = array();
// $input_error naamer variable nilam ja-te array define korlam,$input_error print korle registration form faka dekhabe.  	
// $input_error = array(); // ata nibar karon holo input field faka thakle kono message show koranor jonne ai code kora holo 		

		if(empty($name)){  
// empty function a ai condition er dara reg a name er input field empty hole $input_error['name'] ai variable er message ta show korbe r else hole name field empty hobe na
			$input_error['name'] = "The Name field is required";
		}
		if(empty($email)){ 
//if(empty($name) er moto same kaj korbe
			
			$input_error['email'] = "The Email field is required";
		}
		if(empty($username)){
			$input_error['username'] = "The Username field is required";
		}
		if(empty($password)){
			$input_error['password'] = "The Password field is required";
		}
		if(empty($c_password)){
//ai condition er dara reg a confirm password er input field empty hole $input_error['c_password'] ai variable er message ta show korbe r else hole password field accept hobe			
			$input_error['c_password'] = "The Confirm Password field is required";
		}
		
		if(count($input_error) == 0){
//ai condition dara $input_error variable a 0(zero) count hoi tobe kono error nei but 1 count hole vabte hobe kono input field a error ase seta input field er sathe db te match korar jonne o hote pare 		
			
			$email_chack = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';"); 
//reg er somoy db te same email ase kina ta check er query
			
			if(mysqli_num_rows($email_chack) == 0){    
//ai condition a if er kaj holo same email na hole db te reg er email ta nibe maane $email_chack) == 0 , maane db te oi email ta 0 ba nei  
				$username_chack = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';");
				
				if(mysqli_num_rows($username_chack) == 0){   
//user name er yes hobar code ba same username naa othoba new registration a db te new username check er function mysqli_num_rows
			
			if(strlen($username)>4){     
//ai strlen function use kora hosse string er length ber korar jonne,ai code dara username 7 er boro hole if statement execute hobe r 7 er choto hole else statement run korbe
						
						if(strlen($password)>=8){
// password 8 er shoman ba beshi hole password accept hobe	
					
						if($password == $c_password){ 
// ai condition a jodi password r confirm password(c_password) match kore tahole if statement r password match na korle else statement run hobe
							$password = md5($password);
//password decrypt korte md5 ba sha1 use korte hoi							
							$query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
//Registration field theke data, database a insert korte $query variable er moddhe db er ai code likhte hoi r status field a inactive kora ase er kaj holo admin(db admin) theke active na kora porjonto account ti cholbe na							
							$result = mysqli_query($link,$query);
// mysqli_query er kaj holo query run kora ba db er code run kora jekhane $query te db er code ase r $linnk a db connect kora ase 	
							if($result){
// ai condition dia hoyese input field theke db te data insert hoise kina tar message show korate.. result jodi run kore ba result true hole nicher code execute hobe 								
								
								$_SESSION['data_insert_success'] = "Data Insert Success! Press the Login at the bottom";
// session use korte hole 1st a session start korte hoi r last a session end o korte hoi.tai php code er 1st er dike session start korte hoise								
								
								move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
// ai function er kaj holo input file a photo insert kora hosse ta jeno oi project er image folder a oi photo ta jai ba store hoi,$_FILES['photo']['tmp_name'] hosse photo/file store kora	r 'images/'.$photo_name atar kaj holo images folder a photo ta tar naam o extension soho store hobe						
								header('location:registration.php');
							
						} else{
								$_SESSION['data_insert_error'] = "Data Insert Error!";
								
// session prothome cookie generate korbe but oi cookie te  sudhu session_id ta save korbe onno kono information save kore na session er kaj holo multiple page data kivabe use korte hoi ta session er kaj 
// maane input field er data gulo server  a joma hoi ja session a joma hoi r oi id jotobar login korbe totobar oi id er data gulo onno page a retrieve er kaj session kore
// jemon amra fb te id dia login kori jotobar kori totobar e oi id er sob data gulo session er maddhome oi data gulo retrieve kori ba oi id information gulo show korai atai session er kaj 								

							}

							} else{
								$password_not_match = "Confirm password is not match !";
							}
						} else{
							$password_strln = "Password should be more than or equal to 8 characters";
						}
					} else{
						$username_strln = "Username should be more than 4 characters";
					}
				} else{
					$username_error = "This Username Already Exists"; 
////ai else hosse same username a new registration korbe na 
				}
			} else{
				$email_error = "This Email Address Already Exists"; 
//ai else hosse same email a new registration korbe na 
			}
		}
	} //registration er if sesh 
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
	<link rel="stylesheet" type="text/css" href="style.css">

    <title>User Registration Form</title>
  </head>
  <body style="background:	#98e698">
	<div class="container">
		<h1 style="background:#ffffcc">User Registration Form</h1>
		<?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
<!--ata input theke data db te insert er jonne ai code jekhane success hole success r error hole error message dekhabe r php code er sathe html code concate kora hoise-->		
	
<!-- php te unset($_SESSION['data_insert_success']); ba unset($_SESSION['data_insert_success']); -->
 <!--r unset($_SESSION['data_insert_success']) atar kaj holo registration page ta reload dile  1bar success/error message dekhanor por 2bar reload dile r success/error message r dekhabe na-->			
		
		<?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';}?>
	
		<hr />
		<div class="row">
			<div class="col-md-12">
				<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
<!-- enctype attribute use kora hoi form a kono pic/file upload korar jonne.. -->				
					<div class="form-group row">
						<label for="name" class="col-sm-1 col-form-label">Name</label>
						<div class="col-sm-4">
							<input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name" value="<?php if(isset($name)){echo $name;} ?>">
<!-- value="php te if(isset($name)){echo $name;} atar kaj holo registration page a jodi sudhu name input field a name dile r baki field gulo na dile required er message dekhabe
 r input er name field a j name dia hoise seta oi name field a theke jabe jotokhon na baki field gulo fillup na kora hoi  -->							
						</div>
						<label class="error"><?php if(isset($input_error['name'])){echo $input_error['name'];}?></label>
<!-- if(isset($input_error['name'])){echo $input_error['name']; atar maane holo input field a $name variable empty hoi maane name field faka hoi tokhon ata execute
hobe: $input_error['name'] = "The Name field is required"; -->						
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-1 col-form-label">Email</label>
						<div class="col-sm-4">
							<input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email" value="<?php if(isset($email)){echo $email;} ?>">
<!-- if(isset($email)){echo $email; er maane input er email field a j email dia hoise seta oi email field a theke jabe jothokhon na total field gulo fillup kore registration success hoi-->
						</div>
						<label class="error"><?php if(isset($input_error['email'])){echo $input_error['email'];}?></label>
						<label class="error"><?php if(isset($email_error)){ echo $email_error;}?></label>
<!-- ai php code a same email dia new registration korbe na tokhon php er email_error variable er value dekhabe -->
					</div>
					<div class="form-group row">
						<label for="username" class="col-sm-1 col-form-label">Username</label>
						<div class="col-sm-4">
							<input class="form-control" id="username" type="text" name="username" placeholder="Enter Your Username" value="<?php if(isset($username)){echo $username;} ?>">
						</div>
						<label class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];}?></label>
						<label class="error"><?php if(isset($username_error)){ echo $username_error;}?></label> 
<!--same username dia new registration korbe na tokhon php er username_error variable er value dekhabe-->
						<label class="error"><?php if(isset($username_strln)){ echo $username_strln;}?></label>
<!--username 7 Characters er beshi hobe nahole $username_strln variable er message ta dekhabe tokhon new registration hobe na-->
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-1 col-form-label">Password</label>
						<div class="col-sm-4">
							<input class="form-control" id="password" type="password" name="password" placeholder="Enter Your Password" value="<?php if(isset($password)){echo $password;} ?>">
						</div>
						<label class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];}?></label>
						<label class="error"><?php if(isset($password_strln)){ echo $password_strln;}?></label>
					</div>
					<div class="form-group row">
						<label for="c_password" class="col-sm-1 col-form-label">Confirm Password</label>
						<div class="col-sm-4">
							<input class="form-control" id="c_password" type="password" name="c_password" placeholder="Enter Your Confirm Password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
						</div>
						<label class="error"><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];}?></label>
						<label class="error"><?php if(isset($password_not_match)){ echo $password_not_match;}?></label>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-sm-1 col-form-label">Photo</label>
						<div class="col-sm-4">
							<input id="photo" type="file" name="photo" />
						</div>
					</div>
					<div class="col-sm-5 offset-1">
						<input type="submit" value="Registration" name="registration" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div><br/>
		<p>If you have an account? Then please <a href="login.php">Login</a></p>
		<hr />
		<footer>
			<p>Copyright &copy;2018-<?= date('Y') ?> All Rights Reserved.</p>
		</footer>
		</div>
	</body>
</html>