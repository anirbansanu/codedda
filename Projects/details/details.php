<?php
session_start();
ob_start();
if(!isset($_SESSION['user_mail']))
{
  header('location:../../User/sign_in/index.php?error=Error : TO use this plz sign in');
}
?>
<?php 
  require_once '../../submit/project/details.php';
  //$project_details['group_name'];
  //$project_members_details[0]['user_gender'];
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
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $project_details['project_name']; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Privacy</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $project_details['project_privacy']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Members</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $number_of_members; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Created</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $project_details['group_create_date']; ?> <span>
                    </div>
                  </div>
                </div>
              </div>
              <?php include('./recent_activity.php'); ?>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i><?php echo $project_details['project_name']; ?></h3>
              <p class="text-muted"><?php echo $project_details['project_description']; ?></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Project Leader
                  <b class="d-block">Deveint Inc</b>
                </p>
                <p class="text-sm">Project Group
                  <b class="d-block"><?php echo $project_details['group_name']; ?></b>
                </p>
              </div>


              <h5 class="mt-5 text-muted">Group Members</h5>
              <ul class="list-unstyled">
                <?php
                for($i=0;$i<$number_of_members;$i++)
                {
                    echo '<li>
                      <a href="" class="btn-link text-secondary">
                        <i class="far fa-fw fa-user"></i> 
                        '.$project_members_details[$i]["user_name"].'
                      </a>
                    </li>';
                }
                ?>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Update</a>
                <a href="#" class="btn btn-sm btn-warning">View Details</a>
              </div>



              <h5 class="mt-5 text-muted">Project Files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="<?php echo $project_details['file_loc']; ?>" class="btn-link text-secondary"><i class="far fa-fw fa-file-archive"></i> <?php echo $project_details['file_name']; ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!---- Footer  ---->
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
</body>
</html>
