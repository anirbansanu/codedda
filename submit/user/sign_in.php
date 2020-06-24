<?php
	session_start();
	ob_start();
	if(isset($_SESSION['user_mail']))
	{
		header('location:../../Home/Index/index.php?success=Success : you already loged in');
	}
	if(isset($_POST['submitbtn']))
  	{
		
		require_once('../../db/class/User.php');
		$get=$user->getRow($_POST['mail'],$_POST['pass']);
		if($get==0)
		{
			//echo $_POST['mail']." ".$_POST['pass'];
			 header('location:../../User/sign_in/index.php?error=Error : incorrect mailid and password ');
		}
		else
		{
			//echo $_POST['mail']." ".$_POST['pass']." get[mail] : ";
			//print_r($get);
			  $_SESSION['user_id']=$get['id'];
			  $_SESSION['user_name']=$get['user_name'];
			  $_SESSION['user_mail']=$get['user_mail'];
			  //echo $_SESSION['user_mail'];
			  header('Location:../../Home/Index/index.php?success=Success : loged in');
		}
	  	
	  	
  	}
  	else
  	{
		session_unset(); 
		session_destroy(); 
	  header('location:../../User/sign_in/index.php?error=Error : fill the form first');
  	}
?>