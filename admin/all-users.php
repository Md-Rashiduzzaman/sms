	<h1 class="text-primary"><i class="fa fa-users"></i>&nbsp;All Users <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Users</small></h1>
	<ol class="breadcrumb">
		<li><a href="index.php?page=dashboard" style="color:#808080"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<li class="active" style="color:#808080"> <i class="fa fa-users"></i>&nbsp;All Users</li>
	</ol>
				
				
				<div class="table-responsive">
				<table id="data" class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Username</th>
						<th>Photo</th>
					</tr>
					</thead>
					<tbody>
					
					<?php 
						$db_info = mysqli_query($link,"SELECT * FROM `users`");
//index.php er dashboard page a database theke data nia aishe dashboard a show korate ai code use kora hoise
						while($row = mysqli_fetch_assoc($db_info)){
//ai function dara associative array ashbe r while loop dara jotokhon db te value thakbe totokhon loop hoye 
//value gulo db theke fetch(aanbe) index er dashboard page a							
						 ?>
						
						<tr>
<!-- ai php code dara manual data table field a(index.php-dashboard a) database theke data gulo ana hobe r ta oi table a db data dynamically show korabe -->							
							
							<td><?php echo ucwords($row['name']);?></td>
<!-- ai ucwords function dara 1st letter capital hobe jodi input field a 1st letter small letter o dei ta db te small hoye save but jokhon index page a show korbe
 tokhon ta dynamically 1st letter capital hesebe dekhabe-->							
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['username'];?></td>
							
							<td><img style="width:70px;height:70px" src="images/<?php echo $row['photo'];?>" alt="Russell"></td>
						
						</tr>
<!-- php code er 2nd bracket ai manual data field er niche dibar karon holo fetch assoc er maddhome j data ana holo dashboard
 page a ta table a sundor kore decorate kore table a show korate ai manual datar niche ai } php te niche ana hoise -->						
						<?php
						}
						?>
						
					</tbody>
				</table>
				</div>