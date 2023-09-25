<?php
// todo suprimer et modiferi les affichage and cours 1 et cours 2
    /*
    Nom du fichier : v_creation_cours.html
    Auteur : Tom OLIVIER
    Date : 27 août 2023
    Description : cette page affiche les element html 
    de creation,modification,supresion de cours
   */


   function generateDates($startDate, $endDate, $holidays) {
    $dates = array();
    $currentDate = new DateTime($startDate);
    $endDate = new DateTime($endDate);
    $Datedv = new DateTime( $holidays[0]);
    $Datefv = new DateTime( $holidays[1]);
    while ($currentDate <= $endDate) {
        $dayOfWeek = $currentDate->format('N'); // 1 (lundi) à 7 (dimanche)

        // Convertir la date courante en format Y-m-d
        $currentDateStr = $currentDate->format('Y-m-d');

        // Vérifier si le jour est un jour ouvrable (lundi à vendredi) et n'est pas un jour de vacances
        if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
          
            if (!($currentDate >= $Datedv && $currentDate <= $Datefv))
                {
                $dates[] = $currentDateStr;
            }
        }

        // Passer au jour suivant
        $currentDate->add(new DateInterval('P1D'));
    }

    return $dates;
}

//connexion a la base de donnée 
if(!isset($_SESSION['selectformation']))
{
    $_SESSION['selectformation']=false;}

$servername = "localhost";
$username = "root";
$password = "";  
$conn = new PDO("mysql:host=$servername;dbname=m1_edt", $username, $password);
# **************************************************
# selection pour les select
# **************************************************

$sql = "SELECT * FROM salle";
$result_sallecm = $conn->query($sql);
$result_salletd = $conn->query($sql);
$result_salletp = $conn->query($sql);
$sql = "SELECT * FROM user ";
$result_profcm = $conn->query($sql);
$result_proftd = $conn->query($sql);
$result_proftp = $conn->query($sql);
$sql = "SELECT * FROM groupe";
$result_groupe= $conn->query($sql);

# **************************************************
# sauvegarde de donnée et initialisation pour affichage
# **************************************************
if (!isset($_SESSION['liste_event'])) {
    // Créer une liste de listes
    $liste_event = array();
    $liste_prof = array();
    $liste_salle = array();
    // Assigner la liste de listes à une variable de session
    $_SESSION['liste_event'] = $liste_event;
    $_SESSION['liste_salle'] = $liste_salle;
    $_SESSION['liste_prof'] = $liste_prof;
   
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["mat"])) {
    
    $liste_event = array($_POST["mat"], $_POST["CM"], $_POST["TD"], $_POST["TP"]);
    $liste_prof = array($_POST["profcm"], $_POST["proftd"], $_POST["proftp"]);
    $liste_salle= array($_POST["sallecm"], $_POST["salletd"], $_POST["salletp"]);
    //-------
        //select formation 
        $_SESSION['selectformation']=true;
        $_SESSION['formation']=$_POST["forma"];
    //note :liste_event=[liste_heure_cours,liste_prof,liste_salle]
    $liste_event_intermediare_event = $_SESSION['liste_event'];
    $liste_event_intermediare_prof = $_SESSION['liste_salle'];
    $liste_event_intermediare_salle = $_SESSION['liste_prof'];
    $liste_event_intermediare_event[] = $liste_event;
    $liste_event_intermediare_salle[] = $liste_salle;
    $liste_event_intermediare_prof[] = $liste_prof;
    //$liste_event_intermediare[] = [$liste_event,$liste_prof,$liste_salle];
    $_SESSION['liste_event'] = $liste_event_intermediare_event;
    $_SESSION['liste_salle'] = $liste_event_intermediare_salle;
    $_SESSION['liste_prof'] = $liste_event_intermediare_prof;
 
  

    header("Location: EDT_IA");
    exit();
} 
# **************************************************
# partie select formation modifier/suprimer 
# **************************************************

if(isset($_POST["formation_modifier"]))
{
    print_r("tototo");
    $_SESSION['selectformation']=false;
}
# **************************************************
# partie bouton affichage 
# **************************************************

if (isset($_POST['affichage_supr']))
{
    print_r($_SESSION['liste_event']);
    unset($_SESSION['liste_event'][$_POST['affichage_supr']]);
    
}

# **************************************************
# partie exportation
# **************************************************
if (isset($_POST["export"])){
    $_SESSION['liste_event_pour_calcul']=$_SESSION['liste_event'];
//initialisation
$startDate = "2023-09-25T8:30:00"; // Date de départ
$endDate = "2023-12-10T8:30:00"; // Date de fin
$holidays = ['2013-10-25', '2013-11-05'];//date de vacance 
$liste_dates = generateDates($startDate, $endDate, $holidays);//generation de ma liste de date 
//horaire de journéee 
$heuresPossiblesdebut = array("08:30:00", "10:15:00", "13:30:00","15:15:00","17:00:00");
$heuresPossiblesfin = array("10:00:00", "11:45:00", "15:00:00","16:45:00","18:30:00");
//liste final a ajouter dans le BDD
$liste_ajouter_bdd=array();
$liste_ajouter_bdd_prof=array();
$liste_ajouter_bdd_user=array();

$nombre_jour_semestre=count($liste_dates)-1;
//algo de création automatique de EDT avec les module fournie 
$dateTime = new DateTime($startDate);
$dateTimefin = new DateTime($startDate);
while($nombre_jour_semestre>0) 
{
    $nombre_cours_jour_alea= mt_rand(1, 5);
    while($nombre_cours_jour_alea>0)
    { 
    $liste_inter=[];// liste intermediare pour ajouter dans liste_ajouter_bdd
    $alea_heure= mt_rand(0, 4);
    //--------------gestion des horaire ----------------
    // Sélectionner une heure aléatoire parmi les heures possibles
    $heureAleatoiredebut = $heuresPossiblesdebut[$alea_heure];
    $heureAleatoirefin = $heuresPossiblesfin[$alea_heure];
    // Convertir l'heure aléatoire en objet DateTime
    $heureAleatoireObjdebut = DateTime::createFromFormat("H:i:s", $heureAleatoiredebut);
    $heureAleatoireObjfin = DateTime::createFromFormat("H:i:s", $heureAleatoirefin);
    // Changer l'heure de la date actuelle
    $dateTime->setTime($heureAleatoireObjdebut->format("H"), $heureAleatoireObjdebut->format("i"), $heureAleatoireObjdebut->format("s"));
    $dateTimefin->setTime($heureAleatoireObjfin->format("H"), $heureAleatoireObjfin->format("i"), $heureAleatoireObjfin->format("s"));
    $formattedDate = $dateTime->format("Y-m-d\TH:i:s");
    $formattedDatefin = $dateTimefin->format("Y-m-d\TH:i:s");
    // comparaison sur heure pour pas avoir deux evenement sur la meme horaie 
    $dateObj1 = DateTime::createFromFormat("Y-m-d\TH:i:s", $formattedDate);
    //-----------partie meme date  and cours 2 avant corus 1------------
    $meme_date=false;
    if(count($liste_ajouter_bdd)>0){
        foreach ($liste_ajouter_bdd as $ligne) {
    
            foreach ($ligne as $valeur) {
        // La date au format ISO 8601 se trouve dans l'index 1 du sous-tableau
        $dateISO8601 = $valeur[1];
        $dateObj = DateTime::createFromFormat("Y-m-d\TH:i:s", $dateISO8601);
        if ($dateObj == $dateObj1) {
        $meme_date=true;
        }
    }
    }    
    }

   if (!$meme_date){
    //choix du cours aleatoirement   
    $alea_cours=mt_rand(0, count($_SESSION['liste_event'])-1);
    //if heure de cm dispo ,puis td ,puis tp
    if ($_SESSION['liste_event_pour_calcul'][$alea_cours][1]>0)
    {
            foreach ($liste_ajouter_bdd as $ligne) {           
                foreach ($ligne as $valeur) {
                    $dateISO8601 = $valeur[1];
                    $dateObj = DateTime::createFromFormat("Y-m-d\TH:i:s", $dateISO8601);
            // oon fait un regex car on veut avoir le nom et son numero par 
            // par exemple sur la chaine "cm python 3"
            preg_match_all('/\b([a-zA-Z]+)\b/', $valeur[0], $matches);    
            preg_match('/(\d+)/', $valeur[0], $matchesnum);
            //if meme cours  que c'est bien inferieur and date inf
            if ($_SESSION['liste_event_pour_calcul'][$alea_cours][0] == $matches[0][1] &&  $matchesnum[0]>$_SESSION['liste_event_pour_calcul'][$alea_cours][1] && $dateObj1 < $dateObj) {
                break (3);
                }
            }
            } 
            // ajouter prof choix aleatoire 
            $nb_alea_prof=mt_rand(0, count($_SESSION['liste_prof'][$alea_cours][2])-1);
            $liste_ajouter_bdd_prof[]=$_SESSION['liste_prof'][$alea_cours][2][$nb_alea_prof];
    // ajouter salle choix aleatoire
    $alea_salle=mt_rand(0, count($_SESSION['liste_salle'][$alea_cours][0])-1);
    $alea_salle_pour_le_cours=$_SESSION['liste_salle'][$alea_cours][0][$alea_salle];
    // evenement(titre_evenement,date_debut_evenement,date_fin_evenement,couleur_evenement,categorie_evenement,id_salle,code_ue)
    $liste_inter[]=["cm ".$_SESSION['liste_event_pour_calcul'][$alea_cours][0]." ".$_SESSION['liste_event_pour_calcul'][$alea_cours][1],$formattedDate,$formattedDatefin,"3c78d8","CM","L1S1UE1","$alea_salle_pour_le_cours"];
    $_SESSION['liste_event_pour_calcul'][$alea_cours][1]=intval($_SESSION['liste_event_pour_calcul'][$alea_cours][1])-1;
    $liste_ajouter_bdd[]=$liste_inter;
    
}
    else if($_SESSION['liste_event_pour_calcul'][$alea_cours][2]>0)
    {   
        foreach ($liste_ajouter_bdd as $ligne) {
                
            foreach ($ligne as $valeur) {
                $dateISO8601 = $valeur[1];
                $dateObj = DateTime::createFromFormat("Y-m-d\TH:i:s", $dateISO8601);

        preg_match_all('/\b([a-zA-Z]+)\b/', $valeur[0], $matches);    
        preg_match('/(\d+)/', $valeur[0], $matchesnum);
        //if meme cours  que c'est bien inferieur and date inf

        if ($_SESSION['liste_event_pour_calcul'][$alea_cours][0] == $matches[0][1] &&  $matchesnum[0]>$_SESSION['liste_event_pour_calcul'][$alea_cours][2] && $dateObj1 < $dateObj) {

            break (3);
            }
        }
        }
        //prof 
        
        $nb_alea_prof=mt_rand(0,count( $_SESSION['liste_prof'][$alea_cours][1])-1);

        $liste_ajouter_bdd_prof[]=  $_SESSION['liste_prof'][$alea_cours][1][$nb_alea_prof];

         $alea_salle=mt_rand(0, count($_SESSION['liste_salle'][$alea_cours][1])-1);
        $alea_salle_pour_le_cours=$_SESSION['liste_salle'][$alea_cours][1][$alea_salle];
        $liste_inter[]=["td ".$_SESSION['liste_event_pour_calcul'][$alea_cours][0]." ".$_SESSION['liste_event_pour_calcul'][$alea_cours][2],$formattedDate,$formattedDatefin,"3c78d8","TD","L1S1UE1","$alea_salle_pour_le_cours"];
   
        $_SESSION['liste_event_pour_calcul'][$alea_cours][2]=intval($_SESSION['liste_event_pour_calcul'][$alea_cours][2])-1;
        $liste_ajouter_bdd[]=$liste_inter;
    }
    else if($_SESSION['liste_event_pour_calcul'][$alea_cours][3]>0)
    {   
        foreach ($liste_ajouter_bdd as $ligne) {
                
            foreach ($ligne as $valeur) {
                $dateISO8601 = $valeur[1];
                $dateObj = DateTime::createFromFormat("Y-m-d\TH:i:s", $dateISO8601);

        preg_match_all('/\b([a-zA-Z]+)\b/', $valeur[0], $matches);    
        preg_match('/(\d+)/', $valeur[0], $matchesnum);
        //if meme cours  que c'est bien inferieur and date inf

        if ($_SESSION['liste_event_pour_calcul'][$alea_cours][0] == $matches[0][1] &&  $matchesnum[0]>$_SESSION['liste_event_pour_calcul'][$alea_cours][3] && $dateObj1 < $dateObj) {

            break (3);
            }
        }
        } 
//prof
$nb_alea_prof=mt_rand(0, count($_SESSION['liste_prof'][$alea_cours][0])-1);
       
$liste_ajouter_bdd_prof[]= $_SESSION['liste_prof'][$alea_cours][0][$nb_alea_prof];

        $alea_salle=mt_rand(0, count($_SESSION['liste_salle'][$alea_cours][2])-1);
        $alea_salle_pour_le_cours=$_SESSION['liste_salle'][$alea_cours][2][$alea_salle];
        $liste_inter[]=["tp ".$_SESSION['liste_event_pour_calcul'][$alea_cours][0]." ".$_SESSION['liste_event_pour_calcul'][$alea_cours][3],$formattedDate,$formattedDatefin,"3c78d8","TP","L1S1UE1","$alea_salle_pour_le_cours"];
   
        $_SESSION['liste_event_pour_calcul'][$alea_cours][3]=intval($_SESSION['liste_event_pour_calcul'][$alea_cours][3])-1;

        $liste_ajouter_bdd[]=$liste_inter;
    }

    $nombre_cours_jour_alea--;
    
    }
   
}
    $dateTime->modify('+1 day');
    $dateTimefin->modify('+1 day');
    $nombre_jour_semestre--;
    
}
//------------partie insertion dans la BDD
$nb_tour=0;
foreach ($liste_ajouter_bdd as $ligne) {
    
    foreach ($ligne as $valeur) {
        
        //insertion pour evenemetn 
        $sql = "INSERT INTO evenement(titre_evenement, date_debut_evenement, date_fin_evenement, couleur_evenement, categorie_evenement, id_salle, code_ue)
        VALUES ('" . $valeur[0] . "','" . $valeur[1] . "','" . $valeur[2] . "','" . $valeur[3] . "','" . $valeur[4] . "'," . $valeur[6] . ",'" . $valeur[5] . "')";
        $conn->query($sql);

        $sql = "SELECT MAX(id_evenement) AS max_id FROM evenement";
        $resultat = $conn->query($sql);
        $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
            $id = $ligne['max_id'];
                // insertion group
                $sql = "INSERT INTO evenement_groupe_liaison(id_evenement,code_groupe)
                VALUES ('" . $id . "','" .$_SESSION['formation']. "')";
                    $conn->query($sql);
            
                    // insertion PROF
                    $sql = "INSERT INTO evenement_user_liaison(id_evenement,id_user)
                VALUES ('" . $id . "','" . $liste_ajouter_bdd_prof[$nb_tour]  . "')";
                    $conn->query($sql);
        $nb_tour++;
    }
    
}

}

    ?>