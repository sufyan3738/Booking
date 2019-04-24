<?php
session_start();

date_default_timezone_set("Asia/Bangkok");

include_once 'php/connect.php';
include_once 'php/room.php';
include_once 'php/time_range.php';

if(isset($_SESSION['user_id'])){
}else{
    header("location: php/logout.php");
}

$database = new Database();
$db = $database->getConnect();

$room = new Room($db);
$result = $room->readall();

$tr = new timerange($db);
$trresult = $tr->readall();

if(isset($_POST['submit'])){
    
}

?>

<!DOCTYPE html>
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
            <div class="col-sm-4">
            <h1><center>ระบบจองห้อง</center></h1>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <table style="width:100%">
                    <tr>
                        <th>ห้อง</th>
                        <th>รายละเอียด</th>
                        <th>เลือกวันที่</th>
                        <th>เลือกเวลา</th>
                        <th>จอง</th>
                    </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['room_name']; ?></td>
                                <td><?php echo $row['room_desc']; ?></td>
                                <td><input type="date" name="date" class="form-control"></td>
                                <td><select class="form-control" id="sel1" name="timerange">
                                    <?php while($trrow = mysqli_fetch_array($trresult)){
                                        echo "<option value=".$trrow['tr_id'].">" . $trrow['tr_start'] . " - " . $trrow['tr_end'] . "</option>";
                                    }
                                    ?>
                                </select></td>
                                <td><a href="room_detail.php?room_id=<?php echo $row['room_id']; ?>">จอง</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

    </div>
</body>
</html>