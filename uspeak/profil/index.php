<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');} else {$idUser = $_SESSION['login'];}
include "../connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel</title>
    <link rel="stylesheet" type="text/css" href="/style/template.css">
    <link rel="stylesheet" type="text/css" href="/style/profil.css">
    <link rel="icon" type="image/png" href="/images/favicon.ico">
</head>
<body>

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
	
<?php
	$userInfo = $connect->query("SELECT * FROM user WHERE ID = '$idUser'");
	$donnees=$userInfo->fetch();
?>


	<h4 class="title center">Customiser son profil</h4>

	<div class="flex-container">
		<div style="flex-grow: 5;">
			<br><img class="pdp-user" src="/pdp_users/<?php echo $donnees['PDP']; ?>" alt="photo de profil">

			<div class="info-user">
					<?php
					 $date = date_parse($donnees['DATE_REGISTER']);
					 $jour = $date['day'];
					 $mois = $date['month'];
					 $annee = $date['year'];
					 $hours = $date['hour'];
					 $minute = $date['minute'];
					 if ($minute < 10) {
						 $minute = '0'.$minute;
					 }
					 if ($mois < 10) {
						 $mois = '0'.$mois;
					 }
					echo '<p class="pseudo">'.$donnees['PSEUDO'].'</p>'.'<p>'.'Role : '.$donnees['ROLE'].'</p>'.'<p>Enregistré le : '.$jour.'/'.$mois.'/'.$annee.'</p>'; ?>
			</div>
    
		</div>
	

		<div style="flex-grow: 5">
			<div class="config">
				<br><br>
				<h3 style="text-decoration:underline;">Paramètres de compte</h3><br><br>
				<a href="rename.php">Changer de pseudo</a><br>
				<a href="changepdp.php">Changer sa photo de profil</a><br>
				<a href="theme.php">Changer le thème</a><br>
			</div>
		</div>

</div>

			<!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="imageUpload">
				<input type="submit" value="Upload Image" name="submit">
			</form> -->
			
</body>
</html>