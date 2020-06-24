<?php

require_once 'FilesToZip.php';

$obj=new FilesToZip();
$obj->fTZ('hala',$_FILES,"/upload/",'submitbtn');


?>