<?php
require_once('../../db/class/Connection.php');
//require_once('../../db/class/Project_Files.php');
require_once('../../db/interface/iGroup.php');
class Group extends Connection implements iGroup
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
		       $stmt = $this->conn->prepare("INSERT INTO `projects` (`project_name`, `project_user_admin_id`, `project_type`, `project_file_id`, `project_privacy`, `project_description`) VALUES (:name, :admin_id, :type, :fileid, :privacy, :description);SELECT @last := LAST_INSERT_ID();INSERT INTO groups VALUES (NULL, @last, :group_name, :group_image_url, :group_image_name, :current_date,:uni_code,:uni_pass);");
			   $stmt->bindParam(':name',$project_details['p_name']);
			   $stmt->bindParam(':admin_id',$user_id);
			   $stmt->bindParam(':type',$project_details['p_type']);
			   
			   $stmt->bindParam(':fileid',$file_id);
			   $stmt->bindParam(':privacy',$project_details['p_privacy']);
			   $stmt->bindParam(':description',$project_details['p_description']);
			   $stmt->bindParam(':group_name',$project_details['group_name']);
			   $stmt->bindParam(':group_image_url',$project_details['group_image_url']);
			   $stmt->bindParam(':group_image_name',$project_details['group_image_name']);
			   $stmt->bindParam(':current_date',$project_details['current_date']);
			   $stmt->bindParam(':uni_code',$project_details['p_uni_code']);
			   $stmt->bindParam(':uni_pass',$project_details['p_pass']);
			   $exe_check=$stmt->execute();
			   $last_id=$this->conn->lastInsertId();
			   $this->connClose();
			   if($exe_check)
			   	return array(1,$last_id);
			   else
			   	return NULL;
			     
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Group.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
		else
		{
			return array(1,"Connection Error");
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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Group.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
		     }
		 $this->connClose();	
		}
		else
		{
			return array(1,"Connection Error");
		}
	}
	public function getListByGroupId($group_id)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT groups.group_name, projects.project_name,projects.project_type, project_files.file_name,project_files.file_loc FROM ((groups INNER JOIN projects ON groups.project_id = projects.project_id) INNER JOIN project_files ON projects.project_file_id = project_files.id) WHERE groups.id=:id");
			  $stmt->bindParam(':id',$group_id);
			  $stmt->execute();
			  
			  $Row=$stmt->rowCount();
				
				if($Row==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  return $stmt->fetch();
				}
		    }
		    catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Group.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
	}
	
	public function getDetails($group_id)
	{
		parent::dbCon();
		try {
			  $stmt = $this->conn->prepare("SELECT groups.group_name, groups.group_create_date, projects.project_name,projects.project_type, projects.project_description, projects.project_user_admin_id, projects.project_privacy, project_files.file_name,project_files.file_loc FROM ((groups INNER JOIN projects ON groups.project_id = projects.project_id) INNER JOIN project_files ON projects.project_file_id = project_files.id) WHERE groups.id=:id");
			  $stmt->bindParam(':id',$group_id);
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
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Group.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
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
	
}

$group=new Group();


?>