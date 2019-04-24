<?php
    session_start();

    include_once 'php/connect.php';
    include_once 'php/booking.php';

    $database = new Database();
    $db = $database->getConnect();

    $booking = new Booking($db);

    if(isset($_GET['room_id'])) {
    }else{
        header("location: room.php");
    }

    if(isset($_POST['submit'])) {
        $booking->room_id = $_GET['room_id'];
    }
?>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><center><h1>เลือกเวลาจองห้อง</h1></center></div>
            <div class="col-sm-4"></div>
        </div>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <form action="php/login.php" method="post">
                Username
                <input type="text" class="form-control" name="username" required>
                Password
                <input type="password" class="form-control" name="password" required><br>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <button type="submit" class="form-control" name="submit">ยืนยัน</button>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>