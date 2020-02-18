<?php include 'include/connect.php'; ?>


 <?php
      if(isset($username)){

      $rows =mysqli_query($con,"SELECT * FROM users where username='$username' " ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $memberid = $row['id']; 
        $membername = $row['name']; 
        $memberemail = $row['email'];

        } 

    }

        ?>


    <?php
      if(isset($_GET['addcart'])){
        $msg="Unsuccessful" ;
        
        if($memberid==0) {
            header('location:login.php');
            
            
        }else{



        $pid=$_GET['addcart'];
        $status='cart';
        if(!empty($_GET['qty'])) $qty=$_GET['qty']; else  $qty='1';


        $rows =mysqli_query($con,"SELECT id,qty FROM orders where pid='$pid' AND status='$status' AND actid='$memberid'" ) or die(mysqli_error($con));
        $n=0;

        while($row=mysqli_fetch_array($rows)){

          $eid = $row['id']; 
          $eqty = $row['qty']; 

          $qty=$eqty+1;


          $sql = "UPDATE orders SET `qty` = '$qty' WHERE `id` =$eid";
          mysqli_query($con, $sql) ;


      }

      if(empty($eid)){
    
    $data=mysqli_query($con,"INSERT INTO orders (actid,pid,status,qty)VALUES ('$memberid','$pid','$status','$qty')")or die( mysqli_error($con) );

    }
        ($msg=mysqli_error($con));
        if(empty($msg))  $msg="Added To Cart";
      

}
}


?>


	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

