<?php
    class booking {
        private $conn;
        private $table_name = 'booking';

        public $booking_id;
        public $room_id;
        public $user_id;
        public $booking_date;
        public $tr_id;
        public $created_date;
        public $purpose;
        public $status;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        function readall(){
            $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = " . $this->user_id . " ORDER BY booking_id";
            $result = mysqli_query($this->conn, $query);
            return $result;
        }

        function create(){
            $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (room_id,user_id,booking_date,tr_id,created_date,purpose) VALUE (?,?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt, 'ssssss', $this->room_id, $this->user_id, $this->booking_date, $this->tr_id, $this->$created_date, $this->purpose);

            if(mysqli_stmt_execute($stmt)) {
                return true;
            }else{
                return false;
            }
        }
        
        function delete(){
            $query = "DELETE FROM " . $this->table_name . " WHERE booking_id = ?";
            $stmt = mysqli_prepare($this->conn, $query);
            mysqli_stmt_bind_param($stmt, 's', $this->booking_id);

            if(mysqli_stmt_execute($stmt)) {
                return true;
            }else{
                return false;
            }
        }
        
    }
?>