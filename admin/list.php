<?php
include 'conn.php';
include 'session.php';

if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	$insert = "insert into users (first_name,last_name) values ('$fname','$lname')";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:list.php');
	}else{

		echo "Ooppss cannot add data" . $conn->connect_error;
		header('location:list.php');
	}
	$insert->close();
}
?>

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
				<form action="result.php" method="get" ecntype="multipart/data-form">
						<table align="center">
							<tr>
								<td>Tìm kiếm: <input type="text" name="query"><input type="submit" value="Search" name="search"></td>
							</tr>
						</table>
				</form>
				<form action="list.php" method="POST">
				<table align="center">
					<tr>
						<td>Họ: <input type="text" name="fname" value="" placeholder="Type Firstname here" required></td>
						</tr>
						<tr>
							<td>Tên: <input type="text" name="lname" placeholder="Type Last Name here.." required></td>
						</tr>
						<tr>
							<td><input type="submit" name="add" value="Add"></td>
						</tr>
				</table>
			</form>
				<br>
				<table align="center" border="1" cellspacing="0" width="500">
					<tr>
					<th>Id</th>
					<th>Họ</th>
					<th>Tên</th>
					<th>Email</th>
					<th>Giới tính</th>
					<th>Loại</th>
					<th>Thao tác</th>
					</tr>
					<?php
					$sql = "SELECT * FROM users order by id desc";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td align="center"><?php echo $row['id'];?></td>
							<td align="center"><?php echo $row['first_name'];?></td>
							<td align="center"><?php echo $row['last_name'];?></td>
							<td align="center"><?php echo $row['email'];?></td>
							<td align="center"><?php echo $row['gender'];?></td>
							<td align="center"><?php echo $row['type'];?></td>
							<td align="center"><a href="edit.php?id=<?php echo $row['id'];?>">Sửa
							</a>/<a href="delete.php?id=<?php echo $row['id'];?>">Xóa</a></td>
						</tr>
						<?php
							}	
						}else{
							echo "<center><p> No Records</p></center>";
						}
				
				$conn->close();
				?>
				</table>
			</div>
		</div>
		</body>

</html>