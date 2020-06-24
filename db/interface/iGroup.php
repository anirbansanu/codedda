<?php

interface iGroup
{
	public function connClose();//close database connection
	public function create($user_id,$project_details);//return 0 or 1 at a time
	public function getDetails($group_id);//return 0 or data[''] at a time
	public function getMembers($group_id);//return 0 or data[''] at a time
	public function joinGroup($user_id,$project_id);
}

?>