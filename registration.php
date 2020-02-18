
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <?php include 'include/head.php'; ?>
  <!-- Document Title
  ============================================= -->
  <title>Become a Member Registration  | APKI Party</title>
  <link rel="new stylesheet" href="custom.css" type="text/css" />

<?php 
  if(isset($_POST['updateid'])){

    $idcardchk=$_POST['idcard'];

          $rows =mysqli_query($con,"SELECT * FROM member where  idcard='$idcardchk'" ) or die(mysqli_error($con));
           $citems = mysqli_num_rows ( $rows );
           if(empty($citems)){

            


  $image[0]='';
  $image[1]='';
  $image[2]='';

  
  for ($n=0;$n<3;$n++) { 

  if(!empty($img = $_POST['img'.$n])) { 
   $img = $_POST['img'.$n]; 

  if (strpos($img, 'data:image/jpeg;base64,') === 0) {
      $img = str_replace('data:image/jpeg;base64,', '', $img); $ext = '.jpg';  }
  if (strpos($img, 'data:image/png;base64,') === 0) {
      $img = str_replace('data:image/png;base64,', '', $img);   $ext = '.png'; }
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $image[$n] = md5(uniqid()).'1.png';
  $file = 'images/forms/'.$image[$n];
  if (file_put_contents($file, $data)) $msg='Succesful';
  }
}
      
    $datec=date('Y-m-d');
    $data=mysqli_query($con,"INSERT INTO member 
    (`name`,`fname`,`dob`,`idcard`,`phone`,`address`,`tehsil`,`chak`,`datec`,`img`,`img1`,`img2`,`refname`,`reffname`) 
    VALUES 
    ( '".mysqli_real_escape_string($con,$_POST['name'])."' 
    , '".mysqli_real_escape_string($con,$_POST['fname'])."'
    , '".mysqli_real_escape_string($con,$_POST['dob'])."'
    , '".mysqli_real_escape_string($con,$_POST['idcard'])."'
    , '".mysqli_real_escape_string($con,$_POST['phone'])."'
    , '".mysqli_real_escape_string($con,$_POST['address'])."'
    , '".mysqli_real_escape_string($con,$_POST['tehsil'])."'
    , '".mysqli_real_escape_string($con,$_POST['chak'])."'
    , '".mysqli_real_escape_string($con,$datec)."'
    , '".mysqli_real_escape_string($con,$image[0])."'
    , '".mysqli_real_escape_string($con,$image[1])."'
    , '".mysqli_real_escape_string($con,$image[2])."'
    , '".mysqli_real_escape_string($con,$_POST['refname'])."'
    , '".mysqli_real_escape_string($con,$_POST['reffname'])."'

    )")or die( mysqli_error($con) );


      $rows =mysqli_query($con,"SELECT id FROM member ORDER BY id desc limit 1" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){
        $id = $row['id'];   }

      ($msg=mysqli_error($con));
      if(empty($msg)) header("location:registration.php?success=1&memberid=$id");

    }else{
      header("location:registration.php?already=1&success=1");
    }


  }
  ?>


  <style type="text/css">
    .table th, .table td {

    vertical-align: baseline;
}

  </style>


</head>

<body class="stretched">

  <!-- Document Wrapper
  ============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <?php   include 'include/header.php'; ?>


<?php if(empty($_GET['success'])){ ?>


    <!-- Content
    ============================================= -->
    <section id="content">

      <div class="content-wrap">

        <div class="container clearfix">


    <h3>Become a Member of APKI:</h3>
    <br>

    <table class="table table-hover">
     


      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td style="min-width:100px;">
               <label>Name (As on ID-Card):</label>
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" id="name" name="name" value="" required="" onchange="run();"> 
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
               <label>Father's Name:</label>
               
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="fname" value="" required="">  
            </td>

          </tr>

          <tr>
            <td> <label>Profile Image: </label> </td>
            <td>


        <input id="inp_file0" required="" type="file"  accept="image/*" class="form-control" required="">
        <input id="inp_img0" name="img0" type="hidden" value="">


            </td>


          </tr>


          <tr>
            <td style="min-width:100px;">
               <label>Date of Birth:</label>
               
            </td>
            <td>
              <input style="max-width: 200px;" type="date" class="form-control" name="dob" value="" required="">  
            </td>

          </tr>



          <tr>
            <td style="min-width:100px;">
               <label>ID Card No:</label>
               
            </td>
            <td>
              <input style="max-width: 400px;" type="number" class="form-control" name="idcard" value="" required=""> 
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
               <label>Mobile / Phone:</label>
               
            </td>
            <td>
              <input style="max-width: 400px;" type="number" class="form-control" name="phone" value="" required="">  
            </td>

          </tr>




          <tr>
            <td style="min-width:100px;">
               <label>Address:</label>
               
            </td>
            <td>
              <input style="max-width: 600px;" type="text" class="form-control" name="address" value="" required="">  
            </td>

          </tr>



          <tr>
            <td style="min-width:100px;">
               <label>Tehsil:</label>
               
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="tehsil" value="" required=""> 
            </td>

          </tr>


          <tr>
            <td style="min-width:100px;">
               <label>Chak:</label>
               
            </td>
            <td>
              <input style="max-width: 400px;" type="text" class="form-control" name="chak" value="" required=""> 
            </td>

          </tr>


          <tr>
            <td> <label>ID Card Front Image: </label> </td>
            <td>



        <input id="inp_file1" type="file" class="form-control" required=""  accept="image/*" >
        <input id="inp_img1" name="img1" type="hidden" value="">

            </td>


          </tr>

          <tr>
            <td> <label> ID Card Back Image: </label></td>
            <td>


        <input id="inp_file2" type="file" class="form-control" required=""  accept="image/*" >
        <input id="inp_img2" name="img2" type="hidden" value="">

            </td>

          </tr>



          <tr>
            <td> <label> Referance Member: </label></td>
            <td>
                <input type="checkbox" id="refcheck" onchange="ref();"> Refer
              <div id="refer" style="display:none" >
                  
              <input style="max-width: 400px;" type="text" class="form-control" name="refname" value="" placeholder="Name">
              <input style="max-width: 400px;" type="text" class="form-control" name="reffname" value="" placeholder="Father Name" >
              </div>
    
            </td>

          </tr>






          <tr style="background: none !important;"> <td colspan="2">
                <input type="checkbox" name="check" required="">
                <lablel> I ' <input style="border: none;width:auto;" class="" type="text" id="tname" name="tname" value="">' with my own well joining this party and from this date ' <?php echo date('d-m-Y'); ?> ' I will be Loyal and bound all party decisions, party policies, work for party to develop Pakistan. In case of miss conduct party can cancel my registration or I would face all legal procedure of Party.
                </label>
              </td>

          </tr>






          <tr>
            <td colspan="2">

              <div class="text-center">

                <button type="submit" name="updateid"  class="btn btn-info"> <i class="fa fa-plus"></i>Update</button>
              </div>
            </td>
          </tr>

        </form>
      </tbody>



    </table>



        </div>

      </div>

    </section><!-- #content end -->

  <?php } else if(!empty($_GET['already'])){  ?>


    <section>
      <div class="container">
        <div class="text-center">
          <h3>Registration Already Entered.</h3>
          


        <br><br>
        <a href="http://apkiparty.com/" class="btn btn-info">Back to Home</a>
      </div>
    </div>

    </section>

  <?php } else {  ?>


    <section>
      <div class="container">
        <div class="text-center">
          <h3>Registration successful.</h3>
          <label style="font-size: 18px;font-weight: 200">
          Welcome to All Pakistan Kisan Itehad.<br>
          ur member ship no is: <strong style="font-weight: 800"> <?php echo $_GET['memberid'] ?> </strong> .<br>
          Kindly contact Tehsil Office to get your Member ship card
        </label>

        <br><br>
        <a href="http://apkiparty.com/" class="btn btn-info">Back to Home</a>
      </div>
    </div>

    </section>

  <?php } ?>

    <!-- Footer
    ============================================= -->
  
      <?php   include 'include/footer.php'; ?>

      
  </div><!-- #wrapper end -->





 <?php for ($n=0;$n<3;$n++) { ?>
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
 




  <script type="text/javascript">
    
    function run() {
      x = document.getElementById('name').value;
      document.getElementById('tname').value=x;
    }

    function ref() {
      if(document.getElementById('refcheck').checked == true){
        document.getElementById('refer').style.display='block';
      }else{
              document.getElementById('refer').style.display='none';

      }
    }

  </script>



</body>
</html>