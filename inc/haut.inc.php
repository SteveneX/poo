<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon Site</title>
		<link rel="stylesheet" href="css/style.css" />
		<!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
	</head>
	<body>

		<header>
			<h1>FICHE FILMS</h1>
			<div class="conteneur">
			<!--<span><a href="#" title="mon site">Mon Site</a></span>-->
			<nav>
				<?php
				// admin
				/*if ( internauteEstConnecteEtEstAdmin()){
					echo '<a href="' . URL . 'admin/gestion_membre.php">Gestion des Membres</a>';
					echo '<a href="' . URL . 'admin/gestion_commande.php">Gestion des Commandes</a>';
					echo '<a href="' . URL . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
				}*/

				// admin+client
				/*if ( internauteEstConnecte()){
						echo '<a href="profil.php">Gestion de votre profil</a>';

					echo '<a href="connexion.php?action=deconnexion">Se déconnecter</a>';
				} else {*/
				// visiteur
					echo '<a href="index.php">Accueil</a>';
					echo '<a href="register.php">Inscription</a>';
					echo '<a href="connection.php">Connexion</a>';

				//}
				?>

			</nav>
			</div>
		</header>
		<section>
			<div class="conteneur">
