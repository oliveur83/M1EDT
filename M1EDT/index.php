<?php
  session_start();
  //si il existe pas on initialise
  //solution pour garder les valeur qui change
  // et ne pas avoir null a chaque fois 
if (!isset($_SESSION["mode"])){
  $_SESSION["mode"]=null;
}
if (!isset($_SESSION["admin"])){
  $_SESSION["admin"]=null;
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
  case '/M1EDT/index/creationutilisateur':
      require 'controleur/c_utilisateur.php';
    break;
  default:
    require 'controleur/c_index.php';
    break;
}