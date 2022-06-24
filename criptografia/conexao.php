<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "senhas";

$mysqli = new mysqli($host, $user, $pass, $db);

// check connection

if($mysqli->connect_errno){
	echo "Connect failed" . $mysqli->connect_error;
	exit();
}



?>