<?php

if(!isset($_SESSION['user_mail']))
{
  header('location:../../User/sign_in/index.php?error=Error : TO use this plz sign in');
}
?>
<?php 
require_once('../../db/class/Project.php');

if(isset($_GET['update']))
{
    $project_info=$project->getDetailsByAdmin($_SESSION['user_id'],$_GET['update']);
    $members=$project->getMembers($_GET['update']);
    //print_r($members);

}
else
{

}
?>