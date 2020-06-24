<?php
  require_once('../../db/class/User.php');

  if(isset($_POST['submitbtn']))
  {
	  $details=array("name"=>$_POST['name'], "mail"=>$_POST['mail'], "pass"=>$_POST['pass'], "gen"=>$_POST['gender']);

		if($user->setRow($details))
	  	{
			  header('location:../../User/sign_in/index.php?success=Registration Successful, Please Login');
	  	}
	  	else
	  	{
			  header('location:../../User/sign_up/index.php?error=Registration Failed, Please Try Again');
	  	}

	  
  }
  else
  {
	header('location:../../User/sign_up/index.php?error=Please Try Again');
  }
?>