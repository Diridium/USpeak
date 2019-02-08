<?php
session_start();
$sess = $_SESSION['login'];
include "../connect.php";
// php qui envoit le message écrit par l'utilisateur à une bdd sql

	// Connexion à la base de données


	// Insertion du message à l'aide d'une requête préparée
	$mess = $_POST['message'];
	if ($mess == '') {header('Location: /chat/');} else {
		$mess = str_replace("'",'"', $mess);
		$insertMess = $connect->query("INSERT INTO minichat(MESSAGES, ID_USER) VALUE('$mess', '$sess')");
		$insertMess->closeCursor();
		// Redirection du visiteur vers la page du minichat
		header('Location: /chat/');
	}
?>