<?php
class Database{
    private $host;
    private $db_name;
    private $username;
    private $password;
	private $port;
    public $conn;

    function __construct($dbName="saajan_captain251021") {
        $this->db_name = $dbName;
        $this->host = "207.180.208.182";
        $this->username = "saajan_captain251021";
        $this->password = "Jan@2904";
        $this->port = "3306";
        $this->conn = null;
    }
    public function getConnection(){
        try
        {   
		    if($this->port){
                $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                return $this->conn;
            }
            else{
			    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                return $this->conn;
		    }
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
 
        
    }
}
?>
