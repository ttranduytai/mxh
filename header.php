<!--top bar-->
<?php 

	$corner_image = "images/user_male.jpg";
	if(isset($USER)){
		
		if(file_exists($USER['profile_image']))
		{
			$image_class = new Image();
			$corner_image = $image_class->get_thumb_profile($USER['profile_image']);
		}else{

			if($USER['gender'] == "Female"){

				$corner_image = "images/user_female.jpg";
			}
		}
	}
?>
<style>a{text-decoration: none;}a:hover{text-decoration: underline;}.chuyentrang{background-color: white!important;border: 1px solid black!important;color: black!important;font-size: 17px!important;border-radius: 10px!important;}</style>
<div id="blue_bar" style="display:flex;justify-content:center;align-items:center">
	<form method="get" action="search">
		<div style="margin:auto;font-size: 30px;">
			
			<a href="<?=ROOT?>home" style="text-decoration:none;color: white;">MXH</a> 
			<input type="text" id="search_box" name="find" placeholder="Tìm kiếm trên MXH" />

			<?php if(isset($USER)): ?>
				<a href="<?=ROOT?>profile">
				<img src="<?php echo ROOT . $corner_image ?>" style="border-radius:100%;width: 50px;float: right;">
				</a>
				<a href="<?=ROOT?>logout">
				<span style="font-size:11px;float: right;margin:10px;color:white;">Đăng xuất</span>
				</a>

				<a href="<?=ROOT?>notifications" style="color:#405d9b">
				<span style="display: inline-block;position: relative;">
					<img src="<?= ROOT ?>notif.svg" style="width:25px;float:right;margin-top: 10px">
					<?php 
						$notif = check_notifications();
					?>
					<?php if($notif > 0): ?>
						<div style="background-color: red;color: white;position: absolute;right:-15px;
						width:15px;height: 15px;border-radius: 50%;padding: 4px;text-align:center;font-size: 14px;"><?= $notif ?></div>
					<?php endif; ?>
				</span>
				</a>

				<a href="<?=ROOT?>messages">
				<span style="display: inline-block;position: relative;margin-left: 10px;">
 					<svg fill="orange" style="float:right;margin-top: 10px" width="25" height="25" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>
					<?php 
						$notif = check_messages();
					?>
					<?php if($notif > 0): ?>
						<div style="background-color: red;color: white;position: absolute;right:-15px;
						width:15px;height: 15px;border-radius: 50%;padding: 4px;text-align:center;font-size: 14px;"><?= $notif ?></div>
					<?php endif; ?>
				</span>
				</a>

				

			
			<?php endif; ?>


		</div>
	</form>
</div>