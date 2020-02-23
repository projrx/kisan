<?php include 'include/secure.php'; ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php include 'include/head.php'; ?>



<?php 

  if(isset($_POST['card'])){
    $msg="Unsuccessful" ;

    $id=$_POST['card'];

      $sql = "UPDATE member SET `status` = '1' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

      
    }
  ?>




	<!-- Document Title
	============================================= -->
	<title>View Members Registration Forms | APKI </title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />

	<style type="text/css">
		.table th, .table td {
    padding: 0.75rem;
    vertical-align: middle;
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



		<!-- Content
		============================================= -->
		<section id="content">


<?php if(!empty($_GET['id'])){ ?>

  <?php $id=$_GET['id']; ?>
    <div class="container">
    <br><br>
   <table class="table table-bordered">
   <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM member where id=$id " ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $fname = $row['fname']; 
        $dob = $row['dob']; 
        $img = $row['img']; 
        $refname = $row['refname']; 
        $reffname = $row['reffname']; 
        $idcard = $row['idcard']; 
        $phone = $row['phone']; 
        $address = $row['address']; 
        $tehsil = $row['tehsil']; 
        $chak = $row['chak']; 
        $img1 = $row['img1']; 
        $img2 = $row['img2']; 
        $status = $row['status']; 
        $datec = $row['datec']; 
        $dates = $row['dates']; 


        ?>

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td style="max-width: 200px;">

 			<div class="tabs clearfix" id="tab-1">

							<div class="tab-container">


								<div class="tab-content clearfix" id="tabs-1">
										<a href="../images/forms/<?php echo $img ?>" target="blank"> <img style="width:200px;height: 200px; " src="../images/forms/<?php echo $img ?>" class="" ?> </a>

								</div>

                <div class="tab-content clearfix" id="tabs-2">
                    <a href="../images/forms/<?php echo $img1 ?>" target="blank"> <img style="width:300px;height: 200px; " src="../images/forms/<?php echo $img1 ?>" class="" ?> </a>

                </div>
								<div class="tab-content clearfix" id="tabs-3">
									<a href="../images/forms/<?php echo $img2 ?>" target="blank"> 
										<img style="width:300px;height: 200px; " src="../images/forms/<?php echo $img2 ?>" class="" ?>
									</a>

								</div>

							<ul class="tab-nav	 clearfix">
								

								<li><a href="#tabs-1">Profile Image</a></li>
                <li><a href="#tabs-2">Front Image</a></li>
								<li><a href="#tabs-3">Back Image</a></li>

							</ul>

							</div>

						</div>


            </td>

            <td> 
            	<table class="table ">
            		
            	<tr>
            		<td>
            	Name: 	<br>
            		</td>
            		<td>
              <?php echo $name ?> 	<br>
          			</td>
          		</tr>


          		<tr>
          			<td>
              Father's Name 		<br>
              			</td>
              			<td>
              <?php echo $fname ?> 		<br>
              		</td>
              	</tr>


          		<tr>
          			<td>

              Date of Birth  			<br>
              		</td>
              		<td>
            	
              <?php echo $dob ?> 		<br>
              		</td>
              	</tr>

          		<tr>
          			<td>

				ID Card No. 		<br>
					</td>
					<td>
            	
              <?php echo $idcard ?>		<br>

              	</td>
              </tr>

            	</table>

            </td>

          </tr>
      

          
          <tr>
            <td> Phone: </td>
            <td>
              <?php echo $phone ?>
            </td>
          </tr>

          <tr>
            <td> Address: </td>
            <td>
              <?php echo $address ?>
            </td>
          </tr>

          <tr>
            <td> Tehsil: </td>
            <td>
              <?php echo $tehsil ?>
            </td>
          </tr>

          <tr>
            <td> Chak / Moza: </td>
            <td>
              <?php echo $chak ?>
            </td>
          </tr>

        


          <tr>
            <td> Date: </td>
            <td  style="max-width: 60px;">
              <?php echo $datec ?>

            </td>

          </tr>

          <tr>
            <td> Reference: </td>
            <td  style="max-width: 60px;">
              <?php if (empty($refname)) echo 'No Refernce.'; else echo 'Name: '.$refname.' '.$reffname; ?>


            </td>

          </tr>
          <tr>
            <td> Member ID Card Status: </td>
            <td  style="max-width: 60px;">
              <?php if ($status==0) echo 'Not Provided.'; else echo 'Card Provided.' ?>

            </td>

          </tr>

          <tr style="display: <?php if ($status==1) echo 'none;' ?>">
            <td colspan="2">

              <div class="text-center">

                <button type="submit" value="<?php echo $id ?>" name="card" class="btn btn-info"> <i class="fa fa-plus"></i>Confirm Member Card.</button>
              </div>
            </td>
          </tr>

        </form>
      </tbody>
    </table>

</div>


    <br>
    <hr>
    <br>
<?php } if(empty($name)) echo 'Not Found'; } ?>





			<br>
			<div class="row" style="margin-right: 0px">

				<div class="col-md-1">
				</div>
				<div class="col-md-3">
					<?php include 'include/sidebar.php'; ?>

				</div>

				<div class="col-md-7">
					<h3>View Members Registration Forms</h3>



<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">    <thead>
      <th>
       Reg. ID
     </th>
      <th>
       Name
     </th>

     <th>
       ID Card No. 
     </th>
    <th>
      Tehsil:
    </th>
    <th style="width:;">
      Phone:
    </th>
    <th class="hidden-xs">
      Save
    </th>              </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM member ORDER BY id desc LIMIT 1000 " ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $phone = $row['phone']; 
        $fname = $row['fname']; 
        $datec = $row['datec']; 
        $idcard = $row['idcard']; 
        $img = $row['img']; 
        $tehsil = $row['tehsil']; 


        ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>

            <td>
              <?php echo $idcard ?>
            </td>
            <td>
              <?php echo $tehsil ?>

              <!--
              <img style="width:100px;height: 70px; " src="../images/forms/<?php echo $img ?>" class="form-control" ?><br>
            -->

            </td>
            <td>
              <?php echo $phone ?>

            </td>

        


            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $id ?>"> <i class="fa fa-eye"></i>View</a>

              </div>
            </td>
          </tr>

        </form>

        <?php } ?>


      </tbody>
    </table>


				</div>


			</div>

			<br><br>
      <br><br>

		</section><!-- #content end -->
      <div class="container">
        <div class="text-center">
          <a href="searchregistration.php?limitres=100&search=ok"><u> <h3>Search & Export Members Forms</h3> </u> </a>
        </div>
    
      </div>


		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>