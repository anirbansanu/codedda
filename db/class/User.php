<?php

require_once('../../db/class/Connection.php');
require_once('../../db/interface/iUser.php');
  
  class User extends Connection implements iUser
  {
	public function connClose()
	{
		$stmt="";
		$user_access="";
		parent::close();
	}
	public function ifExits($userMail=NULL,$userId=NULL)
	{
		$checkconn=parent::dbCon();
		if($checkconn==1)
		{
			try
		    {
		       $user_access = $this->conn->prepare("SELECT `user_name`, `user_mail`, `user_gender` FROM `user` WHERE `user_mail`=:mail OR `id`=:id");
			   $user_access->bindParam(':mail',$userMail);
			   $user_access->bindParam(':id',$userId);
			   $user_access->execute();
			   $details=$user_access->fetch();
			   $check_mail_count=$user_access->rowCount();
			  
			   $this->connClose();
			   if($check_mail_count>0)
			   {
			     return $details;
			   }
			    else
				{
				  return 0;
				}
		    }
		     catch (PDOException $c) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$c->getCode().'] line no. '.$c->getLine());
				
		     }
		
		 $this->connClose();	
		}
	}
	public function setRow($user_details)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("INSERT INTO `user` (`user_name`,`user_pass`,`user_mail`,`user_gender`) VALUES (:name,:pass,:mail,:gen)");
			   $stmt->bindParam(':name',$user_details['name']);
			   $stmt->bindParam(':mail',$user_details['mail']);
			   $stmt->bindParam(':pass',$user_details['pass']);
			   $stmt->bindParam(':gen',$user_details['gen']);
			   $stmt->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
		
	}
	public function setPass($userMail,$userPass)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("UPDATE `mail-user` SET `user_pass`=:pass WHERE `user_mail`=:mail");
			   $stmt->bindParam(':mail',$userMail);
			   $stmt->bindParam(':pass',$userPass);
			   $stmt->execute();
			   $countRow=$stmt->rowCount();
			   $this->connClose();
				
				if($countRow==0)
				{
				  return 0;
				}
				else
				{
				  return 1;
				}
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
		
	}
	public function checkMail($userMail)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT `user_mail` FROM `user` WHERE `user_mail`=:e");
			  $stmt->bindParam(':e',$userMail);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if($Row==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $store=$stmt->fetch(); $this->connClose(); return $store; 
				}
		    } 
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function getRow($userMail,$userPass)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `user` WHERE `user_mail`=:e AND `user_pass`=:p");
			  $stmt->bindParam(':e',$userMail);
			  $stmt->bindParam(':p',$userPass);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if($Row==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $store=$stmt->fetch(); $this->connClose(); return $store; 
				}
		    } 
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function upRow($passId,$passValues)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("UPDATE `mail-user` SET :name,:email,:pass,:gen WHERE id=$passId");
			   $stmt->bindParam(':name',$passValues['name']);
			   $stmt->bindParam(':email',$passValues['email']);
			   $stmt->bindParam(':pass',$passValues['pass']);
			   $stmt->bindParam(':gen',$passValues['gen']);
			   $stmt->execute();
			   $countRow=$stmt->rowCount();
			   $this->connClose();
				
				if($countRow==0)
				{
				  return 0;
				}
				else
				{
				  return 1;
				}
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
	}
    public function delrow($userId,$userMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("DELETE FROM `user` WHERE `id`=:id AND `user_mail`=:mail");
			   $stmt->bindParam(':id',$userId);
			   $stmt->bindParam(':mail',$userMail);
			   $stmt->execute();
			   $countRow=$stmt->rowCount();
			   $this->connClose();
				
				if($countRow==0)
				{
				  return 0;
				}
				else
				{
				  return 1;
				}
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
	}
  }
  
  $user=new User();
  	//$get=$user->getRow('a@gmail.com','1234');
	//echo "<br>".$get;
?>