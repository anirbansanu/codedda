<?php
require_once('../../class/Connection.php');
require_once('../../interface/iSent.php');
class Sent extends Connection implements iSent
{
	public function connClose()
	{
		$stmt=null;
		parent::close();
	}
	public function sendMail($passMailInfo)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $sendstmt = $this->conn->prepare("INSERT INTO `sent` ( `sendermail`, `receivermail`, `receivername`, `subject`, `body`, `date`, `time`,`status`, `replyId`)  VALUES (:sender,:receiver,:receiver_name,:subject,:body,:date,:time,:s,:replyId)");
			   $sendstmt->bindParam(':sender',$passMailInfo['sender-mail']);
			   $sendstmt->bindParam(':receiver',$passMailInfo['receiver-mail']);
			   $sendstmt->bindParam(':receiver_name',$passMailInfo['receiver-name']);
			   $sendstmt->bindParam(':subject',$passMailInfo['subject']);
			   $sendstmt->bindParam(':body',$passMailInfo['body']);
			   $sendstmt->bindParam(':date',$passMailInfo['date']);
			   $sendstmt->bindParam(':time',$passMailInfo['time']);
			   $sendstmt->bindParam(':s',$a=0);
			   $sendstmt->bindParam(':replyId',$passMailInfo['replyid']);
			   $sendstmt->execute();
			   $sendstmt="";
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong confrim in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().' '.$e->getMessage());
				
		     }
		
		 $this->connClose();	
		}
	}
	public function fetchAllSentMail($fetcherMail)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `sent` WHERE `sendermail`=:s ORDER BY `id` DESC");
			  $stmt->bindParam(':s',$fetcherMail);
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
			  header('Location:http://anitechtime.000webhostapp.com/student_management_system/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function fetchSentMail($fetcherMail,$passId)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `sent` WHERE `sendermail`=:s AND `id`=:id ");
			  $stmt->bindParam(':s',$fetcherMail);
			  $stmt->bindParam(':id',$passId);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if(empty($Row))
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $this->setStatus($fetcherMail,$passId);
				  $store=$stmt->fetch(); $this->connClose(); return $store; 
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/student_management_system/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function delSentMail($passId,$passFetcherMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("DELETE FROM `sent` WHERE `id`=:id AND `sendermail`=:mail");
			   $stmt->bindParam(':id',$passId);
			   $stmt->bindParam(':mail',$passFetcherMail);
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
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
	}
	public function setStatus($fmail,$sid)
	{
		$check=parent::dbCon();
		if($check==1)
		{
		    try
		    {
		       $s = $this->conn->prepare("UPDATE `sent` SET `status`=1 WHERE `id`=:sid AND `sendermail`=:fmail AND `status`=0");
				  $s->bindParam(':fmail',$fmail);
			      $s->bindParam(':sid',$sid);
				  $s->execute();
				  $scount=$s->rowCount();
				  if($scount>0)
				  { 
				    $s=0;
				    return 1; 
				  }
				  else
				  { $s=0; return 0; }
			}
			catch (PDOException $e) {
				$this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
		}
	}
	public function unsetStatus($fmail,$sid)
	{
		try
		    {
		          $s = $this->conn->prepare("UPDATE `sent` SET `status`=0 WHERE `sendermail`=:fmail AND `id`=:sid AND `status`=1 ");
				  $s->bindParam(':fmail',$fMail);
			      $s->bindParam(':sid',$sid);
				  $s->execute();
				  $scount=$s->rowCount();
				  if($scount>0)
				  { 
				    $s=NULL;
				    return 1; 
				  }
				  else
				  { $s=NULL; return 0; }
			}
			catch(PDOException $e) {
				$s=0;
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
	}
	public function getReplyId($passId,$fetcherMail)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT `replyId` FROM `sent` WHERE `sendermail`=:s AND `id`=:id ");
			  $stmt->bindParam(':s',$fetcherMail);
			  $stmt->bindParam(':id',$passId);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if(empty($Row))
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
			  header('Location:http://anitechtime.000webhostapp.com/student_management_system/error/error.php?error=Error : Something is wrong in Sent.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
}

$sentObj=new Sent();
/*$arrayV=array('sender-mail'=>'aa@lmail.com',
		             'sender-name'=>'anirban',
					 'receiver-mail'=>'a@gmail.com',
					 'receiver-name'=>'sanu',
	                 'subject'=>'subjecthello',
					 'body'=>'bodyhello',
					 'date'=>'22-03-2919',
					 'time'=>'12:00');
					 
					 $returnV2=$sentObj->sendMail($arrayV);
					 echo $arrayV['sender-mail'];*/
?>