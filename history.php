<?php
    session_start();

    include_once 'php/connect.php';
    include_once 'php/booking.php';
    include_once 'php/room.php';
    include_once 'php/time_range.php';

    $database = new Database();
    $db = $database->getConnect();

    $booking = new booking($db);
    $booking->user_id = $_SESSION['user_id'];
    $result = $booking->readall();

    $room = new room($db);
    $tr = new timerange($db);

    if(isset($_SESSION['user_id'])) {
    }else{
        header("location: php/logout.php");
    }

    if(isset($_GET['booking_id'])){
        $booking->booking_id = $_GET['booking_id'];
        if($booking->delete()){
            header("location: history.php?result=true");
        }else{
            header("location: history.php?result=fail");
        }
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="room.php">จองห้อง</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="history.php">ประวัติการจอง</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="php/logout.php">ออกจากระบบ</a>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center"><h1>ประวัติการจอง</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center">
            <table style="width:100%">
                <tr>
                    <th>ห้อง</th>
                    <th>รายละเอียด</th>
                    <th>วันที่จอง</th>
                    <th>เวลาที่จอง</th>
                    <th>ยกเลิกการจอง</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        $room->room_id = $row['room_id'];
                        $Rresult = $room->readone();
                        $Rrow = mysqli_fetch_array($Rresult);
                            echo "<tr>";
                            echo "<th>" . $Rrow['room_id'] . "</th>";
                            echo "<th>" . $Rrow['room_desc'] . "</th>";
                            echo "<th>" . $row['booking_date'] . "</th>";
                            $tr->tr_id = $row['tr_id'];
                            $trresult =  $tr->readone();
                            $trrow = mysqli_fetch_array($trresult);
                            echo "<th>" . $trrow['tr_start'] . " - " . $trrow['tr_end'] . "</th>";
                            echo "<th><a href='history.php?booking_id=" . $row['booking_id'] . "'>ยกเลิก</a></th>";
                            echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
            <div class="col-md-12">
                <?php
                    if (isset($_GET['result'])) {
                        if ($_GET['result'] == 'fail') {
                            echo "<div class='alert alert-danger text-center'>เกิดเหตุขัดข้อง ไม่สามารถลบประวัติการจองได้!</div>";
                        }else if ($_GET['result'] == 'true') {
                            echo "<div class='alert alert-success text-center'>ลบข้อมูลการจองเรียบร้อยแล้ว</div>";
                        }
                    }
                ?>
            </div>
</div>
    
</body>
</html>