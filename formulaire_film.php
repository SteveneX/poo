<?php
require_once("inc/init.inc.php");
require_once("fiche_film.php");

$titre = (isset($_POST['titre'])) ? $_POST['titre'] : '';
$real = (isset($_POST['real'])) ? $_POST['real'] : '';
$acteurs = (isset($_POST['acteurs'])) ? $_POST['acteurs'] : '';
$annee_prod = (isset($_POST['annee_prod'])) ? $_POST['annee_prod'] : '';
$synopsis = (isset($_POST['synopsis'])) ? $_POST['synopsis'] : '';
$note = (isset($_POST['note'])) ? $_POST['note'] : '';
$commentaire = (isset($_POST['commentaire'])) ? $_POST['commentaire'] : '';
$genre = (isset($_POST['genre'])) ? $_POST['genre'] : '';
$statut = (isset($_POST['statut'])) ? $_POST['statut'] : '';
$favori = (isset($_POST['favori'])) ? $_POST['favori'] : '';
$teaser = (isset($_POST['teaser'])) ? $_POST['teaser'] : '';
$affiche = (isset($_POST['affiche'])) ? $_POST['affiche'] : '';
$nationalite = (isset($_POST['nationalite'])) ? $_POST['nationalite'] : '';

if($_POST){
	//
	//var_dump($_POST);
	//extract($_POST); // permet de générer des variables ayant pour nom l'indice de l'array.
	$erreur .= '';

	// controle format du pseudo
	if (!preg_match('#^[a-zA-Z0-9._-]+$#', $titre)){
		$erreur .= '<div class="alert alert-danger">Erreur Caractère Titre</div>';
	}

	// controle de la disponibilité du pseudo.
	$result = $pdo->query("SELECT * FROM films WHERE titre ='$titre'");
	if ( $result->rowCount()>=1){ // s'il y a 1 ou plusieurs résultats alors le pseudo est déjà pris
		$erreur .= '<div class="alert alert-danger"><strong>Erreur Titre déjà attribué.</strong></div>';
	}

	// Transmission des erreurs au contenu
	$contenu = $erreur;
} else {
	$contenu = '';
}

require_once("inc/haut3.inc.php");
echo $contenu;

$content = '';

$content .= '<form method="post" action="">
	<div class="form-group">
		<label for="titre">titre</label>
		<input type ="text" name="titre" placeholder="titre" id="titre" class="form-control" value="' . $titre .'">
	</div>

	<div class="form-group">
		<label for="real">realisateur</label>
		<input type ="text" name="real" placeholder="realisateur" id="real" class="form-control" value="' . $real .' ">
	</div>

	<div class="form-group">
		<label for="acteurs">acteurs</label>
		<input type ="text" name="acteurs" placeholder="acteurs" id="acteurs" class="form-control" value="' . $acteurs .'">
	</div>

  <div class="form-group">
		<label for="annee_prod">annee production</label>
		<input type ="text" name="annee_prod" placeholder="annee production" id="annee_prod" class="form-control" value="' . $annee_prod .'">
	</div>

  <div class="form-group">
		<label for="synopsis">synopsis</label>
		<input type ="text" name="synopsis" placeholder="synopsis" id="synopsis" class="form-control" value="' . $synopsis .'">
	</div>

  <div class="form-group">
    <label for="note">note</label>
    <input type ="text" name="note" placeholder="note" id="note" class="form-control" value="' . $note .'">
  </div>

  <div class="form-group">
    <label for="commentaire">commentaire</label>
    <input type ="text" name="commentaire" placeholder="commentaire" id="commentaire" class="form-control" value="' . $commentaire.'">
  </div>

  <div class="form-group">
    <label for="genre">genre</label>
    <input type ="text" name="genre" placeholder="genre" id="genre" class="form-control" value="' . $genre.'">
  </div>

  <div class="form-group">
    <label for="statut">statut</label>
    <input type ="text" name="statut" placeholder="statut" id="statut" class="form-control" value="' . $statut.'">
  </div>

  <div class="checkbox">
    <label for="favori"></label>
		<input type ="checkbox" id="favori" value="1" name="favori"' . $favori . '>
		<span>Favori</span>
  </div>

  <div class="form-group">
    <label for="teaser">teaser</label>
    <input type ="text" name="teaser" placeholder="ajouter l\'URL" id="teaser" class="form-control" value="' . $teaser.'">
  </div>

  <div class="form-group">
    <label for="affiche">affiche</label>
    <input type ="file" name="affiche" placeholder="affiche" id="affiche" class="form-control" value="' . $affiche.'">
  </div>

  <div class="form-group">
    <label for="nationalite">nationalite</label>
    <input type ="text" name="nationalite" placeholder="nationalite" id="nationalite" class="form-control" value="' . $nationalite.'">
  </div>



	<div class="form-group">
		<input type ="submit" class="btn btn-default" value="Enregistrer votre film">
	</div>
</form>';

//var_dump($_POST);
if ($_POST) {
  $film = new Film(intval($_POST['annee_prod']), $_POST['synopsis'], intval($_POST['note']), $_POST['commentaire'], $_POST['genre'], $_POST['statut'], intval($_POST['favori']), $_POST['teaser'], $_POST['affiche'], $_POST['nationalite'], $_POST['titre']);
  $film->save();
}
echo $content;

//$annee_prod, $synopsis, $note, $commentaire, $genre, $statut, $favori, $teaser, $affiche, $nationalite, $id = NULL, $titre = NULL, $users_id = NULL, $directors_id = NULL
require_once("inc/bas.inc.php");
