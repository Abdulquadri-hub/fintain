<?php
class DBConnection{
    
    // properties
    private $host = 'localhost';
    private $dbname = "fintaintech_fintaindb";
    private $dbuser = "fintaintech_fintainTechAdmin";
    private $dbpass = "100FoldsReturn!@";

    // methods
    public function __construct(){}
	public function openConnection(){
        $dbconn = new mysqli($this->host, $this->dbuser, $this->dbpass, $this->dbname);
        return $dbconn;
        		
    }
	public function closeConnection($db){
		mysqli_close($db);
	}
}
?>