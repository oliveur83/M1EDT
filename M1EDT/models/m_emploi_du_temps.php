<?php
// resize 926 calendar 2933
//ligne 2983 faire la modifcaticaton


$servername = "localhost";
$username   = "root";
$password   = "";

//On établit la connexion
$conn   = new PDO("mysql:host=$servername;dbname=m1_edt", $username, $password);
$sql    = "SELECT * FROM `evenement`
inner join evenement_groupe_liaison on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
inner join groupe on evenement_groupe_liaison.code_groupe=groupe.code_groupe
where groupe.code_groupe='M1DS'";
$result = $conn->query($sql);

//--------------------------------------------------
//execution des select en fonction du menu 
if ((!empty($_POST['promotion_select'])) or ($_SESSION['mode'] == 1 and  ( empty($_POST['salle_select']) and empty($_POST['enseignant_select']  )))) {
    // on fais ca pour clique sur autre salle ou enseignant l'emploi du temps reste le même
    echo" je suis la ";
    if (!empty($_POST['promotion_select'])) {
        $_SESSION["groupe"] = $_POST['promotion_select'];
    }
    
        $sql = "SELECT * FROM `evenement`
        inner join evenement_groupe_liaison on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
        inner join groupe on evenement_groupe_liaison.code_groupe=groupe.code_groupe
        where groupe.code_groupe='" . $_SESSION["groupe"]   . "'";
   
    $result           = $conn->query($sql);
    $_SESSION["mode"] = 1;
   
} elseif (!empty($_POST['salle_select']) or ($_SESSION['mode'] == 2 and empty($_POST['enseignant_select']))) {
    //voir commenaire 18
    if (!empty($_POST['salle_select'])) {
        $_SESSION["salle"] = $_POST['salle_select'];
        
    }
   $sql              = "SELECT * FROM evenement 
    inner join salle on evenement.id_salle=salle.id_salle
     where evenement.id_salle=" . $_SESSION["salle"];
    $result           = $conn->query($sql);
   
    $_SESSION["mode"] = 2;
} elseif (!empty($_POST['enseignant_select']) or $_SESSION['mode'] == 3) {
    if (!empty($_POST['enseignant_select'])) {
        $_SESSION["ens"] = $_POST['enseignant_select'];
    }
    $sql              = "SELECT * FROM `evenement`
    inner join evenement_user_liaison on evenement.id_evenement=evenement_user_liaison.id_evenement 
    inner join user on evenement_user_liaison.id_user=user.id_user
    where user.id_user=" . $_SESSION["ens"];
    $result           = $conn->query($sql);
    
    $_SESSION["mode"] = 3;
} else {
    
    $_SESSION['mode'] = 0;
}
//-----------------------------------------
//clique sur les bouton du menu 
if (!empty($_POST['promotion'])) {
    
    $sql     = "SELECT * FROM groupe";
    $resultt = $conn->query($sql);
    
}
if (!empty($_POST['salle'])) {
    
    $sql          = "SELECT * FROM salle";
    $result_salle = $conn->query($sql);
    
}
if (!empty($_POST['enseignant'])) {
    
    $sql        = "SELECT * FROM user";
    $result_ens = $conn->query($sql);
    
}
//------------------------------------------
// pour le test de connexion    
if (!empty($_POST['username'])) {
    
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        $_SESSION["admin"]=TRUE;
        
    }
    else{
        $_SESSION["admin"]=FALSE;
  
    }

}
$i = 0;

//pour bouton semaine precedente ou suivante 
// pour n semaines 
if (!empty($_POST['date_p'])) {
    $i    = intval($_POST['semaine']) - 1;
    $date = date('Y-m-d', strtotime('+' . $i . 'week'));
} elseif (!empty($_POST['date_s'])) {
    $i    = intval($_POST['semaine']) + 1;
    $date = date('Y-m-d', strtotime('+' . $i . 'week'));
} else {
    $date = date("Y-m-d");
}

// pour enregistrer les modification 
if (isset($_GET["id"])) {
    if ($_GET["id"] == -1) {
        
        $start  = $_GET["start"];
        $end    = $_GET["end"];
        $id     = $_GET["cle"];
        $sql    = "UPDATE evenement set " . "
            date_fin_evenement ='" . $end . "',
            date_debut_evenement ='" . $start . "'
             WHERE id_evenement=" . $id;
        $result = $conn->query($sql);
        
    } elseif ($_GET["id"] == 0) {
        //on ajoute sur le planning 
        
        $start    = $_GET["start"];
        $end      = $_GET["end"];
        $text     = $_GET["text"];
        $barcolor = $_GET["barcolor"];
        
        $sql      = "INSERT INTO evenement(titre_evenement,date_debut_evenement,date_fin_evenement,couleur_evenement)
           VALUES ('" . $text . "', '" . $start . "', '" . $end . "','" . $barcolor . "')";
        $conn->query($sql);
    } else {
        //pour la modification
        $id       = $_GET["id"];
        $start    = $_GET["start"];
        $end      = $_GET["end"];
        $text     = $_GET["text"];
        
        $barcolor = $_GET["barcolor"];
      
       
        $sql      = "UPDATE evenement set " . "
       date_fin_evenement ='" . $end . "',
       date_debut_evenement ='" . $start . "',
       titre_evenement ='" . $text . "',
       couleur_evenement ='" . $barcolor ."'
        WHERE id_evenement=" . $id;
        $result   = $conn->query($sql);
    }
?>

<script type="text/javascript">
    //reactualise la page 
 window.location.href = "emploi_du_temps"
 </script>  <?php
}

?> 