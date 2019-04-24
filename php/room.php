<?php
class Room{

    private $conn;
    private $table_name = "room";

    public $room_id;
    public $room_name;
    public $room_desc;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY room_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE room_id = " . $this->room_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}
?>