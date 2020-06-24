<?php
require_once('../../db/class/Connection.php');
require_once('../../db/class/Project_Files.php');
require_once('../../db/interface/iProject.php');
class Project extends Connection implements iProject
{
	public function connClose()
	{
		$stmt=0;
		parent::close();
	}
	public function create($user_id,$project_details)
	{
		$file_submit= new Project_Files();
		$file_id="f_".$project_details['p_name']."_".mt_rand().time();	   
		$file_submit->submit($file_id,$_FILES,"hala",'create_project');
		$check=parent::dbCon();
		if($check==1)
		{
			
			try
		    {
				// plz add on prepare//`project_user_admin_id`, :admin_id,
		       $stmt = $this->conn->prepare("INSERT INTO `projects` (`project_name`, `project_user_admin_id`, `project_type`, `project_file_id`, `project_privacy`, `project_description`) VALUES (:name, :admin_id, :type, :fileid, :privacy, :description);");
			   $stmt->bindParam(':name',$project_details['p_name']);
			   $stmt->bindParam(':admin_id',$user_id);
			   $stmt->bindParam(':type',$project_details['p_type']);
			   
			   $stmt->bindParam(':fileid',$file_id);
			   $stmt->bindParam(':privacy',$project_details['p_privacy']);
			   $stmt->bindParam(':description',$project_details['p_description']);
			   $exe_check=$stmt->execute();
			   

			   if($exe_check)
				{
					$last_id=$this->conn->lastInsertId();
				}
				else
			   		return NULL;


			   $stmt1 = $this->conn->prepare("INSERT INTO groups VALUES (NULL, :last_id, :group_name, :group_image_url, :group_image_name, :current_date,:uni_code,:uni_pass);");
			   $stmt1->bindParam(':last_id',$last_id);
			   $stmt1->bindParam(':group_name',$project_details['group_name']);
			   $stmt1->bindParam(':group_image_url',$project_details['group_image_url']);
			   $stmt1->bindParam(':group_image_name',$project_details['group_image_name']);
			   $stmt1->bindParam(':current_date',$project_details['current_date']);
			   $stmt1->bindParam(':uni_code',$project_details['p_uni_code']);
			   $stmt1->bindParam(':uni_pass',$project_details['p_pass']);
			   $exe_check=$stmt1->execute();
			   $group_last_id=$this->conn->lastInsertId();
			   $stmt1="";
			   $this->connClose();
			   	if($exe_check)
				{
					if($this->joinGroup($user_id,$group_last_id))
					{
						return array(1,$group_last_id);
					}
						
				}
			   	else
			   		return NULL;
			     
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Project.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
		else
		{
			return array(0,"Connection Error");
		}
	}
	public function joinGroup($user_id,$group_id)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			
			try
		    {
				// plz add on prepare//`project_user_admin_id`, :admin_id,
		       $stmt = $this->conn->prepare("INSERT INTO `group_members`(`group_id`, `user_id`) VALUES (:group_id,:user_id)");
			   $stmt->bindParam(':user_id',$user_id);
			   $stmt->bindParam(':group_id',$group_id);
			   
			   $exe_check=$stmt->execute();
			   //$last_id=$this->conn->lastInsertId();
			   $this->connClose();
			   if($exe_check)
			   	return 1;
			   else
			   	return NULL;
			     
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Project.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
		else
		{
			header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Project.php Connection error');
		}
	}
	public function getListByUser($user_id)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT user.user_name,groups.id,groups.group_name,groups.group_create_date, projects.project_name, projects.project_type,projects.project_description,projects.project_privacy,projects.project_user_admin_id FROM 
			  (((group_members INNER JOIN user ON group_members.user_id = user.id)
			   INNER JOIN groups ON group_members.group_id = groups.id) 
			   INNER JOIN projects ON projects.project_id = groups.project_id) WHERE user.id=$user_id");
			  
			  	if($stmt->execute())
			  	{
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
				  else
				  {
					$this->connClose();
					return -1;
				  }
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function getList()
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT * FROM `projects`");

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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function getDetailsByAdmin($admin_id,$group_id)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT groups.*, projects.*, project_files.file_name,project_files.file_loc FROM ((groups INNER JOIN projects ON groups.project_id = projects.project_id) INNER JOIN project_files ON projects.project_file_id = project_files.id) WHERE groups.id=:group_id AND projects.project_user_admin_id=:admin_id");
			  $stmt->bindParam(':group_id',$group_id);
			  $stmt->bindParam(':admin_id',$admin_id);
			  
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
			  $store=$stmt->fetch();
				
				if(empty($Row))
				{  
				  $this->connClose();
				  return 0;
				}
				else
				{
				    $this->connClose(); return $store;
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Project.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
		    }
	}
	public function getMembers($group_id)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT user.id, user.user_name, user.user_mail, user.user_gender FROM ((group_members INNER JOIN user ON group_members.user_id = user.id) INNER JOIN groups ON group_members.group_id = groups.id) WHERE groups.id=:id");
			  $stmt->bindParam(':id',$group_id);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
			  $store=$stmt->fetchAll();
				
				if(empty($Row))
				{  
				  $this->connClose();
				  return 0;
				}
				else
				{
				    $this->connClose(); return $store;
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Group.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	public function del($userid,$projectId)
	{
		$check=parent::dbCon();
		if($check==1)
		{
			try
		    {
               $stmt = $this->conn->prepare("DELETE FROM `inbox` WHERE `receivermail`=:r AND `id`=:id ");
			   $stmt->bindParam(':r',$userid);
			   $stmt->bindParam(':id',$projectId);
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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		     }
		
		 $this->connClose();	
		}
		
	}
	public function setStatus($user_id,$project_id)
	{
		$check=parent::dbCon();
		if($check==1)
		{
		    try
		    {
		       	$s = $this->conn->prepare("UPDATE `inbox` SET `status`=1 WHERE `id`=:userid AND `receivermail`=:projectId AND `status`=0");
				  $s->bindParam(':u_id',$user_id);
			      $s->bindParam(':p_id',$project_id);
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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
		}
	}
	public function unsetStatus($userid,$projectId)
	{
		try
		    {
		          $s = $this->conn->prepare("UPDATE `inbox` SET `status`=0 WHERE `receivermail`=:fmail AND `id`=:rid AND `status`=1 ");
				  $s->bindParam(':fmail',$userid);
			      $s->bindParam(':rid',$projectId);
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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
			}
	}
	public function getGroup($passId,$fetcherMail)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT `replyId` FROM `inbox` WHERE `receivermail`=:r AND `id`=:id ");
			  $stmt->bindParam(':r',$fetcherMail);
			  $stmt->bindParam(':id',$passId);
			  $stmt->execute();
			  $Row=$stmt->rowCount();
			  $store=$stmt->fetch();
				if(empty($Row))
				{  
				  $this->connClose();
				  return 0;
				}
				else
				{
				    $this->connClose(); return $store;
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Inbox.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
}

$project=new Project();


?>