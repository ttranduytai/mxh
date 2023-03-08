<?php 

	include("classes/connect.php");
	include("classes/signup.php");

	$first_name = "";
	$last_name = "";
	$gender = "";
	$email = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$signup = new Signup();
		$result = $signup->evaluate($_POST);
		
		if($result != "")
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}else
		{

			header("Location:login");
			die;
		}
 

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];

	}


	

?>

<html> 

	<head>
		
		<title>Đăng ký</title>
	</head>

	<style>
		body{font-family:nunito;display:flex;justify-content:center;align-items:center;background-color:#f0f2f5}
		#bar{
			
		}

		#signup_button{
			display: block;
			margin-top:10px;
			color:#1877f2;
			text-align:center;
			text-decoration:none;
		}
		#signup_button:hover{
			text-decoration:underline;
		}

		#bar2{

		}

		#text{

			height: 40px;
			width: 300px;
			border-radius: 4px;
			border:solid 1px #ccc;
			padding: 4px;
			font-size: 14px;
		}

		#button{
			cursor:pointer;
			width: 300px;
			height: 40px;
			border-radius: 5px;
			font-weight: bold;
			border:none;
			background-color: #1877f2;
			color: white;
			font-size:unset;
		}
		#button:hover{background-color:#166fe5}
		.fill:focus{outline: 1px solid #166fe5}
	</style>

	<body style="font-family: tahoma;background-color: #e9ebee;">
		
		<div id="bar">

		</div>

		<div id="bar2">
		<div style="font-size: 40px;text-align:center">MXH</div>
			<div style="margin:10px 0">Đăng ký</div>
			
			<form method="post" action="">

				<input class="fill" value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="Họ"><br><br>
				<input class="fill" value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Tên"><br>

				<div style="margin:10px 0">Giới tính:</div>
				<select class="fill" id="text" name="gender">
					
					<option><?php echo $gender ?></option>
					<option>Male</option>
					<option>Female</option>

				</select>
				<br><br>
				<input class="fill" value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>
				
				<input class="fill" name="password" type="password" id="text" placeholder="Mật khẩu"><br><br>
				<input class="fill" name="password2" type="password" id="text" placeholder="Nhập lại mật khẩu"><br><br>

				<input type="submit" id="button" value="Đăng ký">
				<a id="signup_button" href="login.php">
				<div>Đăng nhập</div>
				</a>

			</form>

		</div>

	</body>


</html>