<?php

interface iUser
{
	public function connClose();
	public function ifExits($userMail,$userPass);
	public function setRow($user_details);
	public function setPass($userMail,$userPass);
	public function getRow($userMail,$userPass);
	public function checkMail($userMail);
	public function upRow($passId,$passValues);
	public function delRow($userId,$userMail);
}

?>