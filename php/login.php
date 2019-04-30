<?php
    session_start();

    include_once 'connect.php';
    include_once 'users.php';

    $database = new Database();
    $db = $database->getConnect();

    $user = new Users($db);

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    $result = $user->readone();

    if($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user_id'];
        
        if($row['user_type'] == 3){
            $_SESSION['user_type'] = $row['user_type'];
            header("Location: ../admin.php");
        }else{
            header("Location: ../room.php");
        }
    }else{
        header("Location: ../index.php?result=fail");
    }

?>