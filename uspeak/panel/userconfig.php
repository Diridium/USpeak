<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Panel</title>
		<link rel="stylesheet" type="text/css" href="/style/template.css">
		<link rel="stylesheet" type="text/css" href="/style/panel.css">
		<link rel="icon" type="image/png" href="/images/favicon.ico">
	</head>

	<body>

		<!--navbar-->
		<header>
		<img src="/images/logo.png" width="160px" height="auto" alt="img_logo" class="logo">
		<div style="color:white;">
			<p>Connecté avec</p>
			<div class="redtext"><a href="/profil/">
			<?php echo $_SESSION["pseudo"]; ?>
		</a></div>
		
		</div>
		<div>
			<p><a href="/chat/">Chat</a></p>
		</div>
		<div>
			<p><a href="/profil/">Mon Profil</a></p>
		</div>
		<div>
			<p><a href="/panel/">Panel</a></p>
		</div>
		<div>
			<p><a class="disco redtext" href="/disconnect.php">Se deconnecter</a></p>
		</div>
	</header>		

		<!--contenu-->
		<div class="content">
			
			<h4 class="title center">Gerer les inscrits :</h4>
			
		</div>
		
		<div class="content">
			<button class ="buttonsmall" type="submit"><span><a href="index.php">Retour</a></span></button>
			
		</div>
			
		<div class="flex-container">
			<div style="flex-grow: 7">
				<br><br><br>
				<p>Recherche des inscrits</p>
			<form action="userconfig.php">
				<input type="text" name="" value="" placeholder="Recherche des membres" class="input" style="width:500px;" required>
			</form>

			<br>
			<button class="buttonsmall">Rechercher</button>
			<br><br><br>

			</div>
				
			<div style="flex-grow: 3">
				<br><br><br>
				<button class ="button">Renommer</button>
				<br><br>
				<button class ="button">Changer le rôle</button>
				<br><br>
				<button class ="button" style="background-color:red;">Exclure</button>
				<br><br><br><br><br>
			</div>
				
		</div>
			
	</body>
</html>