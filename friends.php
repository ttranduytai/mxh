<?php 
require 'functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['vietbook_userid'])) {
    header("location:login.php");
}
// Establish Database Connection
$conn = connect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>VietBook | Bạn bè</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
    .frame a{
        text-decoration: none;
        color: #4267b2;
    }
    .frame a:hover{
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1>Bạn bè</h1>
        <?php
            echo '<center>'; 
            $sql = "SELECT *
                    FROM users
                    JOIN (
                        SELECT friendship.user1_id AS user_id
                        FROM friendship
                        WHERE friendship.user2_id = {$_SESSION['vietbook_userid']} AND friendship.friendship_status = 1
                        UNION
                        SELECT friendship.user2_id AS user_id
                        FROM friendship
                        WHERE friendship.user1_id = {$_SESSION['vietbook_userid']} AND friendship.friendship_status = 1
                    ) userfriends
                    ON userfriends.user_id = users.userid";
            $query = mysqli_query($conn, $sql);
            $width = '168px';
            $height = '168px';
            if($query){
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
                    echo 'Chưa có bạn nào.';
                    echo '</div>';
                } else {
                    while($row = mysqli_fetch_assoc($query)){
                    echo '<div class="frame">';
                    echo '<center>';
                    // include 'includes/profile_picture.php';
                    echo '<br>';
                    echo '<a href="profile.php?id='.$row['userid'].'">'.
                    $row['first_name'].' '.$row['last_name'].'<br>'.
                    $row['email'].'<br>'.
                    'ID: '.$row['userid'].
                    '</a>';
                    echo '</center>';
                    echo '</div>';
                    }
                }
            }
            echo '</center>';
        ?>
    </div>
</body>
</html>