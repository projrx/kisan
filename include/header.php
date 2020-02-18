
        <header id="header" class="full-header">

		<div id="header-wrap">

			<div class="container clearfix">

				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

				<label class="top-title">All Pakistan Kisan Itehad</label>
				<a href="admin" class="top-admin">Admin Login</a>

				<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="http://apkiparty.com/" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						
					</div><!-- #logo end -->

				<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="http://apkiparty.com/"><div><i class="icon-home"></i> Home</div></a>
								
							</li>
						
							<li><a href="#"><div><i class="icon-file2"></i> Forms</div></a>
								<ul class="menu-pos-invert">
									<li><a href="registration.php"><div>Member Registration</div></a></li>
									<li><a href="zakatfund.php"><div>Zakat Fund Donation</div></a></li>
									<li><a href="partyfund.php"><div>Party Fund Donation</div></a></li>

								</ul>
							</li>



							<li><a href="shop.php"><div><i class="icon-shop"></i>Kisan Mandi</div></a>
								
								<ul class="menu-pos-invert">
									
									<li><a href="kisanbuy.php"><div>Kisan Buy</div></a></li>
									<li><a href="kisansell.php"><div>Kisan Sell</div></a></li>
								</ul>
							</li>
						


						
							<?php 
if(isset($_SESSION['user'])){
							 ?>
							<li><a href="profile.php"><div><i class="icon-user"></i> My Account</div></a>
								<ul>
									<li><a href="profile.php"><div>View Profile</div></a></li>
									
									<li><a href="editprofile.php"><div>Edit Profile Details</div></a></li>
									<li><hr></li>
									<li><a href="logout.php"><div>Logout</div></a></li>
								</ul>
							</li>
						<?php } else { ?>
							<li><a href="login.php"><div><i class="icon-lock"></i>Account </div></a>
								<ul>
									<li><a href="login.php"><div>Login</div></a></li>
									
									<li><a href="signup.php"><div>Sign Up</div></a></li>

								</ul>
							</li>
						<?php } ?>


							<?php 
if(isset($_SESSION['user'])){
							 ?>
							<li><a href="cart.php"><div><i class="icon-cart"></i>Cart &nbsp;
								<div class="badge" style="background: white; color: green">
								<?php 

          $rows =mysqli_query($con,"SELECT * FROM orders where status='cart' AND actid='$memberid'" ) or die(mysqli_error($con));
          
          	echo $citems = mysqli_num_rows ( $rows );

             ?>	

								</div>
							 </div></a>
							</li>
						<?php } ?>
						</ul>

				

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
