<?php

interface iSent
{
	public function connClose();						//close database connection
	public function create($userid,$groupId);			//return 0 or 1 at a time
	public function getList($userid);					//return 0 or mul data[''] at a time
	public function getDetails($userid,$groupId);		//return 0 or signle data[''] at a time
	public function del($userid,$groupId);				//return 0 or 1 at a time
	public function setStatus($userid,$groupId);		//is set return 1
	public function unsetStatus($userid,$groupId);		//is unset return 0
	public function getProject($userid,$groupId);		//return 0 or signle data[''] at a time
}

?>