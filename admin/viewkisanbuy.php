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
	<title>View Kisan Buy Forms | APKI </title>
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
    <br>
    <h4>Kisan Buy Form</h4>
    <br>

   <table class="table table-bordered">
   <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM buy where id=$id " ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){


        $formid = $row['id']; 
        $memberid = $row['memberid']; 
        $membername = $row['membername']; 
        $name = $row['name']; 
        $desp = $row['desp']; 
        $img1 = $row['img1']; 
        $img2 = $row['img2']; 
        $datec = $row['datec']; 

        ?>

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

        

          <tr>
            <td> Buyer ID: </td>
            <td>
              <?php echo $memberid ?>
            </td>
          </tr>

          <tr>
            <td> Buyer Name: </td>
            <td>
              <?php echo $membername ?>
            </td>
          </tr>


          <tr>
            <td> Product Name: </td>
            <td>
              <?php echo $name ?>
            </td>
          </tr>

          <tr>
            <td> Description: </td>
            <td>
              <?php echo $desp ?>
            </td>
          </tr>

          <tr>
            <td> Images: </td>
            <td>

              <?php if(!empty($img1)){ ?>
                    <img style="height:200px; " src="../images/buy/<?php echo $img1 ?>" class="" ?> <?php } ?>

              <?php if(!empty($img2)){ ?>
                    <img style="height:200px; " src="../images/buy/<?php echo $img2 ?>" class="" ?> <?php } ?>

            </td>
          </tr>


        


          <tr>
            <td> Date: </td>
            <td  style="max-width: 60px;">
              <?php echo $datec ?>

            </td>

          </tr>
          <tr>
            <td colspan="2"> 
              <div class="text-center">
                <a href="viewusers.php?id=<?php echo $memberid; ?>" class="btn btn-info" >
                Contact Buyer </a>
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
					<h3>View All Kisan Buy Forms</h3>




<table id="datatable1" class="table table-striped table-bordered" >    

  <thead>
      <th>
       Form ID
     </th>
      <th>
       Buyer Name
     </th>

     <th>
       Product Name 
     </th>

    <th style="width:;">
      Date:
    </th>
    <th class="hidden-xs">
      View
    </th>            
      </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM buy LIMIT 100" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $formid = $row['id']; 
        $name = $row['name']; 
        $img1 = $row['img1']; 
        $datec = $row['datec']; 
        $memberid = $row['memberid']; 
        $membername = $row['membername']; 


        ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $formid ?>
            </td>
            <td>
              <?php echo $membername ?>
            </td>

            <td>
              <?php echo $name ?>
            </td>
            <td>
              <?php echo $datec ?>

            </td>

        


            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $formid ?>"> <i class="fa fa-eye"></i>View</a>

                

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