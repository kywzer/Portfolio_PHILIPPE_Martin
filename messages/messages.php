<?php
	//connexion à la bdd
	include("db.php");

	//requête SQL
	$sql = "SELECT *
			FROM messages
			ORDER BY created_date DESC";

	//envoie ma requête chez mysql
	$stmt = $pdo->prepare($sql);

	//exécute la requête
	$stmt->execute();

	//va chercher les résultats
	$messages = $stmt->fetchAll();

	//nombre de messages
	$messagesCount = count($messages);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Tous les messages</title>

	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<div class="container">
		<h1>Mon site</h1>
		<nav>
			<a href="ajout.php">Ajouter un message</a>
			<a href="messages.php">Voir les messages</a>
		</nav>

		<section>
			<h2>Tous les messages !</h2>

			<?php if($messagesCount > 1) { ?>
				<p>Affichage des <?= $messagesCount ?> messages</p>
			<?php } elseif($messagesCount == 1) { ?>
				<p>Affichage du seul pauvre message</p>
			<?php } else { ?>
				<p>Aucun message !</p>
			<?php } ?>

			<!-- afficher tous les messages -->
			<?php

			foreach($messages as $message){
				//convertir la date en français
				$timestamp = strtotime($message['created_date']);
				$dateFr = date("d-m-Y H:i", $timestamp);

				echo '<article class="message">';
					echo '<div>' . $message['author'] . ' (' . $message['email'] . ')</div>';
					echo '<div>' . $message['message'] . '</div>';
					echo '<div>Posté le : ' . $dateFr . '</div>';
				echo '</article>';
			}

			?>
		</section>
	</div>
</body>
</html>
