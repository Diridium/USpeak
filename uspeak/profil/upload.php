<?php
session_start();
include "../connect.php";

$name = $_SESSION["login"] . ".png";
$idUser = $_SESSION['login'];


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
    $idUser = $_SESSION['login'];
    return move_uploaded_file($_FILES[$index]['tmp_name'], "$destination/$name");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Upload...</title>
    <!-- <meta http-equiv="refresh" content="3;URL=/profil/"> -->
</head>
<body>
<?php
    $upload1 = upload('imageUpload','../pdp_users/',1536000, array('png','jpg','jpeg','PNG') );
    if ($upload1) {
        $changePdp = $connect->query("UPDATE user SET PDP = '$name' WHERE ID = $idUser");
        header('Location: /profil/');
    } else {
        echo "Envoi Imposible ! Essayer avec une autre image.";
    }
?>
</body>
</html>