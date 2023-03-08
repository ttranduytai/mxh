<?php 

session_start();

	include("classes/connect.php");
	include("classes/login.php");
 
	$email = "";
	$password = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$login = new Login();
		$result = $login->evaluate($_POST);
		
		if($result != "")
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}else
		{

			header("Location: profile");
			die;
		}
 

		$email = $_POST['email'];
		$password = $_POST['password'];
		

	}


	

?>

<html> 

	<head>
		
		<title>Đăng nhập</title>
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

	<body>
		
		<div id="bar">

			
		</div>

		<div id="bar2">
		<div style="font-size:40px;text-align:center">MXH</div>
			
			<form method="post">
				<div style="margin:10px 0">Đăng nhập</div>

				<input class="fill" name="email" value="<?php echo $email ?>" type="text" id="text" placeholder="Email"><br><br>
				<input class="fill" name="password" value="<?php echo $password ?>" type="password" id="text" placeholder="Mật khẩu"><br><br>

				<input type="submit" id="button" value="Đăng nhập">
				<a id="signup_button" href="signup.php">
				<div>Đăng ký</div>
				</a>
				<br><br><br>

			</form>
		</div>

	</body>


</html>