<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $passwd = "";
    private $dbname = "booking";
    public $conn;

    public function getConnect(){
        $this->conn = null;
        try{
            $this->conn = mysqli_connect($this->host,$this->user,$this->passwd,$this->dbname);
            mysqli_set_charset($this->conn, "utf8");
        }catch(Exception $exception){
            echo "Connection error: " . $exception.getMessage();
        }
        return $this->conn;
    }
}
?>