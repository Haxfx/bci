<?php
	// Curl functie om met de url request de data op te halen uit de riot api. alle data kan in json worden gezet maar is niet nodig geweest.
	function getSummoner($url){
		$ch = curl_init();
		$timeout = 5;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		$data = curl_exec($ch);

		$response = json_decode($data);

		$responsecode = curl_getinfo($ch);
		curl_close($ch);

		return $response;
	}

	// Functie om de hoogste rank uit de lijst met teams van een speler te halen.
	function getHighestRank($array){

		$divisions = array('UNRANKED', 'CHALLENGER', 'DIAMONDI', 'DIAMONDII', 'DIAMONDIII', 'DIAMONDIV', 'DIAMONDV', 'PLATINUMI', 'PLATINUMII', 'PLATINUMIII', 'PLATINUMIV', 'PLATINUMV', 'GOLDI', 'GOLDII', 'GOLDIII', 'GOLDIV', 'GOLDV', 'SILVERI', 'SILVERII', 'SILVERIII', 'SILVERIV', 'SILVERV', 'BRONZEI', 'BRONZEII', 'BRONZEIII', 'BRONZEIV', 'BRONZEV');
		
		foreach($array as $division){
			$key = array_search($division, $divisions);
			if ($key !== false) {
			    return $key;
				break;
			}
		}
		$noRank = 'No rank found';
		return $noRank;
	}

	// Functie om de division te controleren voor soloQ omdat er soms rare strings in een data object zitten.
	function getDivision($divisions, $category){

		$rank = array();

		if($category === '5v5'){
			foreach($divisions as $summonerDivisions){
						
				if($summonerDivisions->queueType == 'RANKED_SOLO_5x5'){	
					if (strpos($summonerDivisions->tier. $summonerDivisions->rank,'CHALLENGER') !== false) {
						array_push($rank, $summonerDivisions->tier);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'DIAMOND') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'PLATINUM') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'GOLD') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'SILVER') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'BRONZE') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}
				}
			}

			return $rank;
		}

		if($category === '3v3'){
			foreach($divisions as $summonerDivisions){
						
				if($summonerDivisions->queueType == 'RANKED_SOLO_5x5'){	
					if (strpos($summonerDivisions->tier. $summonerDivisions->rank,'CHALLENGER') !== false) {
						array_push($rank, $summonerDivisions->tier);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'DIAMOND') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'PLATINUM') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'GOLD') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'SILVER') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'BRONZE') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}
				}
			}

			return $rank;
		}

		if($category === 'solo'){
			foreach($divisions as $summonerDivisions){
						
				if($summonerDivisions->queueType == 'RANKED_SOLO_5x5'){	
					if (strpos($summonerDivisions->tier. $summonerDivisions->rank,'CHALLENGER') !== false) {
						array_push($rank, $summonerDivisions->tier);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'DIAMOND') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'PLATINUM') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'GOLD') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'SILVER') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}elseif(strpos($summonerDivisions->tier. $summonerDivisions->rank,'BRONZE') !== false) {
						array_push($rank, $summonerDivisions->tier.$summonerDivisions->rank);
					}
				}
			}

			return $rank;
		}
	}
?>