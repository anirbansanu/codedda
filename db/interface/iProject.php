<?php

interface iProject
{
	public function connClose();						//close database connection
	public function create($user_id,$project_details);
	public function joinGroup($user_id,$group_id);			//return 0 or 1 at a time
	public function getList();					//return 0 or mul data[''] at a time
	public function getDetailsByAdmin($admin_id,$group_id);		//return 0 or single data[''] at a time
	public function getMembers($group_id);		//return 0 or single data[''] at a time
	public function del($user_id,$project_id);		//return 0 or 1 at a time
	public function setStatus($user_id,$project_id);		//is set return 1
	public function unsetStatus($user_id,$project_id);	//is unset return 0
	public function getGroup($user_id,$project_id);		//return 0 or single data[''] at a time
}

?>