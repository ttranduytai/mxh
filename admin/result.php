<?php
include 'conn.php';
include 'session.php';
if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	$insert = "insert into info_tbl (firstName,lastName) values ('$fname','$lname')";
	
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
			This is Sample
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
					<th>Họ</th>
					<th>Tên</th>
					<th>Thao tác</th>
					</tr>
					<?php
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from users where first_name like '%$query%' or last_name like '%$query%'";

						$result = $conn->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
								$fname = $row1['first_name'];
								$lname = $row1['last_name'];
		
						?>
						<tr>
							<td align="center"><?php echo $fname;?></td>
							<td align="center"><?php echo $lname;?></td>
							<td align="center"><a href="edit.php?id=<?php echo $row1['id'];?>">Edit
							</a>/<a href="delete.php?id=<?php echo $row1['id'];?>">Delete</a></td>
						</tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$conn->close();
				?>
				</table>
			</div>
		</div>
		</body>

</html>