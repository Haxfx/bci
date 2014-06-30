<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lib/app/css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;

				document.getElementById("email").setCustomValidity("Fill in a correct emailadress");

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
	<?php include('includes/included_files.php');

	if(isset($_POST['name'])){
		if($_POST['name']){
			$reciever = '67083@glr.nl';
			$name = $_POST['name'];
			$from = $_POST['email'];
			$issue = $_POST['issue'];
			$message = $_POST['message'];

			$emailMessage = '<h3>Message from Teamup</h3><br /><strong>From:</strong><br />'.$name.'<br /><br /><strong>Issue:</strong><br />'.$issue.'<br /><br /><strong>Message:</strong><br />'.$message;

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: '.$from. "\r\n";
		    mail($reciever,$issue,$emailMessage,$headers);
		    $messageComplete = 'Thank you for your message. We will take care of it within the next 24 hours.';
		}
	}
	?>
<div class="mainWrapper">
	<?php include('includes/menu.php'); ?>
	<div class="clearBoth"></div>
	<div class="contactWrapper">
		<div class="inner">
			<div class="contactHeader">
				Contact us!
			</div>
			<div class="contactInfo">
				<?php if(isset($messageComplete)){ echo $messageComplete; }else{ echo 'Having trouble using the team up website or want to help us improve our team searching system. We are always looking at new ways to improve your team up experience, so feedback is welcome!'; }?>
			</div>
			<div class="formStylo">
				<form class="contactForm" method="post" action="#">
					<label class="formLabel">Your name:</label>
					<input class="inputFields" type="text" name="name" placeholder="Warrick" required/>
					<label class="formLabel">E-mail*:</label>
					<input class="inputFields" type="text" name="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"value="<?php if(isset($email)){echo $email;} ?>" required/>
					<label class="formLabel">Issue</label>						
					<select class="selectBox" name="issue">
						<option value="Trouble logging in">Trouble logging in</option>
						<option value="Username bieng abused">Username bieng abused</option>
						<option value="Report a bug">Report a bug</option>
						<option value="Feedback">Feedback</option>
						<option value="Other..">Other..</option>
					</select>
			</div>
			<div class="formStylo formStyloRight">
						<label class="formLabel">Your message:</label>
						<textarea rows="5" cols="80" class="inputFieldsLarge" name="message" placeholder="Tell us about your problem or feedback about team up..."></textarea>
					<input class="contactButtonForm" type="submit" value="SEND" name="filter"/>
				</form>
			</div>
		</div>
	</div>
	<div class="footerWrapper">
		<div class="inner">
			<div class="footerContent">
				<div class="footerOne">
					<h2>About Teamfinder</h2>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet.
				</div>
				<div class="footerTwo">
					<h2>About Teamfinder</h2>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet.
				</div>
				<div class="footerThree">
					<h2>Follow Us. </h2>
					<a href="http://www.facebook.com" target="_blank"><img src="images/facebookLogo.png"></a>
					<a href="http://www.twitter.com" target="_blank"><img src="images/twitterLogo.png"></a>
					<a href="http://www.facebook.com" target="_blank"><img src="images/facebookLogo.png"></a>
				</div>
			</div>
		</div>
		<a href="#" class="back-to-top">Back to Top</a>
	</div>

</div>
</body>
</html> 