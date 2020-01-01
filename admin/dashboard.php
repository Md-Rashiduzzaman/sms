 <h1 class="text-primary"><i class="fa fa-dashboard"></i>&nbsp;Dashboard <small style="color:#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statistics Overview</small></h1>
			  <ol class="breadcrumb">
				<li class="active" style="color:#808080"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</li>
			  </ol>
			  
	<?php 
	$count_student = mysqli_query($link, "SELECT * FROM `student_info`");
	$total_student = mysqli_num_rows($count_student);
	
	$count_user = mysqli_query($link, "SELECT * FROM `users`");
	$total_user = mysqli_num_rows($count_user);
	
	?>
				<div class="row">
				<div class="col-sm-4">
						<div class="bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-XS-3">
										<i class="fa fa-users fa-3x"></i>
									</div>
									<div class="col-9">
										<div class="float-right" style="font-size:45px"><?= $total_student;?></div>
										<div class="clearfix"></div>
										<div class="float-right">All Students</div>
									</div>
								</div>
							</div>
							<div>
							<a href="index.php?page=all-students">
								<div class="card-footer" style="background-color:#E8E8E8">
									<span style="color:black">All Students</span>
									<span style="color:black" class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>	
							</div>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-XS-3">
										<i class="fa fa-users fa-3x"></i>
									</div>
									<div class="col-9">
										<div class="float-right" style="font-size:45px"><?= $total_user;?></div>
										<div class="clearfix"></div>
										<div class="float-right">All Users</div>
									</div>
								</div>
							</div>
							<div>
							<a href="index.php?page=all-users">
								<div class="card-footer" style="background-color:#E8E8E8">
									<span style="color:black">All Users</span>
									<span style="color:black" class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>	
							</div>
						</div>
					</div>

				</div>
				
				