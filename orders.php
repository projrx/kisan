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




<?php if(!empty($_GET['oid'])){ ?>

  <?php $oid=$_GET['oid']; ?>

   <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM orders where id=$oid " ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $actid = $row['actid']; 
        $pid = $row['pid']; 
        $qty = $row['qty'];

    $bfirstname = $row['bfname'];
    $blastname = $row['blname'];
    $bpostalcode = $row['bpostal'];
    $baddress1 = $row['baddress1'];
    $baddress2 = $row['baddress2'];
    $bcity = $row['bcity'];
    $bcountry = $row['bcountry'];
    $bphone = $row['bmobile'];
    $bemail = $row['bemail'];
    $sfirstname = $row['sfname'];
    $slastname = $row['slname'];
    $spostalcode = $row['spostal'];
    $saddress1 = $row['saddress1'];
    $saddress2 = $row['saddress2'];
    $scity = $row['scity'];
    $scountry = $row['scountry'];
    $sphone = $row['smobile'];
    $semail = $row['semail'];
    $inst = $row['inst'];
     

        $datec = $row['datec']; 
        ?>


   <?php
      $n=8;

      $rowsx =mysqli_query($con,"SELECT * FROM sell where id=$pid " ) or die(mysqli_error($con));

      while($rowx=mysqli_fetch_array($rowsx)){

        $name = $rowx['name']; 
        $price = $rowx['price']; 
        $cname = $rowx['cname']; 
        $caddress = $rowx['caddress']; 
        $cemail = $rowx['cemail']; 
        $img = $rowx['img']; 
        $datec = $rowx['datec']; 
      }
        ?>
    <div class="container">
    <br>
    <h3>Product Information:</h3>
    <br>
    <div class="row">
        <div class="col-md-4">

<img src="images/sell/<?php echo $img ?>" style="height: 200px">



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

            Price: 
              </td><td>Rs. 
             <?php echo number_format($price) ?>/-
              </td></tr> 
           

              <tr><td>

           Company Name: 
              </td><td>
            <?php echo $cname ?> 
              </td></tr> 
            
              <tr><td>


           Company Email: 
              </td><td>
            <?php echo $cemail ?> 
              </td></tr> 
              
          </tbody>
        </table>

           
        </div>
      </div>




</div>


    <br>
    <hr>

   <?php
      $n=8;

      $rowsx =mysqli_query($con,"SELECT * FROM users where id=$actid " ) or die(mysqli_error($con));

      while($rowx=mysqli_fetch_array($rowsx)){

        $id = $rowx['id']; 
        $name = $rowx['name']; 
        $username = $rowx['username']; 
        $email = $rowx['email']; 
        $phone = $rowx['phone']; 
        $address = $rowx['address']; 
        $area = $rowx['area']; 
        $city = $rowx['city']; 
        $desp = $rowx['desp']; 
        $img = $rowx['img']; 

        $datec = $rowx['datec'];

      }
        ?>
    <div class="container">
    <br>
    <h3>Buyer Information:</h3>
    <br>
    <div class="row">
        <div class="col-md-4">

<img src="images/users/<?php echo $img ?>" style="height: 200px">



        </div>
        <div class="col-md-8" style="font-size: 18px">

          <table class="table table-hover"> 
            <tbody>
              
              <tr><td>
           Name: 
              </td><td>
            <?php echo $name ?>
              </td></tr> 

              <tr><td>

            Email: 
              </td><td> 
             <?php echo ($email) ?>
              </td></tr> 
           

              <tr><td>

           Phone: 
              </td><td>
            <?php echo $phone ?> 
              </td></tr> 
            
              <tr><td>


           City: 
              </td><td>
            <?php echo $city ?> 
              </td></tr> 
              
          </tbody>
        </table>

           
        </div>
      </div>

<br>
    <h3>Order Information:</h3>
    <br>


<div class="section row " style="padding: 36px 60px 1px 60px;">



<div class="col-md-6"> 


    
<h2>Billing Address</h2>
<br><br>

<strong>
    Name:
    </strong>
<?php if(!empty($bfirstname)) echo $bfirstname ; ?> -

<?php if(!empty($blastname)) echo $blastname ; ?>
    <br><br>
   
<strong>
    Address:
    </strong> 

<?php if(!empty($baddress1)) echo $baddress1 ; ?> ,

<?php if(!empty($baddress)) echo $baddress2 ; ?>
<br>
<?php if(!empty($bcountry)) { echo $bcountry ; }?>

<?php if(!empty($bcity)) {  echo $bcity ; }?> 
    
<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>
     <br><br>
<strong>
Contact:    </strong>
    <br>
<?php if(!empty($bphone)) echo $bphone ; ?>
    <br>
<?php if(!empty($bemail)) echo $bemail ; ?>

<hr>
<br>
<h2> Special Instruction: </h2> <p> <?php echo $inst ?> </p>
<br>
<br>

</div>




<div class="col-md-6"> 

<h2>Shipping Address</h2>
<br><br>
 
<strong>
    Name:
    </strong> 
<?php if(!empty($sfirstname)) echo $sfirstname ; ?>

<?php if(!empty($slastname)) echo $slastname ; ?>
 
    <br>
    <br>
    
<strong>
    Address:
    </strong> 
   
<?php if(!empty($saddress1)) echo $saddress1 ; ?>

<?php if(!empty($saddress2)) echo $saddress2 ; ?>
<br>
<?php if(!empty($scountry)) { echo $scountry ; }?>


<?php if(!empty($scity)) {  echo $scity ; } ?>

<?php if(!empty($spostalcode)) echo $spostalcode ; ?>


  <br>
  <br>
   
<strong>
    Contact:
    </strong> 
   
<br>
<?php if(!empty($sphone)) echo $sphone ; ?>
    <br>
    <?php if(!empty($semail)) echo $semail ; ?>   

<br>
<hr>


</div>


<br>              
</div> 



</div>


    <br>
    <hr>
    <br>
<?php } if(empty($actid)) echo 'Not Found'; } ?>



  
<?php if(!empty($_GET['id'])){ ?>

  <?php $pid=$_GET['id']; ?>


      <br>
      <div class="row" style="margin-right: 0px">

        <div class="col-md-1">
        </div>


        <div class="col-md-10">

          <h3>Kisan Selling Orders:</h3>
          



<table id="datatable1" class="table table-striped table-bordered" >    

  <thead>
      <th>
       Order ID
     </th>

     <th>
       Buyer Name 
     </th>

     <th>
       Quantity
     </th>

     <th>
       Shipping Address 
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

      $rows =mysqli_query($con,"SELECT * FROM buyer WHERE pid=$pid LIMIT 100" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $buyid = $row['id']; 
        $bid = $row['actid']; 
        $oid = $row['oid']; 
        $datec = $row['datec']; 


        ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $oid ?>
            </td>
            <td>
                 <?php
      $rowsx =mysqli_query($con,"SELECT * FROM users WHERE id=$bid LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
       echo $bname = $rowx['name']; 
        $bphone = $rowx['phone']; 
      } ?>
            </td>

            <td>
                <?php
      $rowsx =mysqli_query($con,"SELECT * FROM orders WHERE id=$oid LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
       echo $bty = $rowx['qty']; 
        $bship = $rowx['saddress2']; 
      } ?>


            </td>
            <td>
              <?php echo $bship ?>
            </td>
           

            <td>
              <?php echo $datec ?>

            </td>

        


            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?oid=<?php echo $oid ?>"> <i class="fa fa-eye"></i>View</a>
                <a class="btn btn-danger" href="?del=<?php echo $oid ?>"> <i class="fa fa-trash"></i>Delete</a>
                

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
<?php } ?>



		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->




</body>
</html>