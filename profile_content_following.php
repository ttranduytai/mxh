<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="display:flex;padding: 20px;width:200px;margin:0 auto">
	<?php
 
		$image_class = new Image();
		$post_class = new Post();
		$user_class = new User();

		$following = $user_class->get_following($user_data['userid'],"user");

		if(is_array($following)){

			foreach ($following as $follower) {
				# code...
				$FRIEND_ROW = $user_class->get_user($follower['userid']);
				include("user.php");
			}

		}else{

			echo "Bạn chưa theo dõi ai cả.";
		}


	?>

	</div>
</div>