<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php include 'include/connect.php'; ?>

<?php


 
  if(isset($_POST['submit'])){
    $msg="Unsuccessful" ;

    $name=$_POST['name'];
    $email=$_POST['email'];

  for ($n=0;$n<2;$n++) { 

  $img = $_POST['img'.$n]; 
  if (strpos($img, 'data:image/jpeg;base64,') === 0) {
      $img = str_replace('data:image/jpeg;base64,', '', $img); $ext = '.jpg';  }
  if (strpos($img, 'data:image/png;base64,') === 0) {
      $img = str_replace('data:image/png;base64,', '', $img);   $ext = '.png'; }
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $image[$n] = md5(uniqid()).'1.png';
  $file = 'images/test/'.$image[$n];
  if (file_put_contents($file, $data)) $msg='Succesful';

}


   $data=mysqli_query($con,"INSERT INTO tests (name,email,img,img2)VALUES ('$name','$email','$image[0]','$image[1]')")or die( mysqli_error($con) );

}
                    
?>
 
 
<br>
<br>
<form method="post" action="">

  <input type="text" name="name" placeholder="Name">

  <input type="email" name="email" placeholder="Email">

  <input id="inp_file0" type="file">
  <input id="inp_img0" name="img0" type="hidden" value="">

  <input id="inp_file1" type="file">
  <input id="inp_img1" name="img1" type="hidden" value="">

  <input id="bt_save" type="submit" value="Save" name="submit">
</form>

<?php if(!empty($msg)) echo $msg; ?>
 
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