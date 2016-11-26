<?php
//========= fonction execute requete =======================//

function execute_requete($req){
	global $pdo;
	$result=$pdo->query($req);
	return $result;
}

//=========================

function internauteEstConnecte(){
	//cette fonction va vérifier si l'utilisateur est connecté.
	if( ! isset($_SESSION['membre'])){
		return false;
	} else {
		return true;
	}
}

function internauteEstConnecteEtEstAdmin(){
	// cette fonction indique si le membre est admin.
	if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
		return true;
	} else {
		return false;
	}
}



















