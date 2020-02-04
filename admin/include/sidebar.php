
				<br><br>
				<br><br>
					<ul class="list-group">
						<li class="list-group-item current">
							<a href="index.php" >Home</a>


						</li>
						<li class="list-group-item ">
							<a href="viewregistration.php" >Member Registration Forms</a>
							<?php 	
      $rows =mysqli_query($con,"SELECT id FROM member " ) or die(mysqli_error($con));
      $members = mysqli_num_rows ( $rows );
       ?>
							<span class="badge badge-secondary float-right" style="margin-top: 3px;"><?php echo 	$members ?></span>

						</li>

						<li class="list-group-item ">
							<a href="viewzakatfund.php" >Zakat Fund Forms</a>
								<?php 	
      $rows =mysqli_query($con,"SELECT id FROM zakat " ) or die(mysqli_error($con));
      $members = mysqli_num_rows ( $rows );
       ?>
							<span class="badge badge-secondary float-right" style="margin-top: 3px;"><?php echo 	$members ?></span>
						</li>

						<li class="list-group-item ">
							<a href="viewpartyfund.php" >Party Fund Forms</a>
								<?php 	
      $rows =mysqli_query($con,"SELECT id FROM party " ) or die(mysqli_error($con));
      $members = mysqli_num_rows ( $rows );
       ?>
							<span class="badge badge-secondary float-right" style="margin-top: 3px;"><?php echo 	$members ?></span>
						</li>


						<li class="list-group-item">
							<a href="viewusers	.php" >View Users</a>
	<?php 	
      $rows =mysqli_query($con,"SELECT id FROM users " ) or die(mysqli_error($con));
      $users = mysqli_num_rows ( $rows );
       ?>
							<span class="badge badge-secondary float-right" style="margin-top: 3px;"><?php echo 	$users ?></span>

						</li>

					</ul>