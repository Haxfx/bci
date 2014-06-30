<?php

error_reporting( E_ALL );

if(
	strpos($_SERVER['REMOTE_ADDR'], "62.210") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "37.59") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "180.160") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "223.85") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "93.115") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "91.121") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "188.143") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "192.99") === 0 || 
	strpos($_SERVER['REMOTE_ADDR'], "115.28") === 0)
{
	echo 'You are blocked by the server';
    die();

}
/* Database connectie*/
$dsn = 'mysql:dbname=md137899db87645;host=db.hotflux.nl';
$user = 'md137899db87645';
$password = 'Lk9doUyP';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
