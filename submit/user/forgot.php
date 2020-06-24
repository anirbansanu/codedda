<?php
	if(isset($_SESSION['user_mail']))
	{
		header('location:../../Home/Index/index.php?success=Success : you already loged in');
	}
	if(isset($_POST['checkbtn']))
  	{
		//session_start();
		//ob_start();
		require_once('../../db/class/User.php');
		$set=$user->checkMail($_POST['mail']);
		if($set==0)
		{
			//echo $_POST['mail']." ".$_POST['pass'];
			 header('location:../../User/forgot_pass/index.php?error=Error : incorrect mailid&mail='.$_POST['mail'].'  ');
		}
		else
		{
			//echo $_POST['mail']." ".$_POST['pass'];
			  //$_SESSION['user_id']=$get['id'];
			  //$_SESSION['user_name']=$get['name'];
			  //$_SESSION['user_mail']=$get['mail'];
			  header('Location:../../User/forgot_pass/recover_pass.php?success='.$set['user_mail'].' : Password reset&mail='.$set['user_mail'].' ');
		}
	  	
	  	
  }
  elseif(isset($_POST['resetpassbtn']))
  {
        require_once('../../db/class/User.php');
        $set=$user->setPass($_POST['mail'],$_POST['pass']);
        if($set==0)
        {
        //echo $_POST['mail']." ".$_POST['pass'];
         header('location:../../User/sign_in/index.php?error=Error : incorrect mailid ');
        }
        else
        {
        //echo $_POST['mail']." ".$_POST['pass'];
          //$_SESSION['user_id']=$get['id'];
          //$_SESSION['user_name']=$get['name'];
          //$_SESSION['user_mail']=$get['mail'];
          header('Location:../../User/forgot_pass/recover_pass.php?success=Success : Password reset ');
        }
  }
  else
  {
	  header('location:../../User/sign_in/index.php?error=Error : fill the form first');
  }
?>