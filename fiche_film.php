<?php
$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

class Film{


	private $id;
	private $titre;
	private $annee_prod;
	private $synopsis;
	private $note;
	private $commentaire;
	private $genre;
	private $statut;
	private $favori;
	private $teaser;
	private $affiche;
	private $nationalite;
	private $user_id;
	private $directors_id;



	public function create(){
		return 'Le film a été créé';
	}

	private function afficher(){
		return 'voici le film';
	}

	private function update(){
		return 'Le film a été mis à jour';
	}

	protected function delete(){
		return 'Le film a été effacé';
	}


	public function __construct($annee_prod, $synopsis, $note, $commentaire, $genre, $statut, $favori, $teaser, $affiche, $nationalite, $titre, $id = NULL, $user_id = NULL, $directors_id = NULL)
	{
		$this->setId($id);
		$this->setTitre($titre);
		$this->setAnnee_prod($annee_prod);
		$this->setSynopsis($synopsis);
		$this->setNote($note);
		$this->setCommentaire($commentaire);
		$this->setGenre($genre);
		$this->setStatut($statut);
		$this->setFavori($favori);
		$this->setTeaser($teaser);
		$this->setAffiche($affiche);
		$this->setNationalite($nationalite);
		$this->setuser_id($user_id);
		$this->setDirectors_id($directors_id);
	}



	public function setId($id){
		if (is_int($id) || $id == NULL){
			$this->id = $id;
		}else{
			var_dump($id);
			trigger_error('integer required', E_USER_ERROR);
		}
	}
	public function setTitre($titre){
		if (is_string($titre) || $titre == NULL){
			$this->titre = $titre;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setAnnee_prod($annee_prod){
		if (is_int($annee_prod)){
			$this->annee_prod = $annee_prod;
		}else{
			trigger_error('integer required', E_USER_ERROR);
		}
	}
	public function setSynopsis($synopsis){
		if (is_string($synopsis)){
			$this->synopsis = $synopsis;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setNote($note){
		if (is_int($note)){
			$this->note = $note;
		}else{
			trigger_error('integer required', E_USER_ERROR);
		}
	}
	public function setCommentaire($commentaire){
		if (is_string($commentaire)){
			$this->commentaire = $commentaire;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setGenre($genre){
		if (is_string($genre)){
			$this->genre = $genre;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setStatut($statut){
		if (is_string($statut)){
			$this->statut = $statut;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setFavori($favori){
		if (is_int($favori)){
			$this->favori = $favori;
		}else{
			trigger_error('integer required', E_USER_ERROR);
		}
	}
	public function setTeaser($teaser){
		if (is_string($teaser)){
			$this->teaser = $teaser;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setAffiche($affiche){
		if (is_string($affiche)){
			$this->affiche = $affiche;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setNationalite($nationalite){
		if (is_string($nationalite)){
			$this->nationalite = $nationalite;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setuser_id($user_id){
		if (is_string($user_id) || $user_id == NULL){
			$this->user_id = $user_id;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}
	public function setDirectors_id($directors_id){
		if (is_string($directors_id) || $directors_id == NULL){
			$this->directors_id = $directors_id;
		}else{
			trigger_error('string required', E_USER_ERROR);
		}
	}


	public function getId(){
		return $this->id;
	}
	public function getTitre(){
		return $this->titre;
	}
	public function getAnnee_prod(){
		return $this->annee_prod;
	}
	public function getSynopsis(){
		return $this->synopsis;
	}
	public function getNote(){
		return $this->note;
	}
	public function getCommentaire(){
		return $this->commentaire;
	}
	public function getGenre(){
		return $this->genre;
	}
	public function getStatut(){
		return $this->statut;
	}
	public function getFavori(){
		return $this->favori;
	}
	public function getTeaser(){
		return $this->teaser;
	}
	public function getAffiche(){
		return $this->affiche;
	}
	public function getNationalite(){
		return $this->nationalite;
	}
	public function getuser_id(){
		return $this->user_id;
	}
	public function getDirectors_id(){
		return $this->directors_id;
	}

	private static function find($id){
		Global $pdo;
		$result = $pdo->query("SELECT * FROM films WHERE id = '$id'");
		$resultat = $result->fetch(PDO::FETCH_ASSOC);
		$film = new Film(
			$resultat['titre'],
			intval($resultat['annee_prod']),
			$resultat['synopsis'],
			intval($resultat['note']),
			$resultat['commentaire'],
			$resultat['genre'],
			$resultat['statut'],
			intval($resultat['favori']),
			$resultat['teaser'],
			$resultat['affiche'],
			$resultat['nationalite'],
			intval($resultat['user_id']),
			intval($resultat['directors_id']));

		// $perso->setId(intval($resultat['id']));
		// $perso->setLife(intval($resultat['life']));
		// $perso->setAttack(intval($resultat['attack']));
		return $film;
	}

	public function save()
	{
		if($this->id)
		{
			Global $pdo;
			$film = serialize($this->film);
			$pdo->exec("
				UPDATE film
				SET id = '". $this->id. "',
					titre = '". $this->titre. "',
					annee_prod = '". $this->annee_prod. "',
					synopsis = '". $this->synopsis. "',
					note = '". $this->$note. "',
					commentaire = '". $this->commentaire. "',
					genre = '". $this->genre. "',
					statut = '". $this->statut. "',
					favori = '". $this->favori. "',
					teaser = '". $this->teaser. "',
					affiche = '". $this->affiche. "',
					nationalite = '". $this->nationalite. "',
					user_id = '". $this->user_id. "',
					directors_id = '". $this->directors_id. "',
					WHERE id= '".$this->id."',
					");
		}else
		{
			Global $pdo;
			$pdo->exec("
				INSERT INTO films (titre, annee_prod, synopsis, note, commentaire, genre, statut, favori, teaser, affiche,nationalite, user_id, director_id)
				VALUES
				(
				'".$this->titre."',
				'".$this->annee_prod."',
				'".$this->synopsis."',
				'".$this->note."',
				'".$this->commentaire."',
				'".$this->genre."',
				'".$this->statut."',
				'".$this->favori."',
				'".$this->teaser."',
				'".$this->affiche."',
				'".$this->nationalite."',
				'6',
				'1')");
			$this->setId(intval($pdo->lastInsertId()));
		}
	}
}

//$test = new film;
//echo $test->getCommentaire();
