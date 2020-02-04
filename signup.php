
<?php 
session_start();
if(isset($_SESSION['user'])){
  header("location:profile.php");
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
	============================================= -->
	<title>Sign Up | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />


  <?php
  if(isset($_POST['submit'])){

    $msg="Unsuccessful" ;


    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query = mysqli_query($con,"SELECT * from users where username='$username'")or die(mysqli_error($con));
    $un = mysqli_num_rows($query);
    $query = mysqli_query($con,"SELECT * from users where email='$email'")or die(mysqli_error($con));
    $em = mysqli_num_rows($query);
    if ($un > 0) {
      $error = 'Username is Registered.';
    }else if ($em > 0) {
      $error = 'Email is Already Registered.';
    }else{


      $img='avatar.png';

      $data=mysqli_query($con,"INSERT INTO users (name,email,username,password,phone,img)VALUES ('$name','$email','$username','$password','$phone','$img')")or die( mysqli_error($con) );


$_SESSION['user']=$username; // Initializing Session


header("location:editprofile.php"); // Redirecting To Other Page


}





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

			<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">

    <div class="tab-content clearfix" id="tab-register">
      <div class="card nobottommargin">
        <div class="card-body" style="padding: 40px;">
          <h3>Register for an Account</h3>

          <form id="register-form" name="register-form" action="" method="post">

            <div class="col_full">
              <label>Name:</label>
              <input type="text" name="name" value="" class="form-control" required />
            </div>

            <div class="col_full">
              <label>Email Address:</label>
              <input type="text" name="email" value="" class="form-control" required />
            </div>

            <div class="col_full">
              <label>Choose a Username:</label>
              <input type="text" name="username" value="" class="form-control" required/>

            </div>

            <div class="col_full">
              <label>Phone:</label>
              <input type="number" name="phone" value="" class="form-control" required />
            </div>

            <div class="col_full">
              <label>Choose Password:</label>
              <input type="password" id="pass" name="password" value="" class="form-control" required />
            </div>

            <div class="col_full">
              <label>Re-enter Password:</label>
              <input onkeyup="check();" type="password" id="repass" name="repassword" value="" class="form-control" required />
            </div>



            <div class="col_full text-center">
              <br><br>
              <p class="lead"> <?php if(!empty($error)) echo $error ?> </p>
            </div>


            <div class="col_full text-center">
              <br><br>
              <button disabled="" id="submit" class="btn btn-info text-center" name="submit" value="register">Register Now</button>
            </div>

          </form>
        </div>
      </div>
    </div>
    </div>
    </div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

<script type="text/javascript">
	
  function check() {

    pass = document.getElementById('pass').value;
    repass = document.getElementById('repass').value;

    if (pass!=repass) { 
      document.getElementById('submit').disabled=true;
    }else{
      document.getElementById('submit').disabled=false;
    }

  }


</script>
			
	</div><!-- #wrapper end -->

</body>
</html>