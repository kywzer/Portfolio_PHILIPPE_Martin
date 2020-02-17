<?php
//include("db.php");

$errors = [];

//formulaire soumis
if (!empty($_POST)) {
	//récupère les données
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);

	//validation des données
	if (empty($name)) {
		$errors[] = "Veuillez renseigner votre nom !";
	}
	elseif (strlen($name) < 2 || strlen($name) > 60) {
		$errors[] = "Votre nom doit avoir entre 2 et 60 caractères !";
	}

	if (empty($email)) {
		$errors[] = "Veuillez renseigner votre email !";
	}
	elseif (strlen($email) > 191) {
		$errors[] = "Votre email est trop long !";
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Votre email n'est pas valide !";
	}

	if (empty($message)) {
		$errors[] = "Veuillez renseigner votre message !";
	}
	elseif (strlen($message) < 4 || strlen($message) > 800) {
		$errors[] = "Votre message doit avoir entre 4 et 800 caractères !";
	}

	//est-ce que le formulaire est totalement valide ?
	//on tchèque si le tableau est toujours vide pour déduire !
	if(empty($errors)){
		//notre requête insert
		$sql = "INSERT INTO messages
		VALUES (NULL, :author, :email, :message, :date)";

		//envoie la requête chez mysql
		$stmt = $pdo->prepare($sql);

		//exécute en fournissant les valeurs
		$stmt->execute([
			':author' => $name,
			':email' => $email,
			':message' => $message,
			':date' => date('Y-m-d H:i:s')
		]);

		//redirige vers la liste des messages
		header('Location: messages.php');
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout de message</title>

	<link rel="stylesheet" href="styles2.css">

</head>
<body>

	<div class="ban">
		<img src="img/ban.jpg" alt="">
	</div


	</div>
	<div class="container">
		<h1>Mon portfolio</h1>

		<h2>Envoyez moi un message !</h2>
		<form method="post">
			<div>
				<label for="name">Votre nom</label>
				<input type="text" name="name" id="name">
			</div>
			<div>
				<label for="email">Votre email</label>
				<input type="email" name="email" id="email">
			</div>
			<div>
				<label for="message">Votre message</label>
				<textarea name="message" id="message"></textarea>
			</div>

			<?php
			foreach($errors as $error){
				echo '<div class="error">';
				echo $error;
				echo '</div>';
			}
			?>
			<button>Envoyer !</button>
		</form>
	</div>
</body>
</html>
