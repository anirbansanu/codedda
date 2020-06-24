<?php
require_once('../../class/Connection.php');
require_once('../../interface/iTrash.php');
class Trash extends Connection implements iTrash
{
	public function connClose()
	{
		$stmt=null;
		parent::close();
	}
	public function trashInboxMail($passMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("INSERT INTO `trash` (`fatcherMail`, `sendermail`, `sendername`, `receivermail`, `receivername`, `subject`, `body`, `date`, `time`, `status`) VALUES (:fMail,:sender,:sendername,:receiver,:receiver_name,:subject,:body,:date,:time,:status)");
			   $stmt->bindParam(':fMail',$passMail['fatcherMail']);
			   $stmt->bindParam(':sender',$passMail['sender-mail']);
			   $stmt->bindParam(':sendername',$passMail['sender-name']);
			   $stmt->bindParam(':receiver',$passMail['receiver-mail']);
			   $stmt->bindParam(':receiver_name',$rn=0);
			   $stmt->bindParam(':subject',$passMail['subject']);
			   $stmt->bindParam(':body',$passMail['body']);
			   $stmt->bindParam(':date',$passMail['date']);
			   $stmt->bindParam(':time',$passMail['time']);
			   $stmt->bindParam(':status',$s=0);
			   $stmt->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().' msg='.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
	}
	public function trashSentMail($passMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("INSERT INTO `trash` ( `fatcherMail`, `sendermail`,`sendername`, `receivermail`, `receivername`, `subject`, `body`, `date`, `time`,`status`)  VALUES (:fMail,:sender,:sendername,:receiver,:receiver_name,:subject,:body,:date,:time,:s)");
			   $stmt->bindParam(':fMail',$passMail['fatcherMail']);
			   $stmt->bindParam(':sender',$passMail['sender-mail']);
			   $stmt->bindParam(':sendername',$sn=0);
			   $stmt->bindParam(':receiver',$passMail['receiver-mail']);
			   $stmt->bindParam(':receiver_name',$passMail['receiver-name']);
			   $stmt->bindParam(':subject',$passMail['subject']);
			   $stmt->bindParam(':body',$passMail['body']);  
			   $stmt->bindParam(':date',$passMail['date']);
			   $stmt->bindParam(':time',$passMail['time']);
			   $stmt->bindParam(':s',$s=0);
			   $stmt->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		 $this->connClose();	
		}
	}
	public function trashDraftMail($passMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
		       $stmt = $this->conn->prepare("INSERT INTO `trash` ( `fatcherMail`, `sendermail`,`sendername`, `receivermail`, `receivername`, `subject`, `body`, `date`, `time`,`status`)  VALUES (:fMail,:sender,:sendername,:receiver,:receiver_name,:subject,:body,:date,:time,:s)");
			   $stmt->bindParam(':fMail',$passMail['fatcherMail']);
			   $stmt->bindParam(':sender',$passMail['sender-mail']);
			   $stmt->bindParam(':sendername',$sn=0);
			   $stmt->bindParam(':receiver',$passMail['receiver-mail']);
			   $stmt->bindParam(':receiver_name',$rn=0);
			   $stmt->bindParam(':subject',$passMail['subject']);
			   $stmt->bindParam(':body',$passMail['body']);  
			   $stmt->bindParam(':date',$passMail['date']);
			   $stmt->bindParam(':time',$passMail['time']);
			   $stmt->bindParam(':s',$s=0);
			   $stmt->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		 $this->connClose();	
		}
	}
	public function fetchAllTrashMail($fetcherMail)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `trash` WHERE `fatcherMail`=:f ORDER BY `id` DESC");
			  $stmt->bindParam(':f',$fetcherMail);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if($Row==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $store=$stmt->fetchAll(); 
				  $this->connClose(); 
				  return $store; 
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function fetchTrashMail($fetcherMail,$passId)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `trash` WHERE `fatcherMail`=:f AND `id`=:id");
			  $stmt->bindParam(':f',$fetcherMail);
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
					$this->setStatus($fetcherMail,$passId);
				   $store=$stmt->fetch(); $this->connClose(); return $store; 
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function delTrashMail($passId,$passFetcherMail)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("DELETE FROM `trash` WHERE `id`=:id AND `sendermail`=:s");
			   $stmt->bindParam(':id',$passId);
			   $stmt->bindParam(':s',$passFetcherMail);
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
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
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
		       $s = $this->conn->prepare("UPDATE `trash` SET `status`=1 WHERE `id`=:sid AND `fatcherMail`=:fmail AND `status`=0");
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
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
		}
	}
	public function unsetStatus($fmail,$sid)
	{
		try
		    {
		          $s = $this->conn->prepare("UPDATE `trash` SET `status`=0 WHERE `fatcherMail`=:fmail AND `id`=:sid AND `status`=1 ");
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
			  header('Location:http://anitechtime.000webhostapp.com/lock-mail/error/error.php?error=Error : Something is wrong in Trash.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
	}
}
$trashObj=new Trash();

/*$arrayV=array('fatcherMail'=>'aa@lmail.com',
		             'mailid'=>3,
		             'sender-mail'=>'aa@lmail.com',
		             'sender-name'=>'anirban',
					 'receiver-mail'=>'a@gmail.com',
	                 'subject'=>'check trash working or not',
					 'body'=>'check trash working or not for success del',
					 'date'=>22-03-19,
					 'time'=>'9:00pm');

		$returnV2=$trashObj->trashInboxMail($arrayV);
		
		  if(!empty($returnV2))
		  echo $arrayV['fatcherMail'].' <br>body'.$arrayV['fatcherMail'];
		  else
		  echo 'failed';*/
		

?>