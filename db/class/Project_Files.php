<?php
require_once('../../db/class/FilesToZip.php');
require_once('../../db/interface/iProject_Files.php');
class Project_Files extends Connection implements iProject_Files
{
    public function connClose()
	{
		$upload=0;parent::close();
	}
    public function submit($id,$files,$set_name="",$submit_btn)
    {
		$c=parent::dbCon();
		if($c==1)
		{
			
            try
		    {
				$ftz=new FilesToZip();
				$img_files = array();
				for($i=1;$i<=5;$i++)
	            {
		            if (isset($files['img'.$i])) {
						$img_files['img'.$i]=$files['img'.$i];
                    }
				   
			    }
			  //print_r($img_files);
			   
				$file_arr=$ftz->fTZ($set_name,$img_files,"../../upload/files/",$submit_btn);
				if($file_arr!==FALSE)
			   		echo "file zip complete";
		       $upload = $this->conn->prepare("INSERT INTO `project_files` (`id`, `file_name`, `file_loc`) VALUES (:id, :f, :loc)");
               $upload->bindParam(':id',$id);
			   
					//return 0;

			   $f_loc=$file_arr[0];
			   $f_name=$file_arr[1];
			   $upload->bindParam(':f',$f_name);
			   $upload->bindParam(':loc',$f_loc);
			   $upload->execute();
			   $this->connClose();
			     return 1;
		    }
		     catch (PDOException $e) {
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Project_Files.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine().''.$e->getMessage());
				
			 }
			 $this->connClose();
		}
    }
}

?>