<?php
class timerange {

    private $conn;
    private $table_name = "time_range";

    public $tr_id;
    public $tr_start;
    public $tr_end;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY tr_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE tr_id = " . $this->tr_id;
        $result = mysqli_query($this->conn, $query);
        return $result; 
    }
}
?>