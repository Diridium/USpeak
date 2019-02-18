<?php
session_start();
if (isset($_SESSION['login'])) {header('Location: /chat/');}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>U-make</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/style/style.css">
        <link rel="icon" type="image/png" href="/images/favicon.ico">
    </head>
    
    <body>
        <header>
            <img src="/images/logo.png" height="100px" alt="img_png" class="logo" href="#">
            <div id="connexion" class="rightnav">
                <form method="post" action="verif.php">
                    <h3 class="center">Connectez-vous</h3>
                        <div>
                        <label for="logmail">Adresse email</label>
                        <input type="text" id="logmail" name="logmail" class ="input3" required>
                        </div>
                        <br>
                        <div>
                        <label for="logmdp">Mot de passe</label>
                        <input type="password" id="logmdp" name="logmdp" id="mdp" class ="input3" required>
                        </div>
                        <br>
                        <div style="text-align:center;">
                        <button class="btn-log anim" type="submit"><span>Se connecter</span></button>
                        <!-- <input type="submit" name="Valider" value="Se connecter" class="button connexion"> -->
                        </div>
                </form>
            </div>
        </header>

    <br><br><br>
    <div id="form">
        <div id="avion-terre">
            <img src="/images/avion-terre.png" width="100%" class="img_logo" alt="img_png">
        </div>

        <div id="sign_in" class="greytext"></div>
            <form method="post" action="verif.php">
                <h2 class="center">Inscrivez-vous</h2>
                <br>
                <div class="form-lab-in">
                    <div class="labels">
                        <label for="nom" >Nom</label><br>
                        <label for="prenom">Prénom</label><br>
                        <label for="pseudo">Pseudo</label><br>
                        <label for="born">Date de naissance</label><br>
                        <label for="mail">Adresse mail</label><br>
                        <label for="sexe" class="right">Vous êtes</label><br>
                        <label for="mdp" >Mot de passe</label><br>
                        <label for="verifmdp">Confirmation mot de passe</label><br>
                    </div>

                    <div class="inputs">
                        
                        <input type="text" id="nom" name="nom" class="right input3" placeholder="Nom" required><br>
                        <input type="text" id="prenom" name="prenom" class="right input3" placeholder="Prénom" required><br>
                        <input type="text" id="pseudo" name="pseudo" class="right input3" placeholder="Pseudo" required><br>
                        <input type="date" id="born" name="born" class="right input3" required><br>
                        <input type="email" id="mail" name="mail" class="right input3" placeholder="mail@example.com" class ="input3" required><br>

                        <select id="sexe" name="select">
                            <option value="--" >--------</option>
                            <option value="femme"> Une Femme</option>
                            <option value="homme">Un Homme</option>
                        </select>
                        <br>

                        <input type="password" id="mdp" name="mdp" class="right input3" placeholder="Mot de passe" required><br>
                        <input type="password" id="verifmdp" name="verifmdp" class="right input3 " placeholder="Confirmez" required><br>
                    </div>
                </div>
                <br>
                <input  type="checkbox" id="case" value="on" name="case" required>
                <label for="case">En cochant cette case, vous acceptez les conditions d'utilisation</label>
                <br><br>
                <button class="btn-log anim" type="submit"><span>S'enregistrer</span></button>
                <!-- <input type="submit" name="Valider" value="Valider" class="button"> -->
        </form>
    </div>
    </div>

    <br><br><br>
    
    <footer>
        Réalisé par Augustin H et Bastien L
    </footer>

    </body>

</html>