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
	<?php include('includes/menu.php'); ?>
	<div class="clearBoth"></div>
	<div class="searchPageWrapper">
		<div class="inner">
			<div class="searchPageHeader">
				Where are you looking for?
			</div>
			<div class="searchPageFilter">
				<div class="formText">
					Search here for a duo partner, player for in your team, 3v3 or a 5v5 team! Just fill in the form and we will do the rest for you.
				<div class="formSelect">
					<ul class="formOption">
						<li class="formOptionOne">
							<span class="duoButton basicButton">Duo Ranked</span>
						</li>
						<li class="formOptionTwo">
							<span class="fivesButton basicButton">Team Player</span>
						</li>
						<li class="formOptionTwo">
							<span class="fivesButton basicButton">Ranked 5v5</span>
						</li>
						<li class="formOptionThree">
							<span class="threesButton basicButton">Ranked 3v3</span>
						</li>
					</ul>
				</div>
				<div class="formDuoDiv">
					<div class="contentHeaderText"><h3>What are you looking for?</h3></div>
					<form class="formDuo">
					</label>
						<select class="serverSelect basicSelect" placeholder="select server">
	   						<option class="test" value="">select server</option>
							<option class="test" value="euw">EUW</option>
							<option class="test" value="eune">EUNE</option>
							<option class="test" value="na">NA</option>
							<option class="test" value="turkey">TR</option>
							<option class="test" value="oce">OCE</option>
						</select>
						<select class="roleSelect basicSelect" name="role">
							<option value="0">Looking for</option>
							<option value="top">Top</option>
							<option value="jungle">Jungle</option>
							<option value="mid">Mid</option>
							<option value="adc">ADC</option>
							<option value="support">Support</option>
						</select>
						<select class="divisionSelect basicSelect" name="division">
							<option value="0">Division</option>
							<option value="challenger">Challenger</option>
							<option value="diamond">Diamond</option>
							<option value="platinum">Platinum</option>
							<option value="gold">Gold</option>
							<option value="silver">Silver</option>
							<option value="bronze">Bronze</option>
						</select>
					</label>
						<input type="submit" value="filter" name="filter"/>
					</form>
				</div>
			</div>
			<div class="innerResults">
				<div class="searchResults">
					<div class="resultOne styleResults">
					</div>
					<div class="resultTwo styleResults">
					</div>
					<div class="resultThree styleResults">
					</div>
					<div class="resultFour styleResults">
					</div>
					<div class="resultFive styleResults">
					</div>
					<div class="resultSix styleResults">
					</div>
					<div class="resultSeven styleResults">
					</div>
					<div class="resultEight styleResults">
					</div>
				</div>
				<div class="resultsProfile">
				</div>
			</div>
			<div class="contentTextOne">
			</div>
			<div class="contentTextTwo">
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