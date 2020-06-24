<?php

interface iDatabase{
	public function connClose();
	
	public function insertUser($tb_name,$passBindParam,$passValues);
	public function insertProjectDetailsByStream($passTStream,$passTBindParam,$passTValues);
	
	public function getUserDetailsByStream($passUserStream);
	public function getProjectDetailsByStream($passTeaStream);
	
	public function getByUserNameAndUserId($passUserStream,$passUserId);
	public function getByProjectId($passTeaStream,$passTeaId);
	
	public function updateUserData($streamUserData,$idUserData,$updateBindArr,$updateDataArr);
	public function updateProjectData($streamTeaData,$idTeaData,$updateBindArr,$updateDataArr);
	
	public function delUserData($passStreamData,$passIdData,$passNameData);
	public function delProjectData($passTeaStreamData,$passTeaIdData,$passTeaNameData);
	
	/*public function getAllUserDetails(){}
	public function getAllProjectDetails(){}
	public function getByStreamProjectDetails(){}*/

}

?>