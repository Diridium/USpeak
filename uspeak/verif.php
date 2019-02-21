<?php
session_start();
include "connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vérification...</title>
    <link rel="stylesheet" type="text/css" href="/style/verif.css">
    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <meta http-equiv="refresh" content="5;URL=/index.php">
</head>
<body>
<h2 class="log-reg">
    <?php
    // Récupération des données ! //

        // Register
        $var = '';
        // if (isset($_POST['nom'])) {$nom = $_POST['nom'];$var = 'reg';}else{$nom = '';} 
        // if (isset($_POST['prenom'])) {$prenom = $_POST['prenom'];$var = 'reg';}else{$prenom = '';} 
        if (isset($_POST['mail'])) {$mail = $_POST['mail'];$var = 'reg';}
        if (isset($_POST['pseudo'])) {$pseudo = $_POST['pseudo'];$var = 'reg';}else{$pseudo = '';} 
        if (isset($_POST['mdp'])) {$mdp = $_POST['mdp'];$var = 'reg';}else{$mdp = '';} 
        if (isset($_POST['verifmdp'])) {$verifmdp = $_POST['verifmdp'];$var = 'reg';}
        if (isset($_POST['born'])) {$born = $_POST['born'];$var = 'reg';} 
        if (isset($_POST['select'])) {$sexe = $_POST['select'];$var = 'reg';} 
        if (isset($_POST['case'])) {$box = $_POST['case'];$var = 'reg';}else{$box = 'off';}
            
        
        // Log
        if (isset($_POST['logmail'])) {$logmail = $_POST['logmail'];$var = 'log';} if (isset($_POST['logmdp'])) {$logmdp = $_POST['logmdp'];$var = 'log';}

        if ($var == 'reg') {
            echo "Enregistrement";
        }
        if ($var == 'log') {
            echo "Connection";
        }
        ?>
</h2>
<br>
<p class="alert">
    <?php
    // Enregistrement !!
    // $n = strlen($nom);
    $n1 = strlen($pseudo);
    $n2 = strlen($mdp);
    if ($var == 'reg') {
        // if ($n > 2) {
            if ($n1 > 2) {
                if ($n2 > 5) {
                    if ($mdp == $verifmdp) {
                        if (strlen($born) == 10) {
                            if ($sexe != '--') {
                                if ($box == 'on') {
                                    $testmail = $connect->query("SELECT MAIL FROM user WHERE MAIL = '$mail'");
                                    $donnees=$testmail->fetch();
                                    if (!$donnees) {
                                        $testmail = $connect->query("SELECT PSEUDO FROM user WHERE PSEUDO = '$pseudo'");
                                        $donnees=$testmail->fetch();
                                        if (!$donnees) {
                                            $insert = $connect->query("INSERT INTO user(PSEUDO, MAIL, SEXE, MDP, DATE_NAISSANCE) VALUE('$pseudo', '$mail', '$sexe', '$mdp', '$born')");
                                            $insert->closeCursor();
                                            echo "Enregistré avec succès !";
                                        } else{echo "Ce pseudo est déjà utilisé !";}} 
                                    else{echo "Ce mail est déjà utilisé !";}}
                                else{echo "Veuillez accepter les conditions d'utilisation";}}
                            else{echo "Veuillez indiquez votre sexe !";}}
                        else{echo "Veuillez entrer une date de naissance !";}}
                    else{echo "La confimation et le mot de passe ne sont pas identiques !";}}
                else{echo "Veuillez mettre un mot de passe avec minimum 6 caractères !";}}
            else{echo "Veuillez mettre un pseudo avec minimum 3 caractères !";}}
        // else{echo "Veuillez mettre un nom avec minimum 3 caractères !";}
        //}


        // Connection !!
        if ($var == 'log') {
            $bddmail = $connect->query("SELECT MAIL FROM user WHERE MAIL = '$logmail'");
            $donnees=$bddmail->fetch();
            if ($donnees) {
                $bddmdp = $connect->query("SELECT MDP FROM user WHERE MDP = '$logmdp'");
                $donneees=$bddmdp->fetch();
                if ($donneees) {
                    $id = $connect->query("SELECT ID FROM user WHERE MAIL = '$logmail'");
                    $donnes=$id->fetch();
                    $iduser = htmlspecialchars($donnes['ID']);
                    $_SESSION['login'] = $iduser;
                    $pseudo = $connect->query("SELECT PSEUDO FROM user WHERE MAIL = '$logmail'");
                    $donnes=$pseudo->fetch();
                    $pseudou = htmlspecialchars($donnes['PSEUDO']);
                    $_SESSION['pseudo'] = $pseudou;
                    header('Location: /chat/');
                } else {
                echo "IDs Incorrectes !";
                }
            }
            if (!$donnees) {echo "IDs Incorrectes !";$var1 = 1;}
        }
    ?>
</p>

</body>
</html>