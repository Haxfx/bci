<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lib/app/css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script>            
			jQuery(document).ready(function() {
				function loginWindow(){

					if(document.getElementById('light').style.display == 'block'){
						document.getElementById('light').style.display = 'none';
						$( ".linkLogin" ).html('Log in');
					}else{
						document.getElementById('light').style.display = 'block';
						$( ".linkLogin" ).html('Close');
					}
				}
			});
	</script>
</head>
<body>
	<?php include('includes/included_files.php'); ?>
	<div class="mainWrapper">
		<?php include('includes/menu.php'); ?>
		<div class="clearBoth"></div>
		<?php
		// Controle of POST email bestaat
		if(isset($_POST['email'])){

			// Variables worden aangemaakt van de geposte velden
			$summonerName = strtolower(preg_replace('/\s+/', '', $_POST['summonername']));
			$summonerName = preg_replace('/\s+/', '', $summonerName);
			$summonerName = utf8_encode($summonerName);

			// API key voor het gebruik van CURL om de php objecten op te halen
			$api_key = '9cd74893-ceb6-4707-9fab-da02a0da17e4';

			// CURL url om de php objecten terug te krijgen
			$urlGetSummonerName = 'https://euw.api.pvp.net/api/lol/'.$_POST['region'].'/v1.4/summoner/by-name/'.$summonerName.'?api_key='.$api_key;

			// Functie aanroepen voor het ophalen van de summoner objecten in functions.php
			$summonerInfo = getSummoner($urlGetSummonerName);

			// Controleren op resultaten
			if($summonerInfo !== null){

				// Op basis van de gevonden summoner id
				$urlGetDivision = 'https://euw.api.pvp.net/api/lol/'.$_POST['region'].'/v2.3/league/by-summoner/'.$summonerInfo->$summonerName->id.'/entry?api_key='.$api_key;

				// Functie aanroepen voor het ophalen van de division objecten in functions.php
				$summonerDivisions = getSummoner($urlGetDivision);

				// Variablen aanmaken vanuit de resultaten uit het division object
				$summonerId = $summonerInfo->$summonerName->id;
				$summonerName = $summonerInfo->$summonerName->name;

				// Variablen aanmaken uit de geposte velden die gebruikt kunnen worden bij de controle en toevoegen in de database
				$role = $_POST['roleSelect'];
				$secondRole = $_POST['roleSelectSecond'];
				$lookingFor = $_POST['lookingFor'];
				$comSelect = $_POST['comSelect'];
				$region = $_POST['region'];
				$language = $_POST['language'];
				$secondlanguage = $_POST['secondlanguage'];
				$username = $_POST['username'];
				$summonerPassword = $_POST['password'];
				$confirmPassword = $_POST['confirmpassword'];
				$email = $_POST['email'];
				$divisionRank = getDivision($summonerDivisions, 'solo');

				$rank = getHighestRank($divisionRank);

				// Controleren of de velden niet leeg zijn ook al zit er een simpele css3 & html5 controle op
				if($username !== '' || $language !== '' || $summonerPassword !== '' || $confirmPassword !== '' || $email !== '' || $region !== ''){

					// Controleren op second lang omdat deze niet verplicht is moet deze wel data bevatten anders crashed de PDO query
					if($secondlanguage == ''){
						$secondlanguage = 'None';
					}

					// Controleren of de wachtwoorden overeen komen
					if($summonerPassword === $confirmPassword){
						
						// PDO query maken voor het toevoegen van de summoner met de verzamelde data
				        $sqlinsert = $dbh->prepare("    INSERT INTO summoner (summoner_id , summoner_name , summoner_role1 , summoner_role2 , summoner_lookingfor , summoner_com , summoner_region , summoner_lang1 , summoner_lang2 , summoner_username , summoner_email , summoner_password , summoner_division) 
						    							VALUES (:summoner_id, :summoner_name, :summoner_role1, :summoner_role2, :summoner_lookingfor, :summoner_com, :summoner_region, :summoner_lang1, :summoner_lang2, :summoner_username, :summoner_email, :summoner_password, :summoner_division)");
				        $sqlinsert->bindParam(':summoner_id', $summonerId);
				        $sqlinsert->bindParam(':summoner_name', $summonerName);
				        $sqlinsert->bindParam(':summoner_role1', $role);
				        $sqlinsert->bindParam(':summoner_role2', $secondRole);
				        $sqlinsert->bindParam(':summoner_lookingfor', $lookingFor);
				        $sqlinsert->bindParam(':summoner_com', $comSelect);
				        $sqlinsert->bindParam(':summoner_region', $region);
				        $sqlinsert->bindParam(':summoner_lang1', $language);
				        $sqlinsert->bindParam(':summoner_lang2', $secondlanguage);
				        $sqlinsert->bindParam(':summoner_username', $username);
				        $sqlinsert->bindParam(':summoner_email', $summonerPassword);
				        $sqlinsert->bindParam(':summoner_password', $email);
				        $sqlinsert->bindParam(':summoner_division', $rank);
				        $sqlinsert->execute();

				        // Registratiemailtje
				        // $from = "noreply@lft.gg"; // sender
				        // $subject = "Activation email";
				        // $message = 'test';
				        // $message = wordwrap($message, 70);
				        // send mail
				       	// mail($email,$subject,$message,"From: $from\n");
				       	?>
							<script type="text/javascript">
								// Doorsturen naar de index pagina na 2000miliseconden
								window.setInterval("window.location='/'",2000);
							</script>
				       	<?php
					}else{
						// Inladen van het registratie formulier
						include('includes/register_form.php');
					}
				}else{
					// Inladen van het registratie formulier
				    include('includes/register_form.php');
				}
			}else{
				// Inladen van het registratie formulier met de error
				$error = "<h2>Summoner name doesn't exists</h2>";
				include('includes/register_form.php');
			}
		}else{
			// Inladen van het registratie formulier
			include('includes/register_form.php');
		}
		?>
	</div>
</body>
</html> 