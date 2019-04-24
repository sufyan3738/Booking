<?php
class Users{
    private $conn;
    private $table_name = "user";

    public $user_id;
    public $username;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readone()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = '" . $this->username . "' AND password = '" . md5($this->password) . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}
?>