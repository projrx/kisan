<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['admin'])){
  header("location:index.php");
}
?>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
	============================================= -->
	<title>Admin Login | | APKI Party</title>
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
<div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 text-center">
        <h1>
          <a href="./">Admin Login</a>
        </h1>
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" name="username" placeholder="Username" type="text">
          </div>
          <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password">
          </div>
          <div class="form-group">

            <input type="submit" name="login" class="btn btn-info" value="Submit >">
          </div>
          
        </form>

       

        <?php
                       
           if (isset($_POST['login'])) {
                       if (empty($_POST['username']) || empty($_POST['password'])) {
                       echo "Username or Password is empty";
                       }
                       else
                       {
                       $username=$_POST['username'];
                       $password=$_POST['password'];
                       $username3 = stripslashes($username);
                       $username2 = str_replace("<", "", $username3);
                       $username1 = str_replace(">", "", $username2);
                       $username = str_replace("'", "", $username1);
                       $password3 = stripslashes($password);
                       $password2 = str_replace("<", "", $password3);
                       $password1 = str_replace(">", "", $password2);
                       $password = str_replace("'", "", $password1);



                       $query = mysqli_query($con,"SELECT * from admin where password='$password' AND username='$username'")or die(mysqli_error($con));
                       $rows = mysqli_num_rows($query);
                       if ($rows == 1) {

                        session_start();
                          if(isset($_SESSION['admin'])){
                            header("location:index.php");
                          }
                       $_SESSION['admin']=$username; // Initializing Session
                      
                  
                       header("location:index.php"); // Redirecting To Other Page
                       } else {
                        echo "Username or Password is Invalid";

                       }
                       }
                       }

                       ?>





     </div>
    </div>


		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>