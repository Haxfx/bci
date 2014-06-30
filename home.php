<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/lib/app/css/main.css">
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

				jQuery('.resultOne').click(function(event) {
					event.preventDefault();
					var summonerName = jQuery(this).find(".summonerName").val();
					$('.resultsProfile').html('<h3>'+summonerName+'</h3>');
					return false;
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
	<div class="headerImageWrapper">
		<div class="headerArrowOne">
		</div>
		<div class="headerArrowTwo">
		</div>
		<div class="inner">
			<div class="imageSlider" style="background: url(images/bannerOne.png) no-repeat;background-size: 100%; background-position: center;">
				<div class="headerImageContent">
					<div class="headerImageTitle">
						<h1 class="headerTitle">Looking for a Team?</h1>
					</div>
					<div class="headerImageSubTitle">
						<h3 class="headerSubTitle">Join the best team searching website for free!</h3>
					</div>
					<div class="headerImageSignup">
						<h3 class="headerSignup">Sign up here!</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="searchWrapper">
		<div class="inner">
			<div class="searchHeader">
				Where are you looking for?
			</div>
			<div class="searchFilter">
				<div class="formSelect">
					<ul class="formOption">
						<li class="formOptionOne">
							<span class="duoButton basicButton">Duo Ranked</span>
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
					<?php
					$counter = 0;
					while($counter++ < 10){
						if ($counter % 2) { 
					        ?>
							<div class="resultOne styleResults">
								<div class="profileIcon">
									<img src="/images/profile-icons/4.png" alt="Profile icon" class="profileIconImage"/>
								</div>
								<div class="profileInfo short">
									<span class="name first text short">Hekker</span>
									<span class="role second text short">Support</span>
								</div>
								<div class="profileInfo">
									<span class="server first text long">EUW</span>
									<span class="date second text long">Last updated: 12-04-2014</span>
								</div>
								<div class="profileDivision">
									<img src="http://lkimg.zamimg.com/images/medals/challenger_1.png" alt="Profile icon" class="divisionIconImage"/>	
								</div>
								<input type="hidden" class="summonerName" value='Hekker'/>
								<input type="hidden" class="summonerRole" value='Support'/>
								<input type="hidden" class="summonerDivision" value='Challenger'/>
								<input type="hidden" class="mainChamp1" value='Harry'/>
								<input type="hidden" class="mainChamp2" value='Leona'/>
								<input type="hidden" class="mainChamp3" value='Thresh'/>
								<input type="hidden" class="summonerServer" value='EUW'/>
							</div>
							<?php
					    } 
					    else 
					    { 
					        ?>
							<div class="resultOne styleResults">
								<div class="profileIcon">
									<img src="/images/profile-icons/4.png" alt="Profile icon" class="profileIconImage"/>
								</div>
								<div class="profileInfo short">
									<span class="name first text short">HFX</span>
									<span class="role second text short">Jungler</span>
								</div>
								<div class="profileInfo">
									<span class="server first text long">EUW</span>
									<span class="date second text long">Last updated: 15-04-2014</span>
								</div>
								<div class="profileDivision">
									<img src="http://lkimg.zamimg.com/images/medals/diamond_1.png" alt="Profile icon" class="divisionIconImage"/>	
								</div>
								<input type="hidden" class="summonerName" value='HFX'/>
								<input type="hidden" class="summonerRole" value='Jungler'/>
								<input type="hidden" class="summonerDivision" value='Diamond 1'/>
								<input type="hidden" class="mainChamp1" value='LeeSin'/>
								<input type="hidden" class="mainChamp2" value='Leona'/>
								<input type="hidden" class="mainChamp3" value='Thresh'/>
								<input type="hidden" class="summonerServer" value='EUW'/>
							</div>
							<?php
					    }
					}
					?>
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
	<div class="newsWrapper" name="news">
		<div class="inner">
			<div class="newsHeader">
				News and Updates
			</div>
		<div class="newsArticle">
			<div class="newsContent">
				<h3>The new team searching system is aslmost ready!!</h3>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet.
			</div>
			<div class="newsImage">
				<img class="newsImageSource" src="images/newsimage.png">
			</div>
		</div>
		</div>
	</div>
	<div class="footerWrapper">
		<div class="inner">
			<div class="footerContent">
				<div class="footerOne">
					<h2>About Teamfinder</h2>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
				</div>
				<div class="footerTwo">
					<h2>About Teamfinder</h2>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
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