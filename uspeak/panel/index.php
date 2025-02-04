<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";
$idUser = $_SESSION['login'];
$verifRole = $connect->query("SELECT ROLE FROM user WHERE ID = $idUser");
$verifRole = $verifRole->fetch();
$verifRole = $verifRole['ROLE'];
if ($verifRole == "Inscrit" || $verifRole == "Membre") {
	header("Location: refused.php");
}
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


    <div class="content">
		
    <h4 class="title center">Panel</h4>
        
    </div>
        <div class="content">
            <br><br><br>
            <button class ="button" type="submit"><span><a href="/panel/userconfig.php">Gerer les inscrits</a></span></button>
            <br><br><br>
            <button class ="button" type="submit"><span><a href="/panel/channelconfig.php">Gerer les channels</a></span></button>
        </div>

</body>
</html>