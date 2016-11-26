<head>
	<link rel="stylesheet" href="css/style.css" />
</head>


<?php

require_once("inc/init.inc.php");
require_once("user.class.php");


$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : '';
$date_inscription = (isset($_POST['date_inscription'])) ? $_POST['date_inscription'] : '';
$date_naissance = (isset($_POST['date_naissance'])) ? $_POST['date_naissance'] : '';
$civilite_m = (isset($_POST['civilite']) && $_POST['civilite']=='m') ? ' checked ' : '';
$civilite_f = (isset($_POST['civilite']) && $_POST['civilite']=='f') ? ' checked ' : '';

if($_POST){
	var_dump($_POST);
	//extract($_POST); // permet de générer des variables ayant pour nom l'indice de l'array.
	$erreur .= '';

	// Controle la taille du pseudo
	if (strlen($pseudo) <= 3 || strlen($pseudo) > 20){
		//si le pseudo a une taille inférieue ou égale à 3 caractères ou supèrieur à 20 caractères.
		$erreur .= '<div class="alert alert-danger">Erreur Taille Pseudo</div>';
	}

	// controle format du pseudo
	if (!preg_match('#^[a-zA-Z0-9._-]+$#', $pseudo)){
		$erreur .= '<div class="alert alert-danger">Erreur Caractère Pseudo</div>';
	}

	// controle de la disponibilité du pseudo.

	$result = $pdo->query("SELECT * FROM users WHERE pseudo ='$pseudo'");
	if ( $result->rowCount()>=1){ // s'il y a 1 ou plusieurs résultats alors le pseudo est déjà pris
		$erreur .= '<div class="alert alert-danger">Erreur Pseudo déjà attribué.</div>';
	}


	// Transmission des erreurs au contenu

	$contenu = $erreur;
} else {
	$contenu = '';
}

require_once("inc/haut.inc.php");
//echo $contenu;

$content = '';

$content .= '<form method="post" action="">
	<div class="form-group">
		<label for="pseudo">Pseudo</label>
		<input type ="text" name="pseudo" placeholder="pseudo" id="pseudo" class="form-control" value="' . $pseudo .'">
	</div>
	<div class="form-group">
		<label for="mdp">Mot de passe</label>
		<input type ="password" name="mdp" placeholder="Mot de passe" id="mdp" class="form-control" >
	</div>
	<div class="form-group">
		<label for="email">Mail</label>
		<input type ="email" name="email" placeholder="email" id="email" class="form-control" value="' . $email .'">
	</div>
  <div class="form-group">
		<label for="date_naissance">Date de naissance</label>
		<input type ="dateTime" name="date_naissance" placeholder="date de naissance" id="date_naissance" class="form-control" value="' . $date_naissance .'">
	</div>

	<div class="form-group">
		<label for="civilite" class="civilite">Civilité</label>
	</div>

	<div class="checkbox">
		<input type="radio" id="homme" name="civilite" value="H"' . $civilite_m . '>
		<label class="civilite" for="homme">Homme</label>
		<input type="radio" id="femme" name="civilite" value="F"' . $civilite_f . '>
		<label class="civilite" for="femme">Femme</label>
	</div>

	<div class="form-group">
		<input type ="submit" class="btn-default" value="S\'inscrire">
	</div>

</form>';


if ($_POST) {
  $user = new User($_POST['pseudo'], $_POST['email'], $_POST['mdp'], $_POST['date_naissance'], $_POST['civilite']);
  $user->save();
}
echo $content;
