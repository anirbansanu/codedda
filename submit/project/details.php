<?php
require_once '../../db/class/Group.php';

    if(isset($_GET['group']))
    {
        $id=$_GET['group'];
        $project_details=$group->getDetails($id);
        $project_members_details=$group->getMembers($id);
        $number_of_members=count($project_members_details);
        //print_r($project_details);
        //echo "</br> \n";
        //print_r($project_members_details);
        //echo "Name : ".$project_members_details[0]['user_gender'];

    }
    else
    {
        header('Location:http://localhost/AdminLTE-3.0.4/home/index/?error= Error : you cant see your project right now');
    }
    

?>