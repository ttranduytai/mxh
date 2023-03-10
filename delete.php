<?php
    // unset($_SESSION['vietbook_userid']);
    //print_r($_SESSION);

    include("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['mybook_userid']);

    $USER = $user_data;
    
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);

        if(is_array($profile_data)){
            $user_data = $profile_data[0];
        }
    }

    $Post = new Post();
	$msg_class = new Messages();

    if(isset($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'], "delete.php")){
        $_SESSION['return_to'] = $_SERVER['HTTP_REFERER'];
    }

    $ERROR = "";
	if(isset($_GET['id'])){

		if($_GET['id'] == "msg")
		{
			$MESSAGE = $msg_class->read_one($URL[2]);

			 if(!$MESSAGE){

			 	$ERROR = "Accesss denied! you cant delete this message!";
			 }
		}else
		if($_GET['id'] == "thread")
		{
			$MESSAGE = false;

			if(isset($URL[2])){
				$MESSAGE = $msg_class->read_one_thread($URL[2]);
			}
			if(!$MESSAGE){

			 	$ERROR = "Accesss denied! you cant delete this thread!";
			}
		
		}else{

	 		 $ROW = $Post->get_one_post($_GET['id']);

			 if(!$ROW){

			 	$ERROR = "No such post was found!";
			 }else{

			 	if($ROW['userid'] != $_SESSION['mybook_userid']){

			 		$ERROR = "Accesss denied! you cant delete this file!";
			 	}
			 }
		 }

	}else{

		$ERROR = "No such post was found!";
	}


	//if something was posted
	if($ERROR == "" && $_SERVER['REQUEST_METHOD'] == "POST"){

		if($_GET['id'] == "msg")
		{
			$msg_class->delete_one($_POST['id']);

		}else
		if($_GET['id'] == "thread")
		{
			$msg_class->delete_one_thread($_POST['id']);
 		
		}else{

			$Post->delete_post($_POST['postid']);
			
		}

		header("Location: ".$_SESSION['return_to']);
		die;		

	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Xóa</title>
	</head>

	<style type="text/css">
		
		#blue_bar{

height: 50px;
background-color: #405d9b;
color: #d9dfeb;
position:fixed;
top:0;
left:0;
right:0;
}

		#search_box{

			width: 400px;
			height: 20px;
			border-radius: 5px;
			border:none;
			padding: 4px;
			font-size: 14px;
			/*background-image: url(search.png);*/
			background-repeat: no-repeat;
			background-position: right;

		}

		#profile_pic{

			width: 150px;
			border-radius: 50%;
			border:solid 2px white;
		}

		#menu_buttons{

			width: 100px;
			display: inline-block;
			margin:2px;
		}

		#friends_img{

			width: 75px;
			float: left;
			margin:8px;

		}

		#friends_bar{

			min-height: 400px;
			margin-top: 20px;
			padding: 8px;
			text-align: center;
			font-size: 20px;
			color: #405d9b;
		}

		#friends{

		 	clear: both;
		 	font-size: 12px;
		 	font-weight: bold;
		 	color: #405d9b;
		}

		textarea{

			width: 100%;
			border:none;
			font-family: tahoma;
			font-size: 14px;
			height: 60px;

		}

		#post_button{

			float: right;
			background-color: #405d9b;
			border:none;
			color: white;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
		}
 
 		#post_bar{

 			margin-top: 20px;
 			background-color: white;
 			padding: 10px;
 		}

 		#post{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin-bottom: 20px;
 		}

 		#message_left{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
 			width: 60%;
 			float: left;
 			border-radius: 10px;
 		}

	</style>

	<body style="font-family:nunito;background-color:#f0f2f5;margin:0">

		<br>
		<?php include("header.php"); ?>

		<!--cover area-->
		<div style="width: 1200px;margin:auto;min-height: 400px;">
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="margin-top:50px;border:1px solid gray;border-radius:5px;; padding: 10px;background-color: white;">

  						<form method="post">
 							
  								<?php

 									if($ERROR != ""){

								 		echo $ERROR;
								 	}else{

								 		if(isset($URL[1]) && $URL[1] == "msg")
										{

		  									echo "Bạn chắc chắn muốn xóa?<br>";

											$user = new User();
		 									$ROW_USER = $user->get_user($MESSAGE['sender']);
		 									
		  									include("message_left.php");

		  									echo "<input type='hidden' name='id' value='$MESSAGE[id]'>";
		 									echo "<input id='post_button' type='submit' value='Xóa'>";
		 								}else
	 									if(isset($URL[1]) && $URL[1] == "thread")
										{

		  									echo "Bạn chắc chắn muốn xóa?<br>";

											$user = new User();
		 									$ROW_USER = $user->get_user($MESSAGE['sender']);
		 									
		  									include("message_left.php");

		  									echo "<input type='hidden' name='id' value='$MESSAGE[msgid]'>";
		 									echo "<input id='post_button' type='submit' value='Xóa'>";
	 									
										}else
										{

		  									echo "Bạn chắc chắn muốn xóa?<br>";

											$user = new User();
		 									$ROW_USER = $user->get_user($ROW['userid']);
		 									
		  									include("post_delete.php");

		  									echo "<input type='hidden' name='postid' value='$ROW[postid]'>";
		 									echo "<input id='post_button' type='submit' value='Xóa'>";
	 									
										}
 									}
 								?>
  							
	 						
	 						<br style="clear: both;">
 						</form>
 					</div>
  

 				</div>
			</div>

		</div>

	</body>
</html>