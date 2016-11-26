<?php

//============== Connexion Base de Donnée ============//

$pdo = new PDO('mysql:dbname=crud;host=localhost', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

//============= Constantes =================//
define("URL","http://localhost/htdocs/exercicepoo");
define("RACINE",$_SERVER['DOCUMENT_ROOT'] . '/htdocs/exercicepoo');

//echo URL .'<br>';
//echo RACINE .'<br>';

//========== Variable ======//
/* Nous permettra d'afficher des messages d'informations, d'erreur... */

$content='';
$erreur='';
$contenu='';

//========= SESSION =======//
session_start();

//========= FONCTIONS =====//
require_once('fonction.inc.php');
require_once('/class/user.class.php');
