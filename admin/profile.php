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
	<title>User Profile | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php 	include 'include/header.php'; ?>



		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">



    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">


        
      <?php

      $rows =mysqli_query($con,"SELECT * FROM users where username='$username' " ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $username = $row['username']; 
        $email = $row['email']; 
        $phone = $row['phone']; 
        $address = $row['address']; 
        $area = $row['area']; 
        $city = $row['city']; 
        $desp = $row['desp']; 
        $img = $row['img']; 
        $password = $row['password']; 
        $datec = $row['datec']; 
        
        ?>


            <div class="col-12">

              <div class="row">
              <div class="col-3">

              <img src="images/users/<?php echo $img ?>" class="alignleft img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 180px;">


             </div>
              <div class="col-6">
              	<br>

              <div class="heading-block noborder">
                <h3><?php echo $name ?></h3>
                <span>@<?php echo $username ?></span>
                <span><?php echo $desp ?></span>
              </div>

              	<br>
              	<br>

              </div>
              <div class="col-3 ">
                <i class="icon-pencil"></i> <a href="editprofile.php"> Edit Profile </a>
                -
                <i class="icon-logout"></i> <a href="logout.php"> Logout </a>
              </div>
              </div>

              <div class="clear"></div>
            

              <table class="table">
                <tbody>

                	<tr>
                  <td> <h4> Email: </h4> </td><td> <h4 class="lead"><?php echo $email ?></h4></td>
                </tr>
                <tr>
                  <td> <h4> Phone: </h4> </td><td> <h4 class="lead"><?php echo $phone ?></h4></td>
                </tr>

                <tr>
                  <td> <h4> Address: </h4> </td><td> <h4 class="lead"><?php echo $address ?></h4></td>
                </tr>

                <tr>
                  <td> <h4> Area: </h4> </td><td> <h4 class="lead"><?php echo $area ?></h4></td>
                </tr>

                <tr>
                  <td> <h4> City: </h4> </td><td> <h4 class="lead"><?php echo $city ?></h4></td>
                </tr>

                <tr> 
                  <td><h4> Joining: </h4></td><td><h4 class="lead"><?php echo $datec ?></h4></td>
                </tr>


              </tbody></table>




            </div>

          <?php } ?>






        </div>
      </div>
		


<br><br>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>