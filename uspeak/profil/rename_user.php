<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";

$newName = $_POST['newName'];
$verifName = $_POST['verifName'];
$mdp = $_POST['mdp'];

$idUser = $_SESSION['login'];
$checkpwd = $connect->query("SELECT * FROM user WHERE ID = '$idUser'");
$checkpwd = $checkpwd->fetch();

if ($newName == $verifName) {
    if ($checkpwd['MDP'] == $mdp) {
        $insert = $connect->query("UPDATE user SET PSEUDO = '$newName' WHERE ID = '$idUser'");
        $_SESSION['pseudo'] = $newName;
        header('Location: /profil/');
    } else {echo "Pas le bon mot de passe";}
} else {echo "La vérification ne correspond pas";}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Changement de pseudo...</title>
    <meta http-equiv="refresh" content="3;URL=/profil/">
    <link rel="icon" type="image/png" href="images/favicon.ico">
</head>
<body>

</body>
</html>