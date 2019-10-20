<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $servername = "";
    private $username = "";
    private $password = "";
    private $dbname = "";
    
 
    //create and return connection
    protected function connect(){

        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "shoeshop";
        
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        return $conn;
    }
}
?>