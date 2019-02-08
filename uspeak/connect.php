<?php

$servername = "localhost";
$username = "root";
$pw = "";	
$dbname = "projet_imie";
try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pw);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Erreur de connexion ! Error : ".$e->getMessage();
}

?>