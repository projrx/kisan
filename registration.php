
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
  	$datec=date('Y-m-d');
  	$data=mysqli_query($con,"INSERT INTO member 
  	(`name`,`fname`,`dob`,`idcard`,`phone`,`address`,`tehsil`,`chak`,`datec`,`img1`,`img2`) 
  	VALUES 
  	( '".mysqli_real_escape_string($con,$_POST['name'])."' 
  	, '".mysqli_real_escape_string($con,$_POST['fname'])."'
  	, '".mysqli_real_escape_string($con,$_POST['dob'])."'
  	, '".mysqli_real_escape_string($con,$_POST['idcard'])."'
  	, '".mysqli_real_escape_string($con,$_POST['phone'])."'
  	, '".mysqli_real_escape_string($con,$_POST['address'])."'
  	, '".mysqli_real_escape_string($con,$_POST['tehsil'])."'
  	, '".mysqli_real_escape_string($con,$_POST['chak'])."'
  	, '".mysqli_real_escape_string($con,$datec)."'
  	, '".mysqli_real_escape_string($con,$img1)."'
  	, '".mysqli_real_escape_string($con,$img2)."'
  	)")or die( mysqli_error($con) );


      $rows =mysqli_query($con,"SELECT id FROM member ORDER BY id desc limit 1" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
        $id = $row['id']; 	}

      ($msg=mysqli_error($con));
      if(empty($msg)) header("location:registration.php?success=1&memberid=$id");

    }
  ?>


  <style type="text/css">
  	.table th, .table td {

    vertical-align: baseline;
}

  </style>


</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php 	include 'include/header.php'; ?>


<?php if(empty($_GET['success'])){ ?>


		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">


		<h3>Become a Member of APKI:</h3>
		<br>

    <table class="table table-hover">
     


      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td style="min-width:100px;">
            	 <label>Name (As on ID-Card):</label>
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" id="name" name="name" value="" required="" onchange="run();">	
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
            	 <label>Father's Name:</label>
            	 
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="fname" value="" required="">	
            </td>

          </tr>



          <tr>
            <td style="min-width:100px;">
            	 <label>Date of Birth:</label>
            	 
            </td>
            <td>
              <input style="max-width: 200px;" type="date" class="form-control" name="dob" value="" required="">	
            </td>

          </tr>



          <tr>
            <td style="min-width:100px;">
            	 <label>ID Card No:</label>
            	 
            </td>
            <td>
              <input style="max-width: 400px;" type="number" class="form-control" name="idcard" value="" required="">	
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
            	 <label>Mobile / Phone:</label>
            	 
            </td>
            <td>
              <input style="max-width: 400px;" type="number" class="form-control" name="phone" value="" required="">	
            </td>

          </tr>




          <tr>
            <td style="min-width:100px;">
            	 <label>Address:</label>
            	 
            </td>
            <td>
              <input style="max-width: 600px;" type="text" class="form-control" name="address" value="" required="">	
            </td>

          </tr>



          <tr>
            <td style="min-width:100px;">
            	 <label>Tehsil:</label>
            	 
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="tehsil" value="" required="">	
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
            	 <label>Chak:</label>
            	 
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="chak" value="" required="">	
            </td>

          </tr>


          <tr>
            <td> <label>ID Card Front Image: </label> </td>
            <td>
              <input style="max-width: 250px;" type="file" accept="image/*" class="form-control" name="img1" required="">
            </td>


          </tr>

          <tr>
            <td> <label> ID Card Back Image: </label></td>
            <td>
              <input style="max-width: 250px;" type="file" accept="image/*" class="form-control" name="img2" required="">
            </td>

          </tr>






          <tr style="background: none !important;">	<td colspan="2">
	          		<input type="checkbox" name="check" required="">
	          		<lablel> I ' <input style="border: none;width:auto;" class="" type="text" id="tname" name="tname" value="">' with my own well joining this party and from this date ' <?php echo date('d-m-Y'); ?> ' I will be Loyal and bound all party decisions, party policies, work for party to develop Pakistan. In case of miss conduct party can cancel my registration or I would face all legal procedure of Party.
	          		</label>
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

	<?php } else{  ?>


		<section>
			<div class="container">
				<div class="text-center">
					<h3>Registration successful.</h3>
					<label style="font-size: 18px;font-weight: 200">
					Welcome to All Pakistan Kisan Itehad.<br>
					ur member ship no is: <strong style="font-weight: 800"> <?php echo $_GET['memberid'] ?> </strong> .<br>
					Kindly contact Tehsil Office to get your Member ship card
				</label>

				<br><br>
				<a href="http://apkiparty.com/" class="btn btn-info">Back to Home</a>
			</div>
		</div>

		</section>

	<?php } ?>

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

	<script type="text/javascript">
		
		function run() {
			x = document.getElementById('name').value;
			document.getElementById('tname').value=x;
		}

	</script>

</body>
</html>