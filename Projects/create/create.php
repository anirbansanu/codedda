<?php
session_start();
ob_start();
if(!isset($_SESSION['user_mail']))
{
  header('location:../../User/sign_in/index.php?error=Error : TO use this plz sign in');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab</title>
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
            <h1>Create New Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="../../submit/project/index.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Project Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" name="project_name" id="ProjectName" class="form-control">
              </div>
			  <div class="col-md-14">
                <div class="form-group">
                  <label>Project Type</label>
                  <select name="project_type" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="None">Choose</option>
                    <option value="Programming">Programming</option>
                    <option value="Coding">Coding</option>
                    <option value="Scripting">Scripting</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Android">Android</option>
                    <option value="IOS">IOS</option>
                    <option value="Mac">Mac</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea name="project_description" id="inputDescription" class="form-control" rows="5"></textarea>
              </div>
			  
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select name="project_status" class="form-control custom-select">
                  <option  value="" selected disabled>Select one</option>
                  <option  value="Public">Public</option>
                  <option value="Protected">Protected</option>
                  <option value="Private">Private</option>
                </select>
              </div>
			  
			<div class="col-md-14">
				<div class="card card-outline card-success collapsed-card ">
					<div class="card-header bg-light">
						<h3 class="card-title" data-card-widget="collapse" style="cursor: pointer">Upload Files</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool bg-light" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
							<button type="button" class="btn btn-tool bg-light" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<!-- File Uploads Blocks --->
					<div class="card-body" id="files">
						<div class="form-group" >
							<label for="exampleInputFile">Project File</label>
								<div class="input-group" >
									<div class="custom-file">
										<input type="file" name="img1" class="custom-file-input"  id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
									<div class="input-group-append">
									<span class="input-group-text" id="">Upload</span>
									</div>
								</div>
						</div>
						
					</div>
				<!-- /.card-body -->
					<div class="card-footer clearfix">
					<button type="button" class="btn btn-outline-success float-right" id="addfile"><b><i class="fas fa-plus"></i> Add More</b></button>
					</div>
				</div>
				<!-- /.card -->
			</div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <?php include('../../group/create/create.php');  ?>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="create_project" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
	  <!---  --->
	  </form>
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

<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<!--- java Script add element --->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
   })
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