<?php
require_once('../../db/interface/iConnection.php');

class Connection implements iConnection {
	
	protected $conn;
	protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
	protected $dbname = "cllab";

	public function dbCon()
	{
		try {
              $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              return 1;
            }
            catch(PDOException $e)
            {
                //echo "Connection failed: " . $e->getMessage();
              header('Location:http://localhost/AdminLTE-3.0.4/error/error.php?error=Error : Something is wrong in Connection.php SQLSTATE['.$e->getCode().'] line no. '.$e->getLine());			}
	}
	public function close()
	{
		$this->conn = null;
	}
}


?>