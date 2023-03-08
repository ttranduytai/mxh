<?php
include 'conn.php';
include 'session.php';

$id = $_GET['id'];
$view = "SELECT * from users where id = '$id'";
$result = $conn->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$fn = $_POST['fname'];
	$ln = $_POST['lname'];

	$insert = "UPDATE users set first_name = '$fn', last_name = '$ln' where id = '$ID'";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:list.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:list.php');
	}
	$conn->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			ADMIN
		</title>
		</head>
	<body bgcolor="green">
		<div id="body">
			<div id="menu">
			<ul>
				<li><a href="home.php">Trang chủ</a></li>
				<li><a href="list.php">Danh sách</a></li>
				<li><a href="logout.php">Đăng xuất</a></li>
			</ul>
			</div>
			<div id="content">
				<form action="" method="POST">
				<table align="center">
					<tr>
						<td>Họ: <input type="text" name="fname" value="<?php echo $row['first_name'];?>" placeholder="Họ" required></td>
						</tr>
						<tr>
							<td>Tên: <input type="text" name="lname"  value="<?php echo $row['last_name'];?>" placeholder="Tên" required></td>
						</tr>
						<tr>
							<td><input type="submit" name="update" value="Update"></td>
						</tr>
				</table>
			</form>
				<br>
			
			</div>
		</div>
		</body>

</html>