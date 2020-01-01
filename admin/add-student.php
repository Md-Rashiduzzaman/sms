	<h1 class="text-primary"><i class="fa fa-user-plus"></i>&nbsp;Add Student <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add New Student</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li class="active" style="color:#808080"> <i class=" fa fa-user-plus"></i>&nbsp;Add Student</li>
	</ol>
	
<?php 
//ekhon db theke dynamically data show korte php code likhte hobe
	if(isset($_POST['add-student'])){
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$class = $_POST['class'];
		$city = $_POST['city'];
		$pcontact = $_POST['pcontact'];
		
		$picture = explode('.',$_FILES['picture']['name']);
//ai explode er dara array er maddhome picture-name r picture-format index-array([0][1]..) te show korbe 		
		$picture_ex = end($picture);
//end function er dara picture-format er extension ber kora hoi	r $picture er moddhe theke extension ta ber kore nibe	
		$picture_name = $roll.'.'.$picture_ex;
//ai condition dara add student er input field theke j roll pabe ba database theke j roll pabe seta picture-name hobe r $picture_ex er dara extension o ashbe
		
		$query = "INSERT INTO `student_info`( `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";
//ai query dara add student page er input field theke database a data insert korar code
		
		$result = mysqli_query($link,$query);
// ai function dara query run hosse jekhane $link dara db connect er kaj hosse r $query dara db te input field theke data insert kora hosse
		
		if($result){
			$success = "Data Insert Success!";
			move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$picture_name);
//ai function dara picture er genuine name (tmp_name)temporary name hesebe thakbe but tarpore ai photo ti student_images folder a ($picture_name ai variable er kaj korbe)
// roll-number name hesebe r extension jog hoye save hoye jabe student_images folder a			
		} else {
			$error = "Data Insert Failed!";
		}

}	
?>		
	<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';}?>
	<?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';}?>

<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Student Name</label>
				<input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required />	
			</div>
			<div class="form-group">
				<label>Student Roll</label>
				<input type="text" name="roll" placeholder="Student Roll Minimum 6 Digits" id="roll" class="form-control" pattern="[0-9]{6}" required />	
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" placeholder="City" id="city" class="form-control" required />	
			</div>
			<div class="form-group">
				<label>PContact</label>
				<input type="text" name="pcontact" placeholder="(01********) Minimum 11 Digits" id="pcontact" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required />	
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select id="class" class="form-control" name="class" required>
					<option value="">Select</option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="picture">Picture</label>
				<input type="file" name="picture" id="picture" required />
			</div>
				
			<div>
				<input type="submit" value="Add Student" name="add-student" class="btn btn-primary float-right" />
			</div>
			
			
		</form>
	</div>
</div>