<?php
include("db.php");

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
<html>
<head>
	<meta charset="utf-8">
	<title> Mon portfolio</title>

	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">


	<!--css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">


</head>


<!-- contenu du site -->
<body>
	<header>



		<!--herder-->
		<header class="container-fluid herder">
			<div class="container">
				<a href="#" class="logo"> Mon portfolio </a>
				<nav class="menu">
					<a href="#"> Accueil</a>
					<a href="#about"> A propos </a>
					<a href="https://github.com/kywzer"> GitHub</a>
					<link rel="stylesheet" href="">
					<a href="#contact"> Contact </a>

				</nav>
			</div>
		</header>
		<!--end header -->






		<!-- bannière -->
		<section class="container-fluid contact">
			<div class="ban">
				<img src="img/ban.jpg" alt="banniere du site">
			</div>

			<div class="row">
				<div class="inner-banner">
					<h1> Bienvenue sur mon portfolio </h1>
					<a href="#contact"><button class="btn btn-primary">Contactez moi </button></a>

				</div>
			</div>
		</section>
		<!-- end bannière -->

		<!-- à propos -->
		<section class="container-fluid about">
			<div class="container">
				<h2 id="about"> A propos de moi</h2>


				<hr class="separator">
				<div class="row">

					<div class="col-4">
						<h2>Etudes</h2>
						<br>
						<p>
							Octobre 2019-Juin 2020 BTS informatique à l'ecole Campus Academy Nantes<br><br>
							Sept 2018- Juin 2019 Terminal Pro Système Numérique Lycée François Arago – Nantes <br> <br>
							Titulaire du Bac Système Numérique en juin 2019 mention Assez Bien

						</p>
					</div>
					<div class="col-4">
						<h2>Expérience</h2>
						<br>
						<p>
							Lors de mon Bac professionnel Systeme Numerique option SSIHT (Sûreté et Sécurité des Infrastruvcture de l'Habitat et du Tertiaire),
							j'ai effectué mes stages dans l'entreprise Instant électronique spécialisé dans le courant faible.<br><br>
							Lors de ce stage j'ai pu effectuer l'installation de caméras de surveillance; installation d'interphone; controle d'acces; mise en service de la fibre optique,


						</p>
					</div>
					<div class="col-4">
						<h2>Hobbies</h2>
						<br>
						<p>
							La création de musique ( Beatmaking )
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- end à propos -->

		<!-- portfolio -->
		<section class="container-fluid portfolio">
			<div class="container">

				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
				<article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

				</article>
			</div>
		</section>
		<!-- end portfolio -->

		<!-- footer / contact-->
		<hr class="separator">
		<footer class="footer container-fluid footer">
			<div class="container">


				<div class="row">
					<div class="col-12">
						<h2 id="contact"> Contactez moi !</h2>

						<div class="span6">
							<form>



								<div class="controls controls-row">
									<input id="name" name="name" type="text" class="span3" placeholder="Name">
									<input id="mail" name="mail" type="email" class="span3" placeholder="Email adress">
								</div>
								<div class="controls">
									<textarea id="message" name="message" class="span6" placeholder="Your Message" rows="$"></textarea>
								</div>

								<div class="controls">
									<button id="contact-submit" type="submit" class="btn btn-primary input-medium pull-right">Envoyer</button>
								</div>
							</div>
							<?php
							foreach($errors as $error){
								echo '<div class="error">';
								echo $error;
								echo '</div>';
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</footer>
	</body>
	</html>
