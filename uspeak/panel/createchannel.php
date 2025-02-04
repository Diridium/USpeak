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
			
			<h4 class="title center">Créer un channel :</h4>
			
		</div>
		
		<div class="content center">
            <button class ="buttonsmall" type="submit"><span><a href="channelconfig.php">Retour</a></span></button>
            <form action="chan_created.php" method="POST" enctype="multipart/form-data">
			<label for="nameChan">Nom du channel</label><br><br><input name="nameChan" placeholder="Nom du channel" class="input" style="width:735px; height:20px;border-radius:10px;border:1px grey solid;" required><br><br>
			<label for="desc">Description du channel</label><br><br><textarea name="desc" placeholder ="Maximum 2000 caracteres" rows="15" cols="100" class="inputbig" required></textarea><br><br>
			<form action="#">
               
                <label for="myFile" class="uploadfile">Cliquer pour choisir une image</label><br><br>
                <input id="myFile" style="display:none;" type="file" name="myFile"><br>
           

            <button class ="buttonsmall" type="submit">Créer le channel	</button>
            </form>
			
		</div>
			

			
	</body>
</html>