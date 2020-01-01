	<h1 class="text-primary"><i class="fa fa-users"></i>&nbsp;All Students <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Students</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard" style="color:#808080"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li class="active" style="color:#808080"> <i class="fa fa-users"></i>&nbsp;All Students</li>
	</ol>
				
				
				<div class="table-responsive">
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Roll</th>
						<th>Class</th>
						<th>City</th>
						<th>Contact</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					
					<?php 
						$db_info = mysqli_query($link,"SELECT * FROM `student_info`");
//index.php er dashboard page a database theke data nia aishe dashboard a show korate ai code use kora hoise
						while($row = mysqli_fetch_assoc($db_info)){
//ai function dara associative array ashbe r while loop dara jotokhon db te value thakbe totokhon loop hoye 
//value gulo db theke fetch(aanbe) index er dashboard page a							
						 ?>
						
						<tr>
							<td><?php echo $row['id'];?></td>
<!-- ai php code dara manual data table field a(index.php-dashboard a) database theke data gulo ana hobe r ta oi table a db data dynamically show korabe -->							
							
							<td><?php echo ucwords($row['name']);?></td>
<!-- ai ucwords function dara 1st letter capital hobe jodi input field a 1st letter small letter o dei ta db te small hoye save but jokhon index page a show korbe
 tokhon ta dynamically 1st letter capital hesebe dekhabe-->							
							<td><?php echo $row['roll'];?></td>
							<td><?php echo $row['class'];?></td>
							<td><?php echo ucwords($row['city']);?></td>
							<td><?php echo $row['pcontact'];?></td>
							<td><img style="width:70px;height:70px" src="student_images/<?php echo $row['photo'];?>" alt="Russell"></td>
							<td>
							<a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i>&nbsp;Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
<!-- href er dara update-student.php page a jabe.r page=update-student&id= php te echo base64_encode($row['id']); atar maddhome edit a click korle url a edit er oi id ta encode hoye url a show korabe-->
							<a href="delete_student.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a> 
<!-- <a href="delete_student.php?id=<?php echo $row['id'];?> ai code dara url a get dara id ta ddynamically dhora hosse r base64_encode($row['id']) ai function dara id ta encode hoye jabe -->				
							</td>
						
						</tr>
<!-- php code er 2nd bracket ai manual data field er niche dibar karon holo fetch assoc er maddhome j data ana holo dashboard
 page a ta table a sundor kore decorate kore table a show korate ai manual datar niche ai } php te niche ana hoise -->						
						<?php
						}
						?>
						
					</tbody>
				</table>
				</div>