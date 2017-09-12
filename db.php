<?php

$servername = "";
$username = "";
$password = "";
$database = $username;

//connect to database
$link = mysqli_connect($servername, $username, $password, $database);

if(mysqli_connect_error()){

	die("Failed to connect to the Database!");
}

?>
