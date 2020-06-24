<?php
require_once('../../class/Project.php');


$p_details = array("p_name"=>"python holo", "p_file"=>"lol.txt.py", "p_file_name"=>"lol.txt", "p_privacy"=>"public",
                    "p_description"=>"this is the py project","p_uni_code"=>"123","p_pass"=>"321");

if($project->create($p_details))
{
    echo "inserted";
}
else
{
    echo "unsuccessfull";
}
?>