	<header id="header" class="full-header" style="background-image: url('../images/menubg.png');">

		<div id="header-wrap">

			<div class="container clearfix">

				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

				<label class="top-title">All Pakistan Kisan Itehad</label>

				<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="http://apkiparty.com/" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="../images/logo.png" alt="Canvas Logo"></a>

					</div><!-- #logo end -->

				<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="index.php"><div><i class="icon-home"></i> Home</div></a>
								
							</li>
						
							<li><a href="index.php"><div><i class="icon-file2"></i> View Forms</div></a>
								<ul class="menu-pos-invert">
									<li><a href="viewregistration.php"><div>View Member Registration</div></a></li>
									<li><a href="viewzakatfund.php"><div> View Zakat Fund Donation</div></a></li>
									<li><a href="viewpartyfund.php"><div>View Party Fund Donation</div></a></li>

								</ul>
							</li>
							<li><a href="#"><div><i class="icon-cart"></i> Kisan Mandi </div></a>
								<ul class="menu-pos-invert">
									<li><a href="viewkisanbuy.php"><div>View Kisan Buy Forms</div></a></li>
									<li><a href="viewkisansell.php"><div> View Kisan Sell  Forms</div></a></li>


								</ul>
							</li>

								<?php 
if(isset($_SESSION['admin'])){
							 ?>
							<li><a href="logout.php"><div><i class="icon-user"></i> Logout </div></a>
							</li>
						<?php } ?>


						</ul>

				

					</nav><!-- #primary-menu end -->

				</div>
			</div>
		</header><!-- #header end -->
