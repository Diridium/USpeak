<?php
session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";

$nameChan = $_POST['nameChan'];
$desc = $_POST['desc'];

$name = $_SESSION["login"] . ".png";

function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE) {
    //Test1: fichier correctement uploadé
    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
    //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
    //Test3: extension
    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
    //Déplacement
    $name = $_SESSION["login"] . ".png";
    return move_uploaded_file($_FILES[$index]['tmp_name'], "$destination/$name");
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

    <?php
    $upload1 = upload('imageUpload','../pdc_chan/',1536000, array('png','jpg','jpeg','PNG'));
    if ($upload1) {
        $changePdp = $connect->query("INSERT INTO channels(NOM, DESCRIPTION, PDC) VALUES('$nameChan', '$desc', '$name')");
        header('Location: /panel/');
    } else {
        echo "Envoi Imposible ! Essayer avec une autre image.";
    }
    ?>
</body>
</html>