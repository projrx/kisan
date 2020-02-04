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
	<title>Edit Profile  | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />

<?php 

  if(isset($_POST['updateid'])){
    $msg="Unsuccessful" ;

    $id=$_POST['updateid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $area=$_POST['area'];
    $newpassword=$_POST['newpassword'];
    $desp1=$_POST['desp'];

    $desp = str_replace("'", "''", $desp1);       

    if (!empty($_FILES['img']['name'])) {

        // Get image name
      $image = $_FILES['img']['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "images/users/".basename($image);

      $data=mysqli_query($con,"UPDATE users SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }      

      }

      if (!empty($newpassword)){

      $sql = "UPDATE users SET `password` = '$newpassword' WHERE  `id`='$id' ";
      mysqli_query($con, $sql) ;


    }

      $sql = "UPDATE users SET `name` = '$name',`email` = '$email',`desp` = '$desp',`city` = '$city',`phone` = '$phone',`area` = '$area',`address` = '$address' WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

header("location:profile.php"); // Redirecting To Other Page
      
    }
  ?>



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

				<div class="container clearfix">


		<h3>Edit Profile Details:</h3>
		<br>




    <table class="table">
      
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

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td style="max-width: 100px;">
            	Profile Image: <br><br>

              <img style="width:250px;height: 200px; " src="images/users/<?php echo $img ?>" class="form-control" ?><br>
              <input  type="file" style="max-width: 250px" class="form-control" name="img">

            </td>

            <td>
            	 Name: <br><br>
              <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
	          	<br>
           		Email: <br><br>

              <input  type="text" class="form-control" name="email" value="<?php echo $email ?>">
              <br>

            	Username: <br><br>
              <input readonly type="text" class="form-control" name="" value="<?php echo $username ?>">
           		
            </td>

          </tr>

          <tr>
            <td> Desp </td>
            <td>
              <textarea placeholder="Short Description About Yourself." class="form-control" name="desp"><?php echo $desp ?></textarea>
            </td>
          </tr>


          <tr>
            <td> Phone: </td>
            <td>
              <input placeholder="Enter your Contact Phone Number"  type="text" class="form-control" name="phone" value="<?php echo $phone ?>">
            </td>

          </tr>


          <tr>
            <td> Address: </td>
            <td>
              <input type="text" class="form-control" name="address" value="<?php echo $address ?>" placeholder="Your Street Address">
            </td>

          </tr>


          <tr>
            <td> Area: </td>
            <td>
              <input type="text" class="form-control" name="area" placeholder="Your Tehsil or Area in Your City" value="<?php echo $area ?>">
            </td>

          </tr>


          <tr>
            <td> City: </td>
            <td>
              <input placeholder="Enter you City" type="text" class="form-control" name="city" value="<?php echo $city ?>">
            </td>

          </tr>
          <tr>
            <td> New Password: </td>
            <td  style="max-width:;">
              <input  type="text" class="form-control" name="newpassword" value="" placeholder="New Password">
              <input  type="text" class="form-control" name="confirm" value="" placeholder="Confirm Password">
            </td>

          </tr>


          <tr>
            <td colspan="2">

              <div class="text-center">

                <button type="submit" name="updateid" value="<?php echo $id ?>" class="btn btn-info"> <i class="fa fa-plus"></i>Update</button>
              </div>
            </td>
          </tr>

        </form>
      </tbody>

  <?php } ?>

    </table>



				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>