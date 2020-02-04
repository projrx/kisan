
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php include 'include/head.php'; ?>
	<!-- Document Title
	============================================= -->
	<title>Become a Member Registration  | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />

<?php 
  if(isset($_POST['updateid'])){
		$n=1;
		if (!empty($_FILES['img'.$n]['name'])) {
			${"img" . $n} = md5(uniqid())  . "1.png";
			$target = "images/forms/".basename(${"img" . $n});
			$move=move_uploaded_file($_FILES['img'.$n]['tmp_name'], $target);
			}

		$n=2;
		if (!empty($_FILES['img'.$n]['name'])) {
			${"img" . $n} = md5(uniqid())  . "1.png";
			$target = "images/forms/".basename(${"img" . $n});
			$move=move_uploaded_file($_FILES['img'.$n]['tmp_name'], $target);
			}

  $data=mysqli_query($con,"INSERT INTO test 
  	(`name`,`desp`,`img1`,`img2`) 
  	VALUES 
  	( '".mysqli_real_escape_string($con,$_POST['name'])."' 
  	, '".mysqli_real_escape_string($con,$_POST['desp'])."'
  	, '".mysqli_real_escape_string($con,$img1)."'
  	, '".mysqli_real_escape_string($con,$img2)."'
  	)")or die( mysqli_error($con) );

      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
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
     


      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td style="max-width: 100px;">
            
            	 Name: <br><br>

            </td>

            <td>
              <input type="text" class="form-control" name="name" value="">
	          	<br>



           		
            </td>

          </tr>




          <tr>
            <td> Img 1: </td>
            <td>
              <input type="file" accept="image/*" class="form-control" name="img1">
            </td>

          </tr>

          <tr>
            <td> Img 2: </td>
            <td>
              <input type="file" accept="image/*" class="form-control" name="img2">
            </td>

          </tr>






          <tr>
            <td> Description: </td>
            <td>
              <input type="text" class="form-control" name="desp" value="" placeholder="Your Street Address">
            </td>

          </tr>






          <tr>
            <td colspan="2">

              <div class="text-center">

                <button type="submit" name="updateid"  class="btn btn-info"> <i class="fa fa-plus"></i>Update</button>
              </div>
            </td>
          </tr>

        </form>
      </tbody>



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