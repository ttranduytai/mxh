<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="display:flex;padding: 20px;width:200px;margin:0 auto">
	<?php
 
		$image_class = new Image();
		$post_class = new Post();
		$user_class = new User();

		$followers = $post_class->get_likes($user_data['userid'],"user");

		if(is_array($followers)){

			foreach ($followers as $follower) {
				# code...
				$FRIEND_ROW = $user_class->get_user($follower['userid']);
				include("user.php");
			}

		}else{

			echo "Chưa có người nào theo dõi bạn.";
		}


	?>

	</div>
</div>