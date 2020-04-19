<?php 


include 'CORE/init.php';
$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);
if ($getFromU->loggedIn() === false) {
    header('Location:' . BASE_URL . 'index.php');
}


if(isset($_POST['submit'])){

    if(!empty($_POST['currentPwd']) AND !empty($_POST['newPassword']) AND !empty($_POST['rePassword'])){

        $currentPwd = $_POST['currentPwd'];
        $newPassword = $_POST['newPassword'];
        $rePassword = $_POST['rePassword'];
        $error = array();

        if($getFromU->checkPassword($currentPwd) === false){

            $error['currentPwd'] = "Wrong Password";


        }else{

            if($newPassword != $rePassword){

                $error['rePassword'] = "Passwords do not match";
            }else if(strlen($rePassword) < 6){
                
                $error['newPassword'] = "Password is too Short";

            }else{

                $getFromU->update('users',$user_id,array('password'=>md5($rePassword)));
                header('Location:'.BASE_URL.$user->username);

            }


        }

    }else{

        $error['fields'] = "All fields are required";

    }
}

?>


<?php include('includes/header.php');  ?>
<!-- header ends -->
<div class="container-wrap">
	
<div class="lefter">
			<div class="inner-lefter">

				<div class="acc-info-wrap">
					<div class="acc-info-bg">
						<!-- PROFILE-COVER -->
						<img src="<?php echo BASE_URL . $user->profileCover; ?>"/>
					</div>
					<div class="acc-info-img">
						<!-- PROFILE-IMAGE -->
						<img src="<?php echo BASE_URL . $user->profileImage; ?>"/>
					</div>
					<div class="acc-info-name">
						<h3><?php echo $user->screenName; ?></h3>
						<span><a href="<?php echo $user->username; ?>">@<?php echo $user->username; ?></a></span>
					</div>
				</div><!--Acc info wrap end-->
			<!--Acc info wrap end-->
			
            <div class="option-box">
					<ul>
						<li>
							<a href="<?php echo BASE_URL; ?>settings/account" class="bold">
							<div>
								Account
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL; ?>settings/password">
							<div>
								Password
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
					</ul>
				</div>

		</div>
	</div><!--LEFTER ENDS-->
	
	<div class="righter">
		<div class="inner-righter">
			<div class="acc">
				<div class="acc-heading">
					<h2>Password</h2>
					<h3>Change your password or recover your current one.</h3>
				</div>
				<form method="POST">
				<div class="acc-content">
					<div class="acc-wrap">
						<div class="acc-left">
							Current password
						</div>
						<div class="acc-right">
							<input type="password" name="currentPwd"/>
							<span>
                            <?php  if(isset($error['currentPwd'])){
                                        echo $error['currentPwd'];
                                        }?>
							</span>
						</div>
					</div>

					<div class="acc-wrap">
						<div class="acc-left">
							New password
						</div>
						<div class="acc-right">
							<input type="password" name="newPassword" />
							<span>
                            <?php 
                             if(isset($error['newPassword'])){
                                        echo $error['newPassword'];
                                 }
                            ?>
							</span>
						</div>
					</div>

					<div class="acc-wrap">
						<div class="acc-left">
							Verify password
						</div>
						<div class="acc-right">
							<input type="password" name="rePassword"/>
							<span>
							<?php 
                             if(isset($error['rePassword'])){
                                        echo $error['rePassword'];
                                 }
                            ?>
							</span>
						</div>
					</div>
					<div class="acc-wrap">
						<div class="acc-left">
						</div>
						<div class="acc-right">
							<input type="Submit" name="submit" value="Save changes"/>
						</div>
						<div class="settings-error">
                        <?php  if(isset($error['fields'])){
                                        echo $error['fields'];
                                 }
                                        ?>
 						</div>	
					</div>
				 </form>
				</div>
			</div>
			<div class="content-setting">
				<div class="content-heading">
					
				</div>
				<div class="content-content">
					<div class="content-left">
						
					</div>
					<div class="content-right">
						
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!--RIGHTER ENDS-->
</div>
<!--CONTAINER_WRAP ENDS-->
</div>
<!-- ends wrapper -->
</body>
</html>

















