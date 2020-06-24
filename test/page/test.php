<?php
//require_once('../../db/class/Project.php');
//require_once('../../db/class/User.php');


/*$p_details = array("p_name"=>"python holo", "p_file"=>"lol.txt.py", "p_file_name"=>"lol.txt", "p_privacy"=>"public",
                    "p_description"=>"this is the py project","p_uni_code"=>"123","p_pass"=>"321");

if($project->create(0,$p_details))
{
    echo "inserted";
}
else
{
    echo "unsuccessfull";
}*/

//getProjectListByUser

/*$ss = $project->getListByUser("1");

            foreach($ss as $s)
			{
				echo $s['user_name']." || ";
				
				echo $s['project_name']." || ";
				echo $s['project_type']." || ";
				echo $s['project_description']." || ";

				echo $s['group_name']."<br>";
			}


//getGroupListByUser

$details=array("name"=>"challa", "mail"=>"challa@gmail.com", "pass"=>"1234", "gen"=>"Male");

if($user->setRow($details))
		echo "inserted successfull";
else
		echo "Failed";
*/
session_start();
ob_start();
 print_r($_SESSION);
if(empty($_SESSION['user_mail']))
{
  echo "Session is not set yet";
}


?>