<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'session.php';
$username = $_SESSION['username'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			ADMIN
		</title>
		</head>
	<body>
		<div id="body">
			<div id="menu">
			<ul>
				<li><a href="home.php">Trang chủ</a></li>
				<li><a href="list.php">Danh sách</a></li>
				<li><a href="logout.php">Đăng xuất</a></li>
			</ul>
			</div>

			<div id="content">
			
			<h1>Welcome <?php echo $username;?></h1>
				<h3 style="color:blue;"><?php echo "". date("d.m.Y") . " - " . date("l") . ""?> - <?php echo "" . date("h:i:sa") . ""?></h3>
				
				<hr style="border:1px solid red;" >
				
				

			</div>

		
		</div>
		</body>

</html>