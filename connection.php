<?php

require_once("inc/init.inc.php");

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') // si le visiteur a cliqué sur le lien "Se Déconnecter"
{
	session_destroy(); // on supprime les sessions
}

if (internauteEstConnecte()){ // Si l'utilisateur est déja connecté, on le redirige vers son profil.
	header("location:register.php");
}

if ($_POST){
	var_dump($_POST);
	$resultat = execute_requete("SELECT * FROM users WHERE email='$_POST[email]'");
	if($resultat->rowCount() == 1 ){
		$membre = $resultat->fetch(PDO::FETCH_ASSOC);
		if ($_POST['mdp'] == $membre['mdp']){
			foreach ($membre as $indice => $element){
				if($indice != 'mdp'){
					$_SESSION['users'][$indice] = $element; // nous créeons une session avec les éléments de la BDD (sauf le mdp)
				}
			}

			header("location:formulaire_film.php"); // le mot de passe est correct, nous dirigeons le membre vers son profil.
		}

		else {
			$erreur .= '<div class="alert alert-danger">Mot de passe incorrect.</div>';
		}
	}

	else {

		$erreur .= '<div class="alert alert-danger">Erreur de Mail</div>';
	}
}


//============= affichage HTML ================ //

require_once("inc/haut.inc.php");
echo $erreur;
?>
<div class="form-group">

		<form method="post" action="">
			<label for="email">Email: </label>
			<input type="email" name="email" id="email"><br>

  		<label for="mdp"> Mot de passe</label>
	<input type="password" name="mdp" id="mdp"><br><br>

  		<input type="submit" name="seconnecter" value="se connecter">
		</form>
</div>
