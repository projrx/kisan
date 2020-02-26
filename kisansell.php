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
	<title>Kisan Sell | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />


  <?php 

    if(!empty($_GET['del'])){
      $msg="Unsuccessful" ;

      $id=$_GET['del'];


      $rows =mysqli_query($con,"SELECT memberid FROM sell where id=$id " ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $fmemberid = $row['memberid']; }
        if($fmemberid==$memberid){

      $sql = "DELETE FROM sell WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";

      }
  }
  ?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

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

   <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM sell where id=$id " ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){


        $formid = $row['id']; 
        $memberid = $row['memberid']; 
        $membername = $row['membername']; 
        $name = $row['name']; 
        $price = $row['price']; 
        $cname = $row['cname']; 
        $cfbr = $row['cfbr']; 
        $caddress = $row['caddress']; 
        $cemail = $row['cemail']; 
        $cphone = $row['cphone']; 
        $cwebsite = $row['cwebsite']; 
        $desp = $row['desp']; 
        $img = $row['img']; 
        $img1 = $row['img1']; 
        $img2 = $row['img2']; 
        $img3 = $row['img3']; 
        $img4 = $row['img4']; 
        $img5 = $row['img5']; 
        $datec = $row['datec']; 

        ?>
    <div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-4">


  <div id="myCarousel" class="carousel slide" style="max-width: 300px" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php if(!empty($img)){ ?>
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li> <?php } ?>

      <?php if(!empty($img1)){ ?>
      <li data-target="#myCarousel" data-slide-to="1"></li> <?php } ?>

      <?php if(!empty($img2)){ ?>
      <li data-target="#myCarousel" data-slide-to="2" ></li> <?php } ?>

      <?php if(!empty($img3)){ ?>
      <li data-target="#myCarousel" data-slide-to="3" ></li> <?php } ?>

      <?php if(!empty($img4)){ ?>
      <li data-target="#myCarousel" data-slide-to="4"></li> <?php } ?>

      <?php if(!empty($img5)){ ?>
      <li data-target="#myCarousel" data-slide-to="5"></li> <?php } ?>


    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
            <?php if(!empty($img)){ ?>
      <div class="item active">
        <img src="images/sell/<?php echo $img ?>" alt="Los Angeles" style="width:100%;">
      </div> <?php } ?>

            <?php if(!empty($img1)){ ?>
      <div class="item">
        <img src="images/sell/<?php echo $img1 ?>" alt="" style="width:100%;">
      </div> <?php } ?>

            <?php if(!empty($img2)){ ?>
      <div class="item">
        <img src="images/sell/<?php echo $img2 ?>" alt="" style="width:100%;">
      </div> <?php } ?>
      
            <?php if(!empty($img3)){ ?>
      <div class="item">
        <img src="images/sell/<?php echo $img3 ?>" alt="" style="width:100%;">
      </div> <?php } ?>
      
            <?php if(!empty($img4)){ ?>
      <div class="item">
        <img src="images/sell/<?php echo $img4 ?>" alt="" style="width:100%;">
      </div> <?php } ?>

            <?php if(!empty($img5)){ ?>
      <div class="item">
        <img src="images/sell/<?php echo $img5 ?>" alt="" style="width:100%;">
      </div> <?php } ?>




    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



        </div>
        <div class="col-md-8" style="font-size: 18px">

          <table class="table table-hover"> 
            <tbody>
              
              <tr><td>
           Product Name: 
              </td><td>
            <?php echo $name ?>
              </td></tr> 
              <tr><td>

           <br>
            Price: 
              </td><td>Rs. 
             <?php echo number_format($price) ?>/-
              </td></tr> 
              <tr><td>

           <br>
            Description: 
              </td><td>
             <?php echo $desp ?>
              </td></tr> 
              <tr><td>

            <br>
           Company Name: 
              </td><td>
            <?php echo $cname ?> 
           <br>
              </td></tr> 
              <tr><td>


           Company Address:  
              </td><td>

                <?php echo $caddress ?> 
                  </td></tr> 
              <tr><td>


           Company Email: 
              </td><td>
            <?php echo $cemail ?> 
           <br>
              </td></tr> 
              <tr><td>

           Company Phone: 
              </td><td>
            <?php echo $cphone ?> 
           <br>

              </td></tr> 
              <tr><td>

           
           Company Website:
              </td><td>
             <?php echo $cwebsite ?> 
           <br>
              </td>
            </tr> 
          </tbody>
        </table>

           
        </div>
      </div>




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
              <a class="btn btn-info" href="sell.php"> New Product Selling Form </a>
          </div>
          <h3>My Kisan Selling Forms:</h3>
          



<table id="datatable1" class="table table-striped table-bordered" >    

  <thead>
      <th>
       Form ID
     </th>
      <th>
       Company Name
     </th>

     <th>
       Product Name 
     </th>
     <th>
       Product Image 
     </th>

     <th>
       Buyers 
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

      $rows =mysqli_query($con,"SELECT * FROM sell WHERE memberid=$memberid LIMIT 100" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $formid = $row['id']; 
        $cname = $row['cname']; 
        $name = $row['name']; 
        $img = $row['img']; 
        $datec = $row['datec']; 


        ?>
       

          <tr>
            <td>
              <?php echo $formid ?>
            </td>
            <td>
              <?php echo $cname ?>
            </td>

            <td>
              <?php echo $name ?>
            </td>
            <td>
              <img style="height:50px; " src="images/sell/<?php echo $img ?>" class="" ?> 
            </td>
            <td>

                <?php 

          $rowsx =mysqli_query($con,"SELECT id FROM buyer where pid=$formid" ) or die(mysqli_error($con));
          
            $citems = mysqli_num_rows ( $rowsx );
            if(!empty($citems)){
             ?>

             <a href="orders.php?id=<?php echo $formid ?>" target="blank" class="btn btn-info">
              View <?php echo $citems ?> Orders </a>

            <?php } ?>

            </td>
            <td>
              <?php echo $datec ?>

            </td>

        


            <td>

              <div class="btn-group">

                <form action="editsell.php" method="POST">
                
                <a class="btn btn-success" href="?id=<?php echo $formid ?>"> <i class="fa fa-eye"></i>View</a>
                <button type="submit" class="btn btn-default" name="id" value="<?php echo $formid ?>" >Edit</button>
                <a class="btn btn-danger" href="?del=<?php echo $formid ?>"> <i class="fa fa-trash"></i>Delete</a>
                
                </form>
                

              </div>
            </td>
          </tr>



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