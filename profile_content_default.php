		<div style="display: flex;">	

				<!--friends area-->			
				<div style="min-height: 400px;flex:1;">
					
					<div style="border:1px solid gray;border-radius:5px;padding:10px" id="friends_bar">
						
						<span style="color:black">Đang theo dõi</span><br>
 
 						<?php 

 	 					 	if($friends)
 	 					 	{

 	 					 		foreach ($friends as $friend) {
 	 					 			# code...
 
 									$FRIEND_ROW = $user->get_user($friend['userid']);
 	 					 			include("user.php");
 	 					 		}
 	 					 	}
 	 			 

	 					 ?>

					</div>
					<div style="margin-top:10px">
            <div style="border:1px solid gray;border-radius:5px;padding:10px" id="friends_bar">
                <span style="color:black">Gợi ý theo dõi</span><br>
                <?php
                    if($suggest_friends){
                        foreach($suggest_friends as $FRIEND_ROW){
                            

                            include("user.php");
                        }
                    }
                ?>
            </div>
        </div>
				</div>

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
				 <div style="border:1px solid gray;border-radius:5px;padding:5px">

<form method="post" enctype="multipart/form-data">

	<textarea name="post" placeholder="<?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?> ơi, bạn đang nghĩ gì thế?"></textarea>
	<hr style="color:gray">
   <input type="file" name="file">
	<input id="post_button" type="submit" value="Đăng">
	<br>
</form>
</div>
 
	 				<!--posts-->
	 				<div style="border:1px solid gray;border-radius:5px;padding:5px" id="post_bar">
	 					
 	 					 <?php 

 	 					 	if($posts)
 	 					 	{

 	 					 		foreach ($posts as $ROW) {
 	 					 			# code...

 	 					 			$user = new User();
 	 					 			$ROW_USER = $user->get_user($ROW['userid']);

 	 					 			include("post.php");
 	 					 		}
 	 					 	}
 	 			 
 	 					 	//get current url
 							$pg = pagination_link();
	 					 ?>
  	 					<div>
  	 					<a href="<?= $pg['next_page'] ?>">
	 					 <input class="chuyentrang" id="post_button" type="button" value=">" style="float: right;width:150px;">
	 					 </a>
	 					 <a href="<?= $pg['prev_page'] ?>">
	 					 <input class="chuyentrang" id="post_button" type="button" value="<" style="float: left;width:150px;">
	 					 </a>
						</div>
	 				</div>

 				</div>
			</div>