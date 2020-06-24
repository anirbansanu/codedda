<?php
session_start();
ob_start();
if(!isset($_SESSION['user_mail']))
{
  header('location:../../User/sign_in/index.php?error=Error : TO use this plz sign in');
}
?>

<?php
if(!isset($_GET['update']))
{
  header('location:../../Projects/list/list.php');
}
  require_once('../../submit/project/edit.php'); 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Codedda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--- select2.css --->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.css">

  </head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <!-- Navbar -->
  <?php include('../../include/menus/header_nav.php'); ?>
  <!-- /.navbar -->

  <!-- side_menus -->
  <?php include('../../include/menus/side_menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
            <?php include('project_edit_card.php'); ?>
        </div>
        <div class="col-md-6">
            <?php include('project_group_card.php'); ?>
            <?php include('project_files_card.php'); ?>
            <?php include('members.php'); ?>

        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update" class="btn btn-success float-right">
        </div>
      </div>
	  
	  <!--- alert box --->
	  <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between bg-blue">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php include('../../include/footer/footer.php');  ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!--- select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


   <script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
   })
   </script>
   <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>


<script>
$(document).ready(function() {

	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $("#files"); //Fields wrapper
	var add_button      = $("#addfile"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			var txt1 = '<div class="form-group" ><label for="exampleInputFile">Project File '+x+'</label><div class="input-group" ><div class="custom-file"><input type="file" name="img'+(x)+'" class="custom-file-input"  id="exampleInputFile"><label class="custom-file-label" for="exampleInputFile">Choose file</label></div><div class="input-group-append"><span class="input-group-text" id="">Upload</span></div><a class="btn btn-danger btn-sm remove_field" href="#"> <i class="fas fa-trash" style="line-height:2"></i></a></div></div>';
			$(wrapper).append(txt1); //add input box
		}bsCustomFileInput.init();
		console.log("work on");
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		
		e.preventDefault(); $(this).parent().parent('div').remove(); x--;
	})
});
</script>

</body>
</html>
