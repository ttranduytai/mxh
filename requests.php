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
    <title>VietBook | Yêu cầu kết bạn</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
    .container{
        text-align:center;
    }
    a.profilelink{
        color:unset;
    }
    .userquery a{
        text-decoration:underline;
    }
    .userquery{
        width:200px;
    }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1>Yêu cầu kết bạn</h1>
        <?php
        // Responding to Request
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['accept']))
                {
                    $sql = "update friendship set friendship.friendship_status = 1 where friendship.user1_id = {$_GET['id']} AND friendship.user2_id = {$_SESSION['vietbook_userid']}";
                    $query = mysqli_query($conn, $sql);
                    if($query){
                        echo '<div class="userquery">';
                        echo 'Bạn đã đồng ý ' . $_GET['name'];
                        echo '<br><br>';
                        echo '...';
                        echo '<br><br>';
                        echo '</div>';
                        echo '<br>';
                        header("refresh:1; url=profile.php" );
                        }
                    else{
                        echo mysqli_error($conn);
                    }
                }

        else if(isset($_GET['ignore']))
        {
                $sql6 = "delete from friendship where friendship.user1_id = {$_GET['id']} AND friendship.user2_id = {$_SESSION['vietbook_userid']}";
                $query6 = mysqli_query($conn, $sql6);
                if($query6){
                    echo '<div class="userquery">';
                    echo 'Bạn đã từ chối ' . $_GET['name'];
                    echo '<br><br>';
                    echo '...';
                    echo '<br><br>';
                    echo '</div>';
                    echo '<br>';
                    header("refresh:1; url=profile.php" );
                }
            }
        }
        //
        ?>
        <?php
        $sql = "SELECT *
                FROM users
                JOIN friendship
                ON friendship.user2_id = {$_SESSION['vietbook_userid']} AND friendship.friendship_status = 0 AND friendship.user1_id = users.userid";
        $query = mysqli_query($conn, $sql);
        $width = '168px';
        $height = '168px';
        if(!$query)
            echo mysqli_error($conn);
        if($query){
            if(mysqli_num_rows($query) == 0){
                echo '<div class="userquery">';
                echo 'Không có yêu cầu kết bạn nào.';
                echo '<br><br>';
                echo '</div>';
            }
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="userquery">';
                //include 'includes/profile_picture.php';
                echo '<br>';
                echo '<a class="profilelink" href="profile.php?id='.$row['userid'].'">'.
                $row['first_name'].' '.$row['last_name'].'<br>'.
                $row['email'].'<br>'.
                'ID: '.$row['userid'].
                '</a>';
                echo '<form method="get" action="requests.php">';
                echo '<input type="hidden" name="id" value="' . $row['userid'] . '">';
                echo '<input type="hidden" name="name" value="' . $row['first_name'] . ' ' . $row['last_name'] . '">';
                echo '<input type="submit" value="Đồng ý" name="accept">';
                echo '<br><br>';
                echo '<input type="submit" value="Từ chối" name="ignore">';
                echo '<br><br>';
                echo'</form>';
                echo '</div>';
                echo '<br>';
            }
        }
        ?>
    </div>
</body>
</html>