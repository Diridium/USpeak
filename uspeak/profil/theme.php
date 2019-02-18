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


        <div class="content">
            
            <h4 class="title center">Changer de theme</h4>

            <button class ="buttonsmall" type="submit"><span><a href="index.php">Retour</a></span></button>
            
            <div class="flex-container boxtheme">
            <div style="flex-grow: 7">  
                    <br><br>
                        <form action="#">
                        Choisissez un nouveau theme: <br><br>
                        <input type="file" name="myFile"><br><br>
                        <button class ="buttonsmall" type="submit" style="width:100px;	"><span><a href="#">Confirmer</a></span></button>
                        </form>
                    <br>
                </div>
            </div>
            <br>
        </div>
            

    </body>
</html>