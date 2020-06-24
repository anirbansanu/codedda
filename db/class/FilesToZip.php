<?php
require_once('../../db/interface/iFilesToZip.php');
class FilesToZip implements iFilesToZip
{
    public function fTZ($set_File_Name="", $files=NULL, $file_Directory="", $btn_Name=null) 
    {
        if(isset($_POST[$btn_Name]) and isset($files))
        {
            $zip = new ZipArchive;
            $random_name=$set_File_Name. time() . mt_rand();
            $f_name= $random_name.".zip";
            $zip_name = $file_Directory.$f_name;
            if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE)
            {
	
    
	            for($i=1;$i<=5;$i++)
	            {
		            if (!isset($files['img'.$i]['tmp_name'])) {
                    continue;
                    }
		            //$newname = date('YmdHis', time()) . mt_rand() . '.jpg';
                    $zip->addFromString($files['img'.$i]['name'], file_get_contents($files['img'.$i]['tmp_name']));

                    // moving files to the target folder.
                    mkdir($file_Directory."/".$random_name);
                    //move_uploaded_file($files['img'.$i]['tmp_name'], $file_Directory."/".$random_name."/".$files['img'.$i]['name']);
                    
	            }
    
	
                // All files are added, so close the zip file.
                $zip->close();
	            $success = $zip_name;
                
            
            }
            else
            {
                echo '<strong>Error!! </strong> Please select a file.';
                //return FALSE;
            }

            if(!empty($success))
            { 
                return array($success,$f_name);
                /*print_r($files);
                echo '<p class="success text-center">
            Files uploaded successfully and compressed into a zip format
            </p>
            <p class="success text-center">
            <a href="'.$success.'" target="__blank">Click here to download the zip file</a>
            </p>';*/
            }
            else
                return FALSE;
           
        }
        else
        {
                echo '<strong style="color:red;text-color:red">Error!! </strong> Please submit first.';
                //return FALSE;
        }
    }
}
?>