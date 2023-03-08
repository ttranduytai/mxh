<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['id'])){

		header('location:home.php');
	}

	if(isset($_POST['log'])){

		$user = $_POST['username'];
		$pass =  $_POST['pass'];

		$sql = "SELECT * FROM admin_user where username = '$user' and password = '$pass'";
		$result = $conn->query($sql);

		if($result-> num_rows > 0){
			while($row= $result->fetch_assoc()){
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];	

		
			}
			?>
			<script> alert('Xin chào, <?php echo $_SESSION['username']?>'); </script>
			<script>window.location='home.php';</script>
			<?php

		
			}else{
				echo "<center><p style=color:red;>Invalid username or password</p></center>";

		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<form action="index.php" method="POST">
<html>
	<center><h3>Đăng nhập admin:</h3></ceter>
	<table align="center" bgcolor="tan" width="200">
		<tr>
			<td>
				Tài khoản:
			</td>
			<td>
			<input type="text" name="username" required>
			</td>
		</tr>

		<tr>
			<td>
				Mật khẩu:
			</td>
				<td>
				<input type="password" name="pass" required>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" bgcolor="teal">
				<input type="submit" value="Đăng nhập" name="log">
			</td>
		</tr>
	</table>
</html>
</form>