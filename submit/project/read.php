<?php 
require_once('../../db/class/Project.php');

if(isset($_SESSION['user_id']))
{
    $arr=$project->getListByUser($_SESSION['user_id']);
    //print_r($arr);
    $c=count($arr);
    /*for($i=0;$i<$c;$i++)
    {  
        echo 'user_name : '.$arr[$i]['user_name']." </br>";
        echo 'group_name : '.$arr[$i]['group_name']." </br>";
        echo 'project_name : '.$arr[$i]['project_name']." </br>";
        echo 'project_type : '.$arr[$i]['project_type']." </br>";
        echo 'project_description : '.$arr[$i]['project_description']." </br></br>";
    }*/
    /*foreach($arr as $key => $element) 
    {  
        echo $key . ": " . $element . "<br>";
    } */ 
      
}
else
{

}




?>
