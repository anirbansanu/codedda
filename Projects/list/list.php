<?php
session_start();
ob_start();
if(!isset($_SESSION['user_mail']))
{
  header('location:../../User/sign_in/index.php?error=Error : TO use this plz sign in');
}
?>
<?php 
  require_once '../../submit/project/read.php';
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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="minimize">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="close" >
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th>
                          Project Type
                      </th>
                      <th style="width: 8%" class="text-center">
                          Privacy
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  for($i=0;$i<$c;$i++)
                  {  
                      //echo 'user_name : '.$arr[$i]['user_name']." </br>";
                      //echo 'group_name : '.$arr[$i]['group_name']." </br>";
                      //echo 'project_name : '.$arr[$i]['project_name']." </br>";
                      //echo 'project_type : '.$arr[$i]['project_type']." </br>";
                      //echo 'project_description : '.$arr[$i]['project_description']." </br></br>";
                    if($arr[$i]['project_privacy']=="public" or $arr[$i]['project_privacy']=="Public")
                        $color="badge-success";
                    elseif($arr[$i]['project_privacy']=="protected" or $arr[$i]['project_privacy']=="Protected")
                        $color="badge-warning";
                    else
                        $color="badge-danger";
                    
                    
                  echo '<tr>
                      <td>
                      '.($i+1).'
                      </td>
                      <td>
                          <a>
                          '.$arr[$i]['project_name'].'
                          </a>
                          <br/>
                          <small>
                            '.$arr[$i]['group_create_date'].'
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">';
                          $project_members_details=$project->getMembers($arr[$i]['id']);
                          $number_of_members=count($project_members_details);
                          if($number_of_members!=0)
                          {
                            for($j=0;$j<$number_of_members;$j++)
                            {
                                echo '
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" data-toggle="tooltip" title="'.$project_members_details[$j]["user_name"].'" src="../../dist/img/avatar.png">
                                </li>';
                            }
                          }
                              
                          echo '</ul>
                      </td>
                      <td class="project_progress">
                          
                          '.$arr[$i]['project_type'].'
                          
                          
                      </td>
                      <td class="project-state">
                          <span class="badge '.$color.'">'.$arr[$i]['project_privacy'].'</span>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="../details/details.php?group='.$arr[$i]['id'].'" data-toggle="tooltip" title="View Project">
                              <i class="fas fa-folder">
                              </i>
                              <!---View---->
                          </a>
                          <a class="btn btn-info btn-sm" href="../update/update.php?update='.$arr[$i]['id'].'" data-toggle="tooltip" title="Edit Project">
                              <i class="fas fa-pencil-alt">
                              </i>
                              <!---Edit--->
                          </a>
                          <a class="btn btn-danger btn-sm" href="#" data-toggle="tooltip" title="Remove Project">
                              <i class="fas fa-trash">
                              </i>
                              <!---Delete--->
                          </a>
                      </td>
                  </tr>';
                }
                ?>
                  
                  
                  
                 
                  
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
