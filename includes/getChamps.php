<?php

	include('functions.php');

	$api_key = '9cd74893-ceb6-4707-9fab-da02a0da17e4';
	$summonerID = $_POST['summonerID'];

	$urlGetMostChamps = 'https://euw.api.pvp.net/api/lol/euw/v1.3/stats/by-summoner/'.$summonerID.'/ranked?api_key='.$api_key;
	$summonerChamps = getSummoner($urlGetMostChamps);

	function objectToArray($d) {
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
	}
 
	$arraySummonerChamps = objectToArray($summonerChamps);

	$test = $summonerChamps->champions;

	$counterChamps = 0;

	function totalSessionsPlayed($a, $b) {
		return $a->stats->totalSessionsPlayed < $b->stats->totalSessionsPlayed ? 1 : -1;
	}

	if($test !== null){
	usort($test, 'totalSessionsPlayed');


		foreach($test as $champ)if($counterChamps++ <4){
			if($champ->id !== 0){
				?>
					<img class="champsPlayed" src="http://lkimg.zamimg.com/shared/riot/images/champions/<?php echo $champ->id; ?>.png"/>
				<?php
			}
		}
	}
?>