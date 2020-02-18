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
	<title>Checkout | APKI Party</title>
	<link rel="new stylesheet" href="custom.css" type="text/css" />


	<style type="text/css">
		.myform{
			width: 350px;
			margin-bottom: 20px;
		}
	</style>


<!-- update Address  -->

<?php 
  if (isset($_POST['submitaddress'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $shipping_firstname = $_POST['shipping_firstname'];
    $shipping_lastname = $_POST['shipping_lastname'];
    $shipping_address1 = $_POST['shipping_address1'];
    $shipping_address2 = $_POST['shipping_address2'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_postalcode = $_POST['shipping_postalcode'];
    $shipping_phone = $_POST['shipping_phone'];
    $shipping_email = $_POST['shipping_email'];
    $status="cart";
    
    $desp1 = $_POST['inst'];
    $desp = str_replace("'", "", $desp1);       //Replace String with nothing
    
      
      $sql = "UPDATE `orders` SET `bfname`='$firstname',`blname`='$lastname',`bpostal`='$postalcode',`baddress1`='$address1',`baddress2`='$address2',`bcity`='$city',`bmobile`='$phone',`bemail`='$email',`sfname`='$shipping_firstname',`slname`='$shipping_lastname',`spostal`='$shipping_postalcode',`saddress1`='$shipping_address1',`saddress2`='$shipping_address2',`scity`='$shipping_city',`smobile`='$shipping_phone',`semail`='$shipping_email',`inst`='$desp',`status`='$status' WHERE status='cart' AND actid='$memberid' "  ;

    mysqli_query($con, $sql)or die(mysqli_error($con));
    
    echo $msg= "Update Successful";
      
      header ("location:confirm.php");


    
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
     

      

                    <div class="features text-center">
                        
<form action="" method="post">
                        <div class="section row text-center" style="padding: 36px 60px 1px 60px;">
                          
                       

 <div class="col-md-6"> 
                              
<h2>Billing Address</h2>
                            <br><br>
     
         
      <div class="col-md-6">     

   First Name:
   <input type="text" value="<?php if(!empty($bfirstname)) echo $bfirstname ; ?>" class="form-control myform" id="fname" name="firstname">
    
     </div>
    <div class="col-md-6"> 

   Last Name:
   <input type="text" value="<?php if(!empty($blastname)) echo $blastname ; ?>" class="form-control myform" id="lname" name="lastname">
             
              </div>
    
    <div class="col-md-6"> 
    Address Line 1:
   <input type="text" value="<?php if(!empty($baddress1)) echo $baddress1 ; ?>" class="form-control myform" id="address1" name="address1">
        
     </div>
     <div class="col-md-6"> 

        Address Line 2:
   <input type="text" value="<?php if(!empty($baddress2)) echo $baddress2 ; ?>" class="form-control myform" id="address2" name="address2">
   
     </div>
     
     
     <div class="col-md-8"> 
    City:
         <select style="border:solid 1px;" class="form-control myform" id="city" name="city">
             <?php if(!empty($bcity)) { ?><option value="<?php echo $bcity ;?>"><?php echo $bcity ;?></option><?php } ?>

         <!-- get single row data from database -->

<?php

$rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    
    $city = $row['city'];
    
?>


             <option value="<?php echo $city ;?>"><?php echo $city ;?></option>
             
         <?php } ?>
         </select>
   
   
     </div>
     
     <div class="col-md-4"> 
    Postal Code:
        <input type="text" value="<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>" class="form-control myform" id="postal" name="postalcode">
   
     </div>
   
       <div class="col-md-6">     

   Phone:
   <input type="text" value="<?php if(!empty($bphone)) echo $bphone ; ?>" class="form-control myform" id="phone" name="phone">
    
     </div>
    <div class="col-md-6"> 

   Email:
   <input type="text" value="<?php if(!empty($bemail)) echo $bemail ; ?>" class="form-control myform" id="email" name="email">
             
              </div>
     
     <br>
     <input type="checkbox" id="toshipping_checkbox">
   <em>Check this box if Shipping Address and Billing Address are the same.</em>
   
</div>
   
    <div class="col-md-6"> 
                              
<h2>Shipping Address</h2>
                            <br><br>
     
         
      <div class="col-md-6">     

   First Name:
   <input type="text" value="<?php if(!empty($sfirstname)) echo $sfirstname ; ?>" class="form-control myform" id="shipping_fname" name="shipping_firstname">
    
     </div>
    <div class="col-md-6"> 

   Last Name:
   <input type="text" value="<?php if(!empty($slastname)) echo $slastname ; ?>" class="form-control myform" id="shipping_lname" name="shipping_lastname">
             
              </div>
    
    <div class="col-md-6"> 
    Address Line 1:
   <input type="text" value="<?php if(!empty($saddress1)) echo $saddress1 ; ?>" class="form-control myform" id="shipping_address1" name="shipping_address1">
        
     </div>
     <div class="col-md-6"> 

        Address Line 2:
   <input type="text" value="<?php if(!empty($saddress2)) echo $saddress2 ; ?>" class="form-control myform" id="shipping_address2" name="shipping_address2">
   
     </div>
     
     
     <div class="col-md-8"> 
    City:
         <select style="border:solid 1px;" class="form-control myform" id="shipping_city" name="shipping_city">
             <?php if(!empty($scity)) { ?><option value="<?php echo $scity ;?>"><?php echo $scity ;?></option><?php } ?>
         <!-- get single row data from database -->

<?php

$rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    
    $city = $row['city'];
    
?>


             <option value="<?php echo $city ;?>"><?php echo $city ;?></option>
             
         <?php } ?>
         </select>
   
   
     </div>
     
     <div class="col-md-4"> 
    Postal Code:
        <input type="text" value="<?php if(!empty($spostalcode)) echo $spostalcode ; ?>" class="form-control myform" id="shipping_postal" name="shipping_postalcode">
   
     </div>
   
       <div class="col-md-6">     

   Phone:
   <input type="text" value="<?php if(!empty($sphone)) echo $sphone ; ?>" class="form-control myform" id="shipping_phone" name="shipping_phone">
    
     </div>
    <div class="col-md-6"> 

   Email:
   <input type="text" value="<?php if(!empty($semail)) echo $semail ; ?>" class="form-control myform" id="shipping_email" name="shipping_email">
             
              </div>
     
     
    </div>
    
    
   
                        </div>
                        
                        
    <div class="row" style="padding-bottom:25px">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            
            <h3>Special Instructions: </h3>
            
            <textarea class="form-control myform" name="inst" rows="6"><?php if(!empty($inst)) echo $inst ; ?></textarea>


        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
            <br><br><br><br><br>
            <button class="btn btn-info" name="submitaddress">Submit <i class="fa fa-arrow-right"></i> </button>
        </div>
    </div>
                            
                            </form>  
                    </div>
                    
                </div>

          
            
            
            
            
            
           
            
            

    <br><br>


</div>



	</div><!-- /container -->
	


		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->
                   <script>        
                       $("#toshipping_checkbox").on("click",function(){
    var ship = $(this).is(":checked");
    $("[id^='shipping_']").each(function(){
      var tmpID = this.id.split('shipping_')[1];
      $(this).val(ship?$("#"+tmpID).val():"");
    });
});        </script>         
           
</body>
</html>