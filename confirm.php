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
	<title>Confirm | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />


<?php 


    if(isset($_POST['confirm'])){
      $msg="Unsuccessful" ;



		  	$rows =mysqli_query($con,"SELECT * FROM orders where status='cart' AND actid='$memberid'" ) or die(mysqli_error($con));
		  	$n=0;
		  	$stotal=0;

		  	while($row=mysqli_fetch_array($rows)){

		  	  $oid = $row['id']; 
		  	  $pid = $row['pid']; 
 
    $data=mysqli_query($con,"INSERT INTO buyer (oid,pid,actid)VALUES ('$oid','$pid','$memberid')")or die( mysqli_error($con) );

    }



      $sql = "UPDATE orders SET `status` = 'confirm' WHERE `actid` = '$memberid' AND status='cart' ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

      header ("location:done.php");
      

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



	<div class="container">
		<br>


<?php

$rows =mysqli_query($con,"SELECT * FROM orders WHERE actid='$memberid' AND status='cart' Limit 1 " ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    
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
    
    
    }

?>
          
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


</div>              
</div> 


    <br> 
        
      

		<div class="well well-small">


		  <h1>Shopping Cart</h1>

		<table class="table table-hover">

		  <thead>
		    <th  style="max-width: 200px;">Image</th>
		    <th>Product</th>
		    <th>Price</th>
		    <th>Quantity</th>

		    <th>Total</th>
		  </thead>
		  <tbody>
		  	<?php 

		  	$rows =mysqli_query($con,"SELECT * FROM orders where status='cart' AND actid='$memberid'" ) or die(mysqli_error($con));
		  	$n=0;
		  	$stotal=0;

		  	while($row=mysqli_fetch_array($rows)){

		  	  $oid = $row['id']; 
		  	  $pid = $row['pid']; 
		  	  $qty = $row['qty']; 


		  	  $rowsx =mysqli_query($con,"SELECT name,price,img FROM sell where id='$pid' " ) or die(mysqli_error($con));
		  	  while($rowx=mysqli_fetch_array($rowsx)){

		  	    $price = $rowx['price'];  
		  	    $proname = $rowx['name']; 
		  	    $img = $rowx['img']; 
		  	    $total = $qty*$price;
		  	    $stotal = $stotal+$total;
		  	  

		  	  ?>

		  <tr class="" style="">
		    <td class="">
		      <img style="height: 100px;width: 150px;" src="images/sell/<?php echo $img ?>">
		    </td>
		    <td class="product-details">
		      <div class="product-title"><?php echo $proname ?></div>

		    </td>
		    <td class="product-price"><?php echo number_format($price) ?></td>
		    <td class="product-quantity">
		    	
		    	<?php echo $qty ?>
		    </td>
		

		    <td class="product-line-price"><?php echo number_format($total) ?></td>
		  </tr>

		  <?php $n++; } } ?>
	
		  </tbody>
		 </table>	
		


		</div>
<center>
<?php if(!empty($sphone)) { ?>

    <br>
    <br>
       <form method="post" action="">
       <button class="btn btn-info" type="submit" name="confirm" >Confirm Order </button>  
        </form>  
      <?php } ?>
</center>





	</div><!-- /container -->
	


		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->

</body>
</html>