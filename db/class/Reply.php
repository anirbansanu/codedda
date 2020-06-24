<?php
 
 require_once('../../class/Connection.php');
 
 class Reply extends Connection 
 {
	 public function connClose()
	{
		$stmt=0;
		parent::close();
	}
	public function sendReply($passid,$passSenderName,$passSenderMail,$body)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("INSERT INTO `reply` (`sender`, `sender_mail`, `replyId`, `body`) VALUES (:sender,:senderMail,:replyId,:body)");
			   $stmt->bindParam(':body',$body);
			   $stmt->bindParam(':replyId',$passid);
			   $stmt->bindParam(':sender',$passSenderName);
			   $stmt->bindParam(':senderMail',$passSenderMail);
			   $stmt->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Reply.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
	}
	public function fetchAllReplyMail($passId)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `reply` WHERE `replyId`=:id ");
			  $stmt->bindParam(':id',$passId);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if($Row==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  return $stmt->fetchAll();
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Reply.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function delReplyMail($passId,$passFetcherMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("DELETE FROM `reply` WHERE `sender_mail`=:s AND `id`=:id ");
			   $stmt->bindParam(':s',$passFetcherMail);
			   $stmt->bindParam(':id',$passId);
			   $stmt->execute();
			   $countRow=$stmt->rowCount();
			   $this->connClose();
				if($countRow>0)
				{
				  return 1;
				}
				else
				{
				  return 0;
				}
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		     }
		
		 $this->connClose();	
		}
		
	}
	
	
 }
 $replyObj=new Reply();
 
?>