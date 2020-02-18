<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("location:login.php");
}
// Store Session Data
 $username= $_SESSION['user'];  // Initializing Session with value of PHP Variable
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
	============================================= -->
	<title>Confirm | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />




</head>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php 	include 'include/header.php'; ?>



	<div class="container">
		<br>


<center>
      <h1>Order Confirm Successfull. Thank You!</h1>
    </center>

    <br><br>



	</div><!-- /container -->
	


		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>