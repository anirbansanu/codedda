<?php
/*if ($_FILES && $_FILES['img']) {
    
    if (!empty($_FILES['img']['name'][0])) {
        
        $zip = new ZipArchive();
        $zip_name = getcwd() . "/uploads/upload_" . time() . ".zip";
        
        // Create a zip target
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
            $error .= "Sorry ZIP creation is not working currently.<br/>";
        }
        
        $imageCount = count($_FILES['img']['name']);
        for($i=0;$i<$imageCount;$i++) {
        
            if ($_FILES['img']['tmp_name'][$i] == '') {
                continue;
            }
            $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
            
            // Moving files to zip.
            $zip->addFromString($_FILES['img']['name'][$i], file_get_contents($_FILES['img']['tmp_name'][$i]));
            
            // moving files to the target folder.
            move_uploaded_file($_FILES['img']['tmp_name'][$i], './uploads/' . $newname);
        }
        $zip->close();
        
        // Create HTML Link option to download zip
        $success = basename($zip_name);
    } else {
        $error = '<strong>Error!! </strong> Please select a file.';
    }
}*/
if(isset($_POST['submitbtn']))
{
$zip = new ZipArchive;
$zip_name = getcwd() ."/uploads/upload_" . time() . ".zip";
if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE)
{
	
    
	for($i=1;$i<4;$i++) 
	{
		 if ($_FILES['img'.$i]['tmp_name'][$i] == '') {
                continue;
            }
		//$newname = date('YmdHis', time()) . mt_rand() . '.jpg';
		$zip->addFromString($_FILES['img'.$i]['name'], file_get_contents($_FILES['img'.$i]['tmp_name']));
	}
    
	
    // All files are added, so close the zip file.
    $zip->close();
	$success = basename($zip_name);
	
            
}
else
{
	echo '<strong>Error!! </strong> Please select a file.';
}

            if(!empty($success)) 
			{ 
            print_r($_FILES);
			echo " array length count : ".count($_FILES);
    		echo '<p class="success text-center">
            Files uploaded successfully and compressed into a zip format
            </p>
            <p class="success text-center">
            <a href="uploads/'.$success.'" target="__blank">Click here to download the zip file</a>
            </p>';
	    	    
            }
}
?>