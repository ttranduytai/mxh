<?php
//echo '<div class="profile">';
//echo '<center>';
$row = mysqli_fetch_assoc($profilequery);
//echo $row['first_name'] . ' ' . $row['last_name'];
// Friendship Status
if($flag == 1){
    //echo '<br>';
    if(isset($row['friendship_status'])) {
        if($row['friendship_status'] == 1){
            echo '<form class="friendform" method="get">';
            echo '<input value="Bạn bè" disabled style="cursor:unset;background:#02d5bd;color:black" class="friendform_button" type="submit" disabled="disabled" id="special">';
            echo '</form>';
            echo '<br/>';
            echo '<form class="friendform" method="post">';
            echo '<button class="friendform_button" type="submit" name="remove">Hủy kết bạn</button>';
            echo '</form>';
        } else if ($row['friendship_status'] == 0){
            echo '<form class="friendform" method="post">';
            echo '<input value="Chờ đồng ý..." disabled style="cursor:unset;background:#02d5bd;color:black" class="friendform_button" type="submit" disabled="disabled" id="special">';
            echo '</form>';
        }
    } else {
        echo '<form class="friendform" method="post">';
        echo '<button class="friendform_button" type="submit" name="request">Thêm bạn bè</button>';
        echo'</form>';
    } 
}
//echo '<center>'; 
//echo'</div>';
?>