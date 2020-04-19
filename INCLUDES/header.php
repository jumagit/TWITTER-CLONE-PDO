<?php

if (isset($_GET['username'])) {

    include 'CORE/init.php';
    $username = $getFromU->checkInput($_GET['username']);
    $profileId = $getFromU->userIdByUsername($username);
    $profileData = $getFromU->userData($profileId);
    $user_id = $_SESSION['user_id'];
    $user = $getFromU->userData($user_id);

    if (!$profileData) {
        header("Location:index.php");
    }
}

?>


<!--
   This template created by Meralesson.com
   This template only use for educational purpose
-->
<!doctype html>
<html>
	<head>
		<title>twitter</title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="<?php echo BASE_URL; ?>ASSETS/CSS/style-complete.css"/>
   		<link rel="stylesheet" href="<?php echo BASE_URL; ?>ASSETS/CSS/css/font-awesome.css"/>
		
		<script src="<?php echo BASE_URL; ?>ASSETS/JS/jquery.min.js"></script>
		<script src="<?php echo BASE_URL; ?>ASSETS/JS/bootstrap.min.js" ></script>

    </head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	<div class="nav-container">
    	<div class="nav">
		<div class="nav-left">
			<ul>
				<li><a href="<?php echo BASE_URL; ?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
				<li><a href="<?php echo BASE_URL; ?>notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li>
				<li><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li>

			</ul>
		</div><!-- nav left ends-->
		<div class="nav-right">
			<ul>
				<li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result">
					</div>
				</li>

				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL . $user->profileImage; ?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							 <li><a href="<?php echo BASE_URL . $user->username; ?>"><?php echo $user->username; ?></a></li>
							<li><a href="<?php echo BASE_URL; ?>settings/account">Settings</a></li>
							<li><a href="<?php echo BASE_URL; ?>includes/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
				</li>
				<li><label for="pop-up-tweet" class="addTweetBtn">Tweet</label></li>
			</ul>
		</div><!-- nav right ends-->

	</div><!-- nav ends -->
	</div><!-- nav container ends -->
</div><!-- header wrapper end -->

