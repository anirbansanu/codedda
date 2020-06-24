<?php
require_once '../../db/class/Project.php';


$files=$_FILES;

$details=array("p_name"=>$_POST['project_name'],"admin"=>3, "p_type"=>$_POST['project_type'], "p_description"=>$_POST['project_description'], "p_privacy"=>$_POST['project_status'],
"files"=>$files,
"group_name"=>$_POST['group_name'],"group_image_name"=>$_FILES['group_img']['name'],"group_image_url"=>$_FILES['group_img']['name'],"current_date"=>$_POST['create_date'],
"p_uni_code"=>$_POST['uni_code'],"p_pass"=>$_POST['uni_pass']);

$result=$project->create(4,$details);
if(isset($result[0]) and isset($result[1]))
    header('Location:../../Projects/details/details.php?success=Success : Project Created&group='.$result[1]);
else
    header('Location:../../Projects/create/create.php?error=Error : failed to create project plz try again');



?>