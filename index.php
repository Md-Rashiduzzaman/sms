<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Students Management System</title>
  </head>
  <body style="background-color:#f5f5f5;">
    <div class="container"><br/>
		<a class="btn btn-primary float-right" href="admin/login.php">Login</a>
		<br/><br/>
		<h1 class="text-center">Welcome to Students Management System</h1>
		<br/>
		<div class="row">
			<div class="col-sm-5 offset-4">
				<form action="" method="POST" >
			<table class="table table-bordered">
			
				<tr>
					<td colspan="2" class="text-center"><label>Student Information</label></td>
				</tr>
				<tr>
					<td style="text-align:center;"><label for="choose">Choose Class</label></td>
					<td>
						<select class="form-control" id="choose" name="choose">
							<option value="" >Select</option>
							<option value="1st">1st</option>
							<option value="2nd">2nd</option>
							<option value="3rd">3rd</option>
							<option value="4th">4th</option>
							<option value="5th">5th</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:center;"><label for="roll">Roll</label></td>
					<td><input class="form-control" type="text" name="roll" placeholder="Enter Your 5 Digit Roll Number" /></td>
				</tr>
				<tr>
					<td colspan="2" class="text-center"><input class="btn btn-info" type="submit" value="Show Info" name="show info" /></td>
				</tr>
			</table>
		</form>
		</div>
		</div>
		
		 <?php 
		 require './admin/dbcon.php';
		 
		 if(isset($_POST['show_info'])){
			$choose = $_POST['choose'];
			$roll = $_POST['roll'];
		
			$result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll'");
			
			if(mysqli_num_rows($result) == 1){
				
				$row = mysqli_fetch_assoc($result);
				
			?>
			<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
			<table class="table table-bordered">
				<tr>
					<td rowspan="4">
						<img src="admin/student_images/<?= $row['photo'] ?>"  class="img-thumbnail" width="150px" height="150px" alt="Student Photo" />
					</td>
					<td>Name</td>
					<td><?= ucwords($row['name']); ?></td>
				</tr>
				<tr>
					<td>Roll</td>
					<td><?= $row['roll'] ?></td>
				</tr>
				<tr>
					<td>Class</td>
					<td><?= $row['class'] ?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?= ucwords($row['city']); ?></td>
				</tr>
			</table>
		</div>
		</div>
			<?php
			} else{
			?>
			<script type="text/javascript">
				alert("Data not Found");
			</script>	
			
			<?php
			
			}

			} 
		 ?>
		
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>