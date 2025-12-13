<?php

$host = "localhost";
$user = "u505488632_ma_mix_user";    
$pass = "Abo@khaled0";         
$db   = "u505488632_ma_mix"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


