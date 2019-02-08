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
			
			<h4 class="title center">Gerer les channels :</h4>
			
		</div>
		
		<div class="content">
			<button class ="buttonsmall" type="submit"><span><a href="index.php">Retour</a></span></button>
			
		</div>
			
		<div class="flex-container">
			<div style="flex-grow: 7;display:flex;flex-direction:column;"><br>
				Liste des channels :<br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button" style="width:100%"><span><a href="createchannel.php">Ajouter un channel</button></a></span>
			
			</div>
				
			<div style="flex-grow: 3">
				<br><br>
				<button class ="button">Renommer le channel</button>
				<br><br>
				<button class ="button">Changer la description</button>
				<br><br>
				<button class ="button red">Reinitialiser le channel</button>
				<br><br>
				<button class ="button red">Supprimer le channel</button>
				<br><br>
				
				</form>
				<br><br>
			</div>
				
		</div>
			
	</body>
</html>