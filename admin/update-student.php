	<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i>&nbsp;Update Student <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Student</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li><a href="index.php?page=all-students"><i class="fa fa-users"></i>&nbsp;All Student</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li class="active" style="color:#808080"> <i class=" fa fa-pencil-square-o"></i>&nbsp;Update Student</li>
	</ol>
	
	<?php 
		$id = base64_decode($_GET['id']); 
//id receive kora holo all-students.php er edit option theke 

		$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = '$id'");
//ai code dara db connect kora holo r db theke id ta run kora holo
		
		$db_row = mysqli_fetch_assoc($db_data);  
// fetch assoc dara input field index.php?page=update-student&id=Mw== ai jaigai db er oi id er sob data chole ashbe		

		if(isset($_POST['update-student'])){
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$class = $_POST['class'];
		$city = $_POST['city'];
		$pcontact = $_POST['pcontact'];
		
//<> Jehetu edit a ba update page a photo edit/update korbo na tai comment kore rakhlam kokhono photo update korte chaile comment tule dile hobe  <>
	
//		$picture = explode('.',$_FILES['picture']['name']);
//ai explode er dara array er maddhome picture-name r picture-format index-array([0][1]..) te show korbe 		
	//	$picture_ex = end($picture);
//end function er dara picture-format er extension ber kora hoi	r $picture er moddhe theke extension ta ber kore nibe	
	//	$picture_name = $roll.'.'.$picture_ex;
//ai condition dara add student er input field theke j roll pabe ba database theke j roll pabe seta picture-name hobe r $picture_ex er dara extension o ashbe

//<> Jehetu edit a ba update page a photo edit/update korbo na tai comment kore rakhlam kokhono photo update korte chaile comment tule dile hobe  <>
		
		$query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id` = '$id'";
//ai query dara add student page er input field theke database a data insert korar code
		
		$result = mysqli_query($link,$query);
// ai function dara query run hosse jekhane $link dara db connect er kaj hosse r $query dara db te input field theke data insert kora hosse
		
		if($result){
			header('location: index.php?page=all-students');
		}

}

	?>
	
<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Student Name</label>
				<input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required value="<?=$db_row['name']?>" />	
<!-- value="<?=$db_row['name']?>" ai code dara all-student.php page a edit a click korle update-student.php page a name er input field a j naam a db te submit hoyese sei naam ta update a show korabe -->				
			</div>
			<div class="form-group">
				<label>Student Roll</label>
				<input type="text" name="roll" placeholder="Student Roll Minimum 6 Digits" id="roll" class="form-control" pattern="[0-9]{6}" required value="<?=$db_row['roll']?>" />	
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" placeholder="City" id="city" class="form-control" required value="<?=$db_row['city']?>" />	
			</div>
			<div class="form-group">
				<label>PContact</label>
				<input type="text" name="pcontact" placeholder="(01********) Minimum 11 Digits" id="pcontact" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required value="<?=$db_row['pcontact']?>" />	
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select id="class" class="form-control" name="class" required >
					<option value="">Select</option>
					<option <?php echo $db_row['class']=='1st' ? 'selected=""':''; ?> value="1st">1st</option>
					<option <?php echo $db_row['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd</option>
					<option <?php echo $db_row['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd</option>
					<option <?php echo $db_row['class']=='4th' ? 'selected=""':''; ?> value="4th">4th</option>
					<option <?php echo $db_row['class']=='5th' ? 'selected=""':''; ?> value="5th">5th</option>
<!-- php te echo $db_row['class']=='5th' ? 'selected=""':''; ?> ai php code dara edit/update page a oi id er class ki cilo ba db te ja diyesilo ta dekhabe -->					
				</select>
			</div>
	
			<div>
				<input type="submit" value="Update Student" name="update-student" class="btn btn-primary float-right" />
			</div>
			
			
		</form>
	</div>
</div>