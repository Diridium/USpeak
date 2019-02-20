<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Accès refusé</title>
    <meta http-equiv="refresh" content="3;URL=/chat/">
    <link rel="stylesheet" type="text/css" href="/style/template.css">
    <link rel="icon" type="image/png" href="images/favicon.ico">
</head>

    <body>
        <header>
            <img src="/images/logo.png" width="160px" height="auto" alt="img_logo" class="logo">
        </header>

        <br><br><br><br>
        <div style ="text-align:center;">
        <h2>L'accès au panel est refusé<h2><br><br>
        <h3>Vous allez être redirigé dans quelques secondes</h3>
        </div>
    </body>

</html>