<?php
session_start();

if (!isset($_SESSION["mode"])) {
  $_SESSION["mode"] = null;
}
if (!isset($_SESSION["admin"])) {
  $_SESSION["admin"] = null;
}

if (!isset($_SESSION["date"])) {
  $_SESSION["date"] = date("Y-m-d");
  $_SESSION["index"] = 0;
}

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($route) {
  case '/M1EDT/index/connexion':
    require 'controleur/c_connexion.php';
    break;
  case '/M1EDT/index/creationcours':
    require 'controleur/c_creation_cours.php';
    break;
  case '/M1EDT/index/emploi_du_temps':
    require 'controleur/c_emploi_du_temps.php';
    break;
  case '/M1EDT/index/emploiday':
    require 'controleur/c_emploi_day.php';
    break;
  case '/M1EDT/index/creationutilisateur':
    require 'controleur/c_utilisateur.php';
    break;
  case '/M1EDT/index/creationue':
    require 'controleur/c_creation_ue.php';
    break;
  case '/M1EDT/index/creationgroupe':
    require 'controleur/c_creation_groupe.php';
    break;
  case '/M1EDT/index/creationsalle':
    require 'controleur/c_creation_salle.php';
    break;
  //------------- projet edt ia
  case '/M1EDT/index/EDT_IA':
    require 'controleur/c_EDT_IA.php';
    break;

  default:
    require 'controleur/c_index.php';
    break;
}