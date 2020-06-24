<?php
require_once('../class/Connection.php');
require_once('../interface/iDatabase.php');

class Database extends Connection implements iDatabase{
	var $tb_array=array("User", "Project", "Todo", "Chat");
	public function connClose()
	{
		$stmt=null;
		parent::close();
	}
	//Insert Into Database
	public function insert($tb_name,$passBindParam,$passValues)
	{
	  parent::dbCon();
	  $state=false;
		 if(in_array($tb_name,$this->tb_array))
		 {
			 $state=true;
		 }
		 if(!$state)
		 {
			 header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Dont try to Access Database.php');
		 }
		 $paramlength = count($passBindParam);
         for($x = 0; $x < $paramlength; $x++)
		 {
			 if($x==0)
			 {
				 $dbAtt="`".$passBindParam[0]."`";
				 $sqlBindValues=":".$passBindParam[0];	 
			 }
			 else
			 {
				$dbAtt.=",`".$passBindParam[$x]."`";
		        $sqlBindValue=":".$passBindParam[$x];
		        $sqlBindValues.=",".$sqlBindValue;
			 }
         }
		try
		{
		 $stmt = $this->conn->prepare("INSERT INTO `$tb_name` (".$dbAtt.") VALUES ($sqlBindValues)");
			

		 for($x = 0; $x < $paramlength; $x++)
		 {
			     $stmt->bindParam(':'.$passBindParam[$x],$passValues[$x]);
         }
         if($x==$paramlength)
		 {
			 $stmt->execute();
			 return 1;
		 }
		 else
		 {
			  return 0;
		 }
		}
		catch (PDOException $e) {
			$this->connClose();
			header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		}
		
		 $this->connClose();	
	}
	
    //Get all students details	
	public function get($tb_name)
	{
		parent::dbCon();
		$state=false;
		 if(in_array($tb_name,$tb_array))
		 {
			 $state=true;
		 }
		 if(!$state)
		 {
			 header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Dont try to Access Database.php');
		 }
		try 
		{
			$query="SELECT * FROM $tb_name";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			 /*$students=$stmt->fetchAll();*/
			 return $stmt->fetchAll();
			/*foreach($students as $s)
			{
				echo $s['name'];
				echo $s['email'];
				echo $s['pass']."<br>";
			}
			$this->connClose();*/
		 } 
		catch (PDOException $e) {
			$this->connClose();
			header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
				
		}
	}
	
	
		//->Update data of students
		public function update($tb_name,$idStuData,$updateBindArr,$updateDataArr)
		{
			parent::dbCon();
			$state=false;
		 	if(in_array($tb_name,$tb_array))
		 	{
			 $state=true;
		 	}
		 	if(!$state)
		 	{
			 	header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Dont try to Access Database.php');
		 	}
			$arrLength= count($updateBindArr);
			for($i=0; $i < $arrLength; $i++)
			{
			 if($i==0)
			 {
				 $BindValues=":".$updateBindArr[0];
				 $bdata=$updateBindArr[0]." = ".$BindValues;
			 }
			 else
			 {
		         $BindValue=":".$updateBindArr[$i];
				 $bdata.=",".$updateBindArr[$i]." = ".$BindValue;  
			 }
			}
			try
			{
              $stmt = $this->conn->prepare("UPDATE $tb_name SET $bdata WHERE id=$idStuData");
			  for($i = 0; $i < $arrLength; $i++)
		      {
			     $stmt->bindParam(':'.$updateBindArr[$i],$updateDataArr[$i]);
              }
			
              if($i==$arrLength)
		      {
			    $stmt->execute();
				$countRow=$stmt->rowCount();
				
				if($countRow==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $this->connClose();
				  return 1;
				  
				}
				return 0;
		      }
		      else
		      {
			     header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Executing is not successfull in Database.php');
		      }
		      $this->connClose(); 
			}
			catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }
		}

		
		
		//For delete data of Students
		public function delStuData($passStreamData,$passIdData,$passNameData)
		{
			parent::dbCon();
	        try 
		    {
              $sql ="DELETE FROM $passStreamData WHERE `id`=$passIdData AND `name`='".$passNameData."'";
              $stmt = $this->conn->prepare($sql);
			  $stmt->execute();
			  $countRow=$stmt->rowCount();
				
				if($countRow==0)
				{
				  $this->connClose();
				  return 0;
				}
				else
				{
				  $this->connClose();
				  return 1; 
				}
		     }
             catch (PDOException $e) 
			{
			  $this->connClose();
			  header('Location:http://localhost/AdminLTE-3.0.4/error/db_error/error.php?error=Error : Something is wrong in Database.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());
		    }

		}
		
		
		
		
}

?>