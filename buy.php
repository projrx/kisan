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


 
  if(isset($_POST['submit'])){
    $msg="Unsuccessful" ;

    $name=$_POST['name'];
    $desp1=$_POST['desp'];
    $desp = str_replace("'", "''", $desp1);       


  $image[0]='';
  $image[1]='';
  
  for ($n=0;$n<2;$n++) { 

  if(!empty($img = $_POST['img'.$n])) { 
   $img = $_POST['img'.$n]; 

  if (strpos($img, 'data:image/jpeg;base64,') === 0) {
      $img = str_replace('data:image/jpeg;base64,', '', $img); $ext = '.jpg';  }
  if (strpos($img, 'data:image/png;base64,') === 0) {
      $img = str_replace('data:image/png;base64,', '', $img);   $ext = '.png'; }
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $image[$n] = md5(uniqid()).'1.png';
  $file = 'images/buy/'.$image[$n];
  if (file_put_contents($file, $data)) $msg='Succesful';
  }
}


   $data=mysqli_query($con,"INSERT INTO buy (name,desp,memberid,membername,img1,img2)VALUES ('$name','$desp','$memberid','$membername','$image[0]','$image[1]')")or die( mysqli_error($con) );

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

			<div class="content-wrap">



    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

            
      <form method="post" action="">
        <h2 class="color"> Product Buy Form</h2>
        <input required="" type="text" name="name" placeholder="Product Name" class="form-control">
        <br>
        <br>

        <textarea class="form-control" name="desp" placeholder="Product Description" ></textarea>
        <br>
        <br>

        <span style="font-size: 16px">Upload 2 Optional Images for Product:</span>
        <br>
        <br>
        <div class="row">
        <div class="col-md-6">
        <input id="inp_file0" type="file" class="form-control">
        <input id="inp_img0" name="img0" type="hidden" value="">
        </div>
        <div class="col-md-6">

        <input id="inp_file1" type="file" class="form-control">
        <input id="inp_img1" name="img1" type="hidden" value="">
          </div>
        </div>

        <br>
        <br>
        <div class="text-center">
        <input id="bt_save" type="submit" class="btn-info btn" value="Submit" name="submit">
        </div>
      </form>



    </div>
  </div>
		
<br><br>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
	
			<?php 	include 'include/footer.php'; ?>

			
	</div><!-- #wrapper end -->



 <?php for ($n=0;$n<2;$n++) { ?>
<script>
   function fileChange(e) { 
     document.getElementById('inp_img<?php echo $n; ?>').value = '';
     var file = e.target.files[0];
      if (file.type == "image/jpeg" || file.type == "image/png") {         var reader = new FileReader();  
        reader.onload = function(readerEvent) {
              var image = new Image();
           image.onload = function(imageEvent) {    
              var max_size = 600;
              var w = image.width;
              var h = image.height;             
              if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
              } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }             
              var canvas = document.createElement('canvas');
              canvas.width = w;
              canvas.height = h;
              canvas.getContext('2d').drawImage(image, 0, 0, w, h);                 
              if (file.type == "image/jpeg") {
                 var dataURL = canvas.toDataURL("image/jpeg", 1.0);
              } else {
                 var dataURL = canvas.toDataURL("image/png");   
              }
              document.getElementById('inp_img<?php echo $n; ?>').value = dataURL;  }
           image.src = readerEvent.target.result;  }
        reader.readAsDataURL(file);} else {
        document.getElementById('inp_file<?php echo $n; ?>').value = ''; 
        alert('Please only select images in JPG- or PNG-format.');  } }
  document.getElementById('inp_file<?php echo $n; ?>').addEventListener('change', fileChange, false);      
</script>

<?php } ?>
 


</body>
</html>