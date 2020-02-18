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
	<title>Kisan Buy | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />



  <?php 

    if(!empty($_GET['del'])){
      $msg="Unsuccessful" ;

      $id=$_GET['del'];

      $sql = "DELETE FROM buy WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";



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




<?php if(!empty($_GET['id'])){ ?>

  <?php $id=$_GET['id']; ?>
    <div class="container">
    <br><br>
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
                    <img style="height:200px; " src="images/buy/<?php echo $img1 ?>" class="" ?> <?php } ?>

              <?php if(!empty($img2)){ ?>
                    <img style="height:200px; " src="images/buy/<?php echo $img2 ?>" class="" ?> <?php } ?>

            </td>
          </tr>


        


          <tr>
            <td> Date: </td>
            <td  style="max-width: 60px;">
              <?php echo $datec ?>

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


        <div class="col-md-10">
          <div style="float: right;">
              <a class="btn btn-info" href="buy.php"> New Buy Form </a>
          </div>
          <h3>My Kisan Buy Forms:</h3>
          



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
      View / Delete
    </th>            
      </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM buy WHERE memberid=$memberid LIMIT 100" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $formid = $row['id']; 
        $name = $row['name']; 
        $img1 = $row['img1']; 
        $datec = $row['datec']; 


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
                <a class="btn btn-danger" href="?del=<?php echo $formid ?>"> <i class="fa fa-trash"></i>Delete</a>
                

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