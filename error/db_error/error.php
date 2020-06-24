<?php
   
	if($_GET['error']!="")
	{
		$e=$_GET['error'];
		echo $e;
	}
	else
	{
		echo "Multiple error";
	}

?>