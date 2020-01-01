 <h1 class="text-primary"><i class="fa fa-user"></i>&nbsp;User Profile <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Profile</small></h1>
	  <ol class="breadcrumb">
		<li><a href="index.php?page-dashboard" class="text-primary" style="color:#808080"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>
		<li class="active"class="text-primary" style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;Profile</li>
	  </ol>
	  
	  <?php  
		$session_user = $_SESSION['useremail_login'];
//login.php page theke user-email session a dhorlam ja te usert profile a kon user er dara gese ta bojha jai		
		$user_data = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$session_user'"); 
		$user_row = mysqli_fetch_assoc($user_data);
//user-profile.php te j email dia login korse sei email er sob information associative array te chole ashbe	  
	  
	  ?>
	  
	  
	  <div class="row" style="background-color:#f5f5f5;">
		<div class="col-sm-6">
			<table class="table table-bordered">
				<tr>
					<td>User ID</td>
					<td><?= $user_row['id']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?= ucwords($user_row['name']); ?></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><?= ucwords($user_row['username']); ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $user_row['email']; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?= ucwords($user_row['status']); ?></td>
				</tr>
				<tr>
					<td>Signup Date</td>
					<td><?= $user_row['datetime']; ?></td>
				</tr>
			</table><br/>
			
		</div>
		<div class="col-sm-6">
			<a href="">
				<img width="200px" height="200px" class="img-thumbnail" src="images/<?= $user_row['photo']; ?>" alt="This Profile Photo">
<!-- database theke oi user er photo ta show korabe-->				
			</a>
			<br/>
			
			<?php 
			if(isset($_POST['upload'])){
//if diar karon : user-profile a profile picture er photo change korte ai code			
			$photo = explode('.',$_FILES['photo']['name']); 
			$photo = end($photo);
			$photo_name = $session_user.'.'.$photo; 
						//session user dara kon email dara ai pic ta ashci ta korte $session_user bebohar kora hoise	
//user profile a photo change hobar jonne(update er somoy change photo ta user profile a dekhabe) ai code.. details jente registration page er photo detais dekhte hobe 			
			
			$upload = mysqli_query($link, "UPDATE `users` SET `photo`= '$photo_name' WHERE `email`= '$session_user'");
			
			if($upload){
				move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
				header('location:index.php?page=user-profile');
				
				}
		
			}
			
			?>
			
			<form action="" enctype="multipart/form-data" method="POST">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="photo"><b>Profile Picture</b></label><br/>
				<input type="file" name="photo" id="photo" required />
				<input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info" />

			</form>
		</div>
	  </div>