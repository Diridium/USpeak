<?php session_start();
if (!isset($_SESSION['login'])) {header('Location: /');}
include "../connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mini-chat</title>
		<link rel="stylesheet" type="text/css" href="/style/template.css">
		<link rel="stylesheet" type="text/css" href="/style/chat.css">
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

	<div class="mess-onglet-all">
		<div class="mess-content">
		<?php
			// Récupération des 10 derniers messages
			// LIMIT et OFFSET dynamique
			$requete_count = $connect->query("SELECT COUNT(ID) as 'count_mess' FROM minichat");
			$count = $requete_count->fetch();
			$requete_count->closeCursor(); 
			$count = $count['count_mess'];
			$offset = $count - 10;
			if ($count == 0) {echo "<div class='fil'><div class='conversation'><div class='date-pseudo'></div><div class='mess'>Pas de Message, Soyez le 1er à parler !</div></div></div>";}
			else {
		
			$reponse = $connect->query("SELECT u.PSEUDO, m.MESSAGES, m.DATE_MESSAGE, u.PDP FROM minichat m JOIN user u ON u.ID = m.ID_USER ORDER BY m.DATE_MESSAGE LIMIT $offset, 10");
			?>
			
			<div class="fil">
			<?php 
			// Affichage de chaque message (message protégé par htmlspecialchars)
			while ($donnees = $reponse->fetch()) { 
				if ($donnees['PSEUDO'] == $_SESSION['pseudo']) {
					echo '<div class="conv-own">';
				} else {echo '<div class="conversation">';}
				?>

					<!--Pseudo-->
					<div class="pseudo">
					
					<img class="pdp-user" src="/pdp_users/<?php echo $donnees["PDP"]; ?>">
					

					<?php echo "Par <b>".($donnees['PSEUDO'])."</b>" ?>
					</div>

					<!--Message-->
					<div class="mess">
						<?php echo strip_tags($donnees['MESSAGES']); ?>
					</div>

					<!--Date message-->
					<div class="date">
					<?php $date = date_parse($donnees['DATE_MESSAGE']);
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
						echo ' à '.$hours.':'.$minute." le ".$jour.'/'.$mois; ?>
					
					</div>

				</div>
				<?php } $reponse->closeCursor(); }
				?>
				<form class="form-mess" action="post.php" method="POST">
					<div class="form-in">
						<input type="text" name="message" placeholder="Ecrire un message...." maxlength="130" class="input" required>
						<button class="send" type="submit"><img class="send-i" src="/images/logo_mess.png"></button>
					</div>
				</form>
			</div>
		<!-- La boite de dialogue, pour rentrer le message-->
    	
		</div>

		<div class="onglet">
				<div class="onglet-nav">
					<ul>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
		</div>
	</div>
    </body>
</html>