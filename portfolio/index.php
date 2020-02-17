<?php
include('db.php');


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
<?php
include('/components/header.php');
 ?>





		<!-- bannière -->
		<div class="container-fluid contact">
			<div class="ban">
				<img src="img/ban.jpg" alt="banniere du site">
			</div>

			<div class="row">
				<div class="inner-banner">
					<h1> Bienvenue sur mon portfolio </h1>

					<a href="messages/ajout.php"><button class="btn btn-primary">Contactez moi </button></a>

				</div>
			</div>
		</div>
		<!-- end bannière -->

		<!-- à propos -->
		<div class="container-fluid about">
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
		</div>
		<!-- end à propos -->

		<!-- portfolio -->
		<div class="container-fluid portfolio">
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
		</div>
		<!-- end portfolio -->
		<?php include('/components/footer.php'); ?>


	</body>
	</html>
