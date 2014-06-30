<?php

$error = 'This field is required!';

if(isset($_POST['email'])){

	$summonerName = $_POST['summonername'];
	$role = $_POST['roleSelect'];
	$secondRole = $_POST['roleSelectSecond'];
	$comSelect = $_POST['comSelect'];
	$language = $_POST['language'];
	$secondlanguage = $_POST['secondlanguage'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmpassword'];
	$email = $_POST['email'];

	if($username === '' || $language === '' || $password === '' || $confirmPassword === '' || $email === ''){
			// if($password === $confirmPassword){
			// 	echo 'password komt overeen';
			// }else{
			// 	echo 'zegt dat de passworden niet gelijk zijn';
			// }

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lib/app/css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top').fadeIn(duration);
					} else {
						jQuery('.back-to-top').fadeOut(duration);
					}
				});
				
				jQuery('.back-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})

				$(window).scroll(function() {
					var scroll = $(window).scrollTop();
					if (scroll >= 228) {
						$(".headerMenuWrapper").addClass("scrolled");
						$(".headerMenuWrapper").removeClass("scrolling");
					} else {
						$(".headerMenuWrapper").removeClass("scrolled");
						$(".headerMenuWrapper").addClass("scrolling");
					}
				})
			});
			function loginWindow(){

					if(document.getElementById('light').style.display == 'block'){
						document.getElementById('light').style.display = 'none';
						$( ".linkLogin" ).html('Log in');
					}else{
						document.getElementById('light').style.display = 'block';
						$( ".linkLogin" ).html('Close');
					}
				}
	</script>
</head>
<body>
<div class="mainWrapper">
	<div class="headerMenuWrapper scrolling">
		<div class="inner">
			<div class="menu">
				<ul class="menuList">
					<li class="menuButton">
						<a href="" class="mainMenuButton">Home</a>
					</li>
					<li class="menuButton">
						<a href="#news" class="mainMenuButton">News</a>
					</li>
					<li class="menuButton">
						<a href="" class="mainMenuButton">Search</a>
					</li>
					<li class="menuButton">
						<a href="" class="mainMenuButton">About</a>
					</li>
					<li class="menuButton">
						<a href="" class="mainMenuButton">Contact</a>
					</li>
				</ul>
				<div class="menuLogin">
					<a class="linkLogin" onclick="loginWindow()">Log in</a>
					<div id="light" class="formStyle">Log in here.
						<label class="gameLabel">Username: </label>
						<input type="text" class="inputField" value="" />
						<label class="gameLabel">Password: </label>
						<input type="password" class="inputField" value="" />
						<input type="checkbox" name="remember_me" id="remember_me">Remember me on this computer
						<input class="basic-grey"type="submit" value="Log in"/>
						<a onclick="loginWindow()">Close</a>
					</div>
					<div id="fade" class="black_overlay"></div>
					<a href="register.html" class="menuLoginSignup">Sign up</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearBoth"></div>
	<div class="registerWrapper">
		<div class="inner">
			<div class="registerHeader">
				Register Here!
			</div>
			<div class="registerInfo">
				Register here to make us of one of the best Team and Duo searching website. The system provides an easy way to make a perfect match for you.
			</div>
			<div class="formStylo">
				<form class="registerForm" method="post" action="test.php">
					<label class="formLabel">Summoner name*: </label>
					<input class="inputFields" type="text" name="summonername" value="<?php echo $summonerName; ?>" required/>
					<label class="formLabel">Main role:</label>						
					<select class="selectBox" name="roleSelect">
						<option value="top" <?php if($role == 'top'){ echo 'selected';}?>>Top</option>
						<option value="jungle" <?php if($role == 'jungle'){ echo 'selected';}?>>Jungle</option>
						<option value="mid" <?php if($role == 'mid'){ echo 'selected';}?>>Mid</option>
						<option value="adc" <?php if($role == 'adc'){ echo 'selected';}?>>ADC</option>
						<option value="support" <?php if($role == 'support'){ echo 'selected';}?>>Support</option>
					</select>
					<label class="formLabel">Second role:</label>						
					<select class="selectBox" name="roleSelectSecond">
						<option value="top" <?php if($secondRole == 'top'){ echo 'selected';}?>>Top</option>
						<option value="jungle" <?php if($secondRole == 'jungle'){ echo 'selected';}?>>Jungle</option>
						<option value="mid" <?php if($secondRole == 'mid'){ echo 'selected';}?>>Mid</option>
						<option value="adc" <?php if($secondRole == 'adc'){ echo 'selected';}?>>ADC</option>
						<option value="support" <?php if($secondRole == 'support'){ echo 'selected';}?>>Support</option>
					</select>
					<label class="formLabel">Voice program:</label>
					<select class="selectBox" name="comSelect">
							<option value="yes" <?php if($comSelect == 'yes'){ echo 'selected';}?>>Yes</option>
							<option value="no" <?php if($comSelect == 'no'){ echo 'selected';}?>>No</option>
						</select>
						<label class="formLabel">Language*:</label>
						<input class="inputFields" type="text" name="language" placeholder="English" value="<?php echo $language; ?>"/>
						<label class="formLabel">Second language:</label>
						<input class="inputFields" type="text" name="secondlanguage" placeholder="Dutch" value="<?php echo $secondlanguage; ?>"/>
			</div>
			<div class="formStylo">
						<label class="formLabel">Username*:</label>
						<input class="inputFields" type="text" name="username" value="<?php echo $username; ?>"/>
						<label class="formLabel">Password*:</label>
						<input class="inputFields" type="password" name="password" value="<?php echo $password; ?>"/>
						<label class="formLabel">Comfirm password*:</label>
						<input class="inputFields" type="password" name="confirmpassword" value="<?php echo $confirmPassword; ?>"/>
						<label class="formLabel">E-mail*:</label>
						<input class="inputFields" type="text" name="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"value="<?php echo $email; ?>"/>
					<input class="buttonForm" type="submit" value="REGISTER" name="submit"/>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html> 
<?php
	}else{
		echo 'Je hebt alle velden ingevult';
	}
}else{
	echo 'geen isset gevonden';
}
?>