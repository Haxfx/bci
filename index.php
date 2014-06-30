<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="League of Legends Player and Team Searching Platform">
	<meta name="keywords" content="League of Legends Player and Team Searching Platform">
	<meta name="author" content="TeamUp">
	<!-- Stylesheet wordt ingeladen -->
	<link rel="stylesheet" type="text/css" href="/lib/app/css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<!-- Zelfgeschreven javascript bestand wordt ingeladen -->
	<script src="/lib/app/js/scripts.js"></script>
	<!-- Libraries voor de slideshow superslides wordt ingeladen -->
	<script src="/lib/superslides/jquery.easing.1.3.js"></script>
  	<script src="/lib/superslides/jquery.animate-enhanced.min.js"></script>
	<script src="/lib/superslides/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<?php 
		// Alle included bestanden worden ingeladen
		// config.php
		// functions.php
		include('includes/included_files.php'); 
	?>
<div class="mainWrapper">
	<?php 
		// Menu wordt ingeladen
		include('includes/menu.php'); 
	?>
	<div class="headerImageWrapper" id="Home">
		<div class="headerArrowOne">
		</div>
		<div class="headerArrowTwo">
		</div>
		<div class="inner">
			<div class="full-container">
				<div class="left-container"></div>
				<div class="wide-container">
					<div class="imageSlider">
						<ul class="slides-container">
							<li>
								<img src="/images/slideshow/imageslide9.png" alt="Cinelli" />
							</li>
							<li>
								<img src="/images/slideshow/imageslide5.png" alt="Cinelli" />
							</li>
							<li>
								<img src="/images/slideshow/imageslide4.png" alt="Cinelli" />
							</li>
						</ul>
						<div class="headerImageContent">
							<div class="headerImageTitle">
								<h1 class="headerTitle">Looking to team up?</h1>
							</div>
							<div class="headerImageSubTitle">
								<h3 class="headerSubTitle">Join the best team searching website for free!</h3>
							</div>
							<div class="headerImageSignup">
								<h3 class="headerSignup"><a href="register.php">Sign up here!</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		// Image Slider met een fade effect, de breedte van de container en een snelheid van 4000miliseconde
	    $('.imageSlider').superslides({
	      	animation: 'fade',
	      	inherit_width_from: '.wide-container',
        	inherit_height_from: '.wide-container',
        	play: 4000
	    });
  	</script>
	<div class="searchWrapper" id="Search">
		<div class="inner">
			<div class="searchHeader">
				Search and find
			</div>
			<div class="searchFilter">
				<div class="formSelect">
				</div>
				<div class="formDuoDiv">
					<div class="contentHeaderText"><h3>What are you looking for?</h3></div>
					<form class="formDuo">
						<select class="serverSelect basicSelect" placeholder="select server" name="region">
	   						<option class="test" value="all">All Servers</option>
							<option class="test" value="euw">EUW</option>
							<option class="test" value="eune">EUNE</option>
							<option class="test" value="na">NA</option>
							<option class="test" value="tr">TR</option>
							<option class="test" value="oce">OCE</option>
						</select>
						<select class="roleSelect basicSelect" name="role">
							<option value="all">All Lanes</option>
							<option value="Top">Top</option>
							<option value="Jungle">Jungle</option>
							<option value="Middle">Middle</option>
							<option value="Marksman">Marksman</option>
							<option value="Support">Support</option>
						</select>
						<select class="divisionSelect basicSelect" name="division">
							<option value="all">All Divisions</option>
							<option value="Challenger">Challenger</option>
							<option value="Diamond">Diamond</option>
							<option value="Platinum">Platinum</option>
							<option value="Gold">Gold</option>
							<option value="Silver">Silver</option>
							<option value="Bronze">Bronze</option>
						</select>
					</form>
					<div class="counter">Results</div>
				</div>
			</div>
			<div class="innerResults">
				<div class="searchResults">
					<?php

					// Alle summoners uit de database halen met PDO
					try {
						$sqlSummoner = $dbh->prepare("	SELECT  	*
														FROM    	summoner
														ORDER BY 	summoner_name DESC
									    			");
					    $sqlSummoner->execute();
					    $resultSummoner = $sqlSummoner->fetchAll(PDO::FETCH_ASSOC);
						
						$countSummoner = $sqlSummoner->rowCount();
						    
				    } catch ( PDOException $e ) {
						echo $e->getMessage();
				    }

					// Counter op 0 zetten voor de while loop
				    $manualSummoner = 0;

				    // Voor elke summer die gevonden
				    while($manualSummoner < $countSummoner){

				    	// Divisie van de summoner wordt gebruikt om rankId variable aan te maken
				    	$rankId = $resultSummoner[$manualSummoner]['summoner_division'];

				    	// Naam van de divisie wordt op basis van het rankId uitgelezen
				    	$sqlDivision = $dbh->prepare("	SELECT  	*
														FROM    divisions
													    WHERE   division_id = :division_id
													    LIMIT 1");
				    	$sqlDivision->bindParam( ':division_id' , $rankId );
					    $sqlDivision->execute();
					    $resultDivision = $sqlDivision->fetch(PDO::FETCH_ASSOC);

					  	// Variable van de divisie naam
					    $resultRank = $resultDivision['division_rank'];

					    // Spaties worden uit de rank gehaald.
						$arrayRank = explode(' ',trim($resultRank));

						// Variables worden aangemaakt die gebruikt worden in het zoekveld
						$resultDivisionArray = $arrayRank[0];
						$divisionIcon = $resultDivision['division_icon'];
						$resultSummonerID = $resultSummoner[$manualSummoner]['summoner_id'];
						$resultSummonerDivision = $resultDivision['division_rank'];
						$resultRegion = $resultSummoner[$manualSummoner]['summoner_region'];
						$resultSummonerId = $resultSummoner[$manualSummoner]['summoner_id'];
						$resultRole = $resultSummoner[$manualSummoner]['summoner_role1'];
						$resultRole2 = $resultSummoner[$manualSummoner]['summoner_role2'];
						$resultSummonerName = $resultSummoner[$manualSummoner]['summoner_name'];

				    	?>
				    	<div class="resultOne styleResults regionView roleView divisionView <?php echo $resultDivisionArray ?> <?php echo $resultRegion ?> <?php echo $resultRole ?>">
							<div class="profileIcon">
								<img src="/images/profile-icons/4.png" alt="Profile icon" class="profileIconImage"/>
							</div>
							<div class="profileInfo short">
								<span class="name first text short"><?php echo $resultSummonerName; ?></span>
								<span class="role second text short"><?php echo $resultRole; ?></span>
							</div>
							<div class="profileInfo">
								<span class="server first text long"><?php echo $resultRegion; ?></span>
								<span class="date second text long">Last updated: 12-04-2014</span>
							</div>
							<div class="profileDivision">
								<img src="<?php echo $resultDivision['division_icon']; ?>" alt="Profile icon" class="divisionIconImage"/>	
							</div>

							<!-- Hidden fields worden aangemaakt om via jQuery het resultatenveld in te vullen wanneer erop geklikt wordt. -->
							<input type="hidden" class="summonerID" value="<?php echo $resultSummonerID; ?>"/>
							<input type="hidden" class="divisionIcon" value="<?php echo $divisionIcon; ?>"/>
							<input type="hidden" class="summonerName" value="<?php echo $resultSummonerName; ?>"/>
							<input type="hidden" class="summonerRole1" value="<?php echo $resultRole; ?>"/>
							<input type="hidden" class="summonerRole2" value="<?php echo $resultRole2; ?>"/>
							<input type="hidden" class="summonerDivision" value="<?php echo $resultSummonerDivision; ?>"/>
							<input type="hidden" class="lolkingProfile" value="http://www.lolking.net/summoner/<?php echo strtolower(preg_replace('/\s+/', '', $resultRegion)); ?>/<?php echo $resultSummonerId; ?>"/>
							<input type="hidden" class="mainChamp1" value="Harry"/>
							<input type="hidden" class="mainChamp2" value="Leona"/>
							<input type="hidden" class="mainChamp3" value="Thresh"/>
							<input type="hidden" class="summonerRegion" value="<?php echo $resultRegion; ?>"/>
						</div>
						<?php
				    	$manualSummoner++;
				    }
				?>
				</div>
				<div class="resultsProfile">
					<div class="resultFade">
						<h3 class="resultsH3">Click on one of the players to see more information about the player.</h3>
					</div>
				</div>
			</div>
			<div class="contentTextOne">
			</div>
			<div class="contentTextTwo">
			</div>
		</div>
	</div>
	<div class="newsWrapper" id="News">
		<div class="inner">
			<div class="newsHeader">
				News and Updates
			</div>
			<div class="newsArticle">
				<div class="newsContentBlock">
					<div class="newsImage">
						<img src="images/newsimage.png" class="newsImageSource">
					</div>
					<div class="newsContent">
						<h3>The deadline for the beta has been set!</h3>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.
					</div>
				</div>
				<div class="newsContentBlock">
					<div class="newsContent">
						<h3>New design has been launched!</h3>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.
					</div>
					<div class="newsImage">
						<img class="newsImageSource" src="images/newsimage.png">
					</div>
				</div>
				<div class="newsContentBlock">
					<div class="newsImage">
						<img src="images/newsimage.png" class="newsImageSource">
					</div>
					<div class="newsContent">
						<h3>The alpha version is finally finished!!</h3>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footerWrapper" id="Updates">
		<div class="inner">
			<div class="footerHeader">
				<div class="footerMain">
					<div class="footerBlock">
						<h3>Team up</h3>
						<span class="footerText"><a class="footerLinks" href="http://teamup.hotflux.nl/tos">Terms of Service</a></span>
						<span class="footerText"><a class="footerLinks" href="http://teamup.hotflux.nl/pp">Privacy Policy</a></span>
						<span class="footerText"><a class="footerLinks" href="http://teamup.hotflux.nl/contact">Contact us</a></span>
					</div>
					<div class="footerBlock">
						<h3>Rights</h3>
						 <span class="footerText"> Team up © 2014 All Rights Reserved.</span>
					 	 <span class="footerText"> Images © Riot Games Inc.</span>
					</div>
					<div class="footerBlock rightBlock">
						<h3>Follow Us</h3>
						<a class="footerIconLink" href="">
							<img class="footerImages" src="images/facebook.png" alt="facebook">
						</a>
						<a class="footerIconLink" href="">
							<img class="footerImages" src="images/twitter.png" alt="twitter">
						</a>
					</div>
				</div>
			</div>
		</div>
		<a href="#" class="back-to-top">Back to Top</a>
	</div>
</div>
</body>
</html> 