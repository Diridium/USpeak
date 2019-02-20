<?php
//session_start();
//if (!isset($_SESSION['login'])) {header('Location: /');}
//  include "../connect.php";
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
			<?php //echo $_SESSION["pseudo"]; ?>
		</a></div>
		
		</div>
		
		<div>
			<p><a class="disco redtext" href="/disconnect.php">Se deconnecter</a></p>
		</div>
	</header>	

		<!--contenu-->
		<div class="content">
			
            <h4 class="title center">Choisir un channel :</h4>

            <div class="flex-container">
            <div style="flex-grow: 10;">
            <p>Channel 1</p><br>
            <p>Channel 2</p><br>
            <p>Channel 3</p><br>
            <p>Channel 4</p><br>
            <p>Channel 5</p><br>
            </div>
            </div>
     
			
		</div>
		

				
		</div>
			
	</body>
</html>