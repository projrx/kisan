<?php include 'include/secure.php'; ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

  <?php include 'include/head2.php'; ?>


	<!-- Document Title
   ============================================= -->
   <title>View Members Registration Forms | APKI </title>
   <link rel="new stylesheet" href="custom.css" type="text/css" />

   <style type="text/css">
    .table th, .table td {
      padding: 0.75rem;
      vertical-align: middle;
    }

    button.dt-button, div.dt-button, a.dt-button {

      background: #177d36;
      padding: 10px 20px;
    color: #fff;
    border: 1px solid #f9b51b;
}


    .dt-button:hover {

      background: #0e6127 !important;
      padding: 10px 20px;
    color: #fff;
    border: 1px solid #f9b51b;
}

div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
    padding: 5px;
    min-width: 350px;
    border: 2px #057b29 solid;
}



  </style>


</head>

<body class="">


  <?php   include 'include/header.php'; ?>

	<!-- Document Wrapper
   ============================================= -->
   <div class="container">

		<!-- Header
      ============================================= -->




		<!-- Content
      ============================================= -->
      <section id="content">


        <?php if(!empty($_GET['search'])){ ?>

          <?php $limitres=$_GET['limitres']; ?>
          <div class="container">

            <br><br>
            <table id="example" class="display" cellspacing="0" width="100%">


              <thead>
                <th>
                 Reg. ID
               </th>
               <th>
                 Name
               </th>

               <th>
                 ID Card No. 
               </th>
               <th>
                Phone
              </th>
               <th>
                Tehsil
              </th>
               <th>
                Chak
              </th>
              <th style="width:;">
                Refer:
              </th>
              <th style="width:;">
                Date:
              </th>
              <th class="">
                View
              </th>              
            </thead>
              <tbody>

                <?php
                if(empty($limitres)) $limitres=100;

                $rows =mysqli_query($con,"SELECT * FROM member Limit $limitres" ) or die(mysqli_error($con));

                while($row=mysqli_fetch_array($rows)){

                  $id = $row['id']; 
                  $name = $row['name']; 
                  $fname = $row['fname']; 
                  $fname = $row['fname']; 
                  $datec = $row['datec']; 
                  $idcard = $row['idcard']; 
                  $phone = $row['phone']; 
                  $tehsil = $row['tehsil']; 
                  $chak = $row['chak']; 
                  $refname = $row['refname']; 
                  $reffname = $row['reffname']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <?php echo $id ?>
                      </td>
                      <td>
                        <?php echo $name.' '.$fname ?>
                      </td>

                      <td>
                        <?php echo $idcard ?>
                      </td>
                      <td>
                        <?php echo $phone ?>

                      </td>
                      <td>
                        <?php echo $tehsil ?>

                      </td>
                      <td>
                        <?php echo $chak ?>

                      </td>
                      <td>
                        <?php echo $refname.' ' .$reffname ?>

                      </td>
                      <td>
                        <?php echo $datec ?>

                      </td>




                      <td>

                        <div class="btn-group">

                          <a class="btn btn-success" href="viewregistration.php?id=<?php echo $id ?>"> <i class="fa fa-eye"></i>View</a>

                        </div>
                      </td>
                    </tr>

                  </form>

                <?php } ?>


              </tbody>
            </table>



          </div>
        </section>
      </div>

      <br>
      <hr>
      <br>
      <?php if(empty($name)) echo 'Not Found'; } ?>



      <div class="container">
        <section>
          <div class="row text-center">

            <h3>Search Forms </h3>
            <table class="table">
              <form action="" method="_GET">



                <tr>
                  <td> Limit Results to:</td> 
                  <td style="min-width: 200px"><input style="max-width: 100px" type="number" name="limitres" value="<?php if(!empty($limitres)) echo $limitres; ?>" class="form-control"> </td>
                  <td> Forms</td>
                  <td>
                    <button class="btn btn-info" name="search" value="ok"> Search </button>
                  </td>
                </tr>

              </form>


            </table>
          </div>
        </section>

      </div>

      <br>


      <script src="dt/jquery.min.js"></script>
      <script src="dt/jszip.min.js"></script>
      <script src="dt/pdfmake.min.js"></script>
      <script src="dt/vfs_fonts.js"></script>
      <script src="dt/jquery.dataTables.min.js"></script>
      <script src="dt/dataTables.buttons.min.js"></script>
      <script src="dt/buttons.flash.min.js"></script>
      <script src="dt/buttons.html5.min.js"></script>
      <script src="dt/buttons.print.min.js"></script>


      <script type="text/javascript">
        $(document).ready(function() {
          $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          } );
        } );
      </script>

 </div><!-- #wrapper end -->



	<!-- Footer
		============================================= -->

    <?php include 'include/footer2.php'; ?>



</body>
</html>