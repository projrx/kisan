<?php include 'include/secure.php'; ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php include 'include/head.php'; ?>



<?php 

  if(isset($_POST['card'])){
    $msg="Unsuccessful" ;

    $id=$_POST['card'];

      $sql = "UPDATE party SET `status` = '1' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

      
    }
  ?>




	<!-- Document Title
	============================================= -->
	<title>View Users | APKI </title>
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
        
      <?php

      $rows =mysqli_query($con,"SELECT * FROM users where id='$id' " ) or die(mysqli_error($con));
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
    }
        
        ?>


            <div class="col-12">

              <div class="row">
              <div class="col-3">

              <img src="../images/users/<?php echo $img ?>" class="alignleft img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 180px;">


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






   


</div>

</div>
    <br>
    <hr>
    <br>
<?php } ?>





			<br>
			<div class="row" style="margin-right: 0px">

				<div class="col-md-1">
				</div>
				<div class="col-md-3">
					<?php include 'include/sidebar.php'; ?>

				</div>

				<div class="col-md-7">
					<h3>All Users Registered</h3>



<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">    <thead>
      <th>
       ID.
     </th>
      <th>
      	Name
     </th>
      <th>
       Username
     </th>
      <th>
       Email
     </th>


    <th class="hidden-xs">
      Save
    </th>              </thead>
    <tbody>

          
      <?php

      $rows =mysqli_query($con,"SELECT * FROM users " ) or die(mysqli_error($con));
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
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>
            <td>
              <?php echo $username ?>
            </td>

            <td>
              <?php echo $email ?>
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

		</section><!-- #content end -->



		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>