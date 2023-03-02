<div class="usernav">
    <?php
        $sql2 = "select count(*) as count from friendship where friendship.user2_id = {$_SESSION['vietbook_userid']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
    <ul>
    <li><a href="profile.php">Trang cá nhân</a></li>
    <li><a href="friends.php">Bạn bè</a></li>
    <li><a href="requests.php">Yêu cầu kết bạn (<?php echo $row['count'] ?>)</a></li>
    <li><a href="logout.php">Đăng xuất</a></li>
    </ul>
</div>