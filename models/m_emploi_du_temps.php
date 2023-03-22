
	<?php
// pour la size et move 2993

//connexion a la database 
$servername = "localhost";
$username   = "root";
$password   = "";

$conn = new PDO("mysql:host=$servername;dbname=m1_edt", $username, $password);

$conn2 = new PDO("mysql:host=$servername;dbname=m1_edt", $username, $password);
$conn3 = mysqli_connect($servername, $username, $password, "m1_edt");
// selection de base 
$sql   = "SELECT * FROM `evenement`
inner join evenement_groupe_liaison
on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
inner join groupe 
on evenement_groupe_liaison.code_groupe=groupe.code_groupe
inner join salle on evenement.id_salle=salle.id_salle 
inner join evenement_user_liaison 
on evenement.id_evenement=evenement_user_liaison.id_evenement
inner join user 
on evenement_user_liaison.id_user=user.id_user
where groupe.code_groupe='M1DS'";


//--------------------------------------------------
//execution des select en fonction du menu 
// pour la promotion 
if ((!empty($_POST['promotion_select'])) or ($_SESSION['mode'] == 1 and (empty($_POST['salle_select']) and empty($_POST['enseignant_select'])))) {
    // on fais ca pour clique sur autre salle ou enseignant l'emploi du temps reste le même
    
    if (!empty($_POST['promotion_select'])) {
        $_SESSION["groupe"] = $_POST['promotion_select'];
    }
    
    $sql = "SELECT * FROM `evenement`
        inner join evenement_groupe_liaison on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
        inner join groupe 
        on evenement_groupe_liaison.code_groupe=groupe.code_groupe
        inner join salle on evenement.id_salle=salle.id_salle 
 inner join evenement_user_liaison 
 on evenement.id_evenement=evenement_user_liaison.id_evenement
  inner join user 
  on evenement_user_liaison.id_user=user.id_user
        where groupe.code_groupe='" . $_SESSION["groupe"] . "'";
    
    $_SESSION["mode"] = 1;
    
}
// pour la salle 
elseif (!empty($_POST['salle_select']) or ($_SESSION['mode'] == 2 and empty($_POST['enseignant_select']))) {
    //voir commenaire 18
    if (!empty($_POST['salle_select'])) {
        $_SESSION["salle"] = $_POST['salle_select'];
        
    }
    $sql = "SELECT * FROM evenement 
    inner join salle on evenement.id_salle=salle.id_salle
    inner join evenement_groupe_liaison 
on evenement.id_evenement=evenement_groupe_liaison.id_evenement
 inner join groupe 
 on evenement_groupe_liaison.code_groupe=groupe.code_groupe 
 inner join evenement_user_liaison 
 on evenement.id_evenement=evenement_user_liaison.id_evenement
  inner join user 
  on evenement_user_liaison.id_user=user.id_user
     where evenement.id_salle=" . $_SESSION["salle"];
    
    $_SESSION["mode"] = 2;
}
// pour les enseignant 
    elseif (!empty($_POST['enseignant_select']) or $_SESSION['mode'] == 3) {
    if (!empty($_POST['enseignant_select'])) {
        $_SESSION["ens"] = $_POST['enseignant_select'];
    }
    $sql = "SELECT * FROM `evenement`
    inner join evenement_groupe_liaison 
on evenement.id_evenement=evenement_groupe_liaison.id_evenement
 inner join groupe 
 on evenement_groupe_liaison.code_groupe=groupe.code_groupe 
 inner join salle on evenement.id_salle=salle.id_salle 
    inner join evenement_user_liaison on evenement.id_evenement=evenement_user_liaison.id_evenement 
    inner join user on evenement_user_liaison.id_user=user.id_user
    where user.id_user=" . $_SESSION["ens"];
    
    
    $_SESSION["mode"] = 3;
} else {
    
    $_SESSION['mode'] = 0;
}

$result = $conn->query($sql);
//-----------------------------------------
//clique sur les bouton du menu 
if (!empty($_POST['promotion'])) {
    
    $sql     = "SELECT * FROM groupe";
    $resultt = $conn2->query($sql);
    
}
if (!empty($_POST['salle'])) {
    
    $sql          = "SELECT * FROM salle";
    $result_salle = $conn2->query($sql);
    
}
if (!empty($_POST['enseignant'])) {
    
    $sql        = "SELECT * FROM user";
    $result_ens = $conn2->query($sql);
    
}
//------------------------------------------
// pour le test de connexion    
if (!empty($_POST['username'])) {
    
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        $_SESSION["admin"] = TRUE;
        
    } else {
        $_SESSION["admin"] = FALSE;
        
    }
    
}
$i = 0;

//pour bouton semaine precedente ou suivante 
// pour n semaines 
if (!empty($_POST['date_p'])) {
    $_SESSION["index"] = intval($_POST['semaine']) - 1;
    $date              = date('Y-m-d', strtotime('+' . $_SESSION["index"] . 'week'));
    $_SESSION["date"]  = $date;
} elseif (!empty($_POST['date_s'])) {
    $_SESSION["index"] = intval($_POST['semaine']) + 1;
    $date              = date('Y-m-d', strtotime('+' . $_SESSION["index"] . 'week'));
    $_SESSION["date"]  = $date;
} else {
    
    $date = $_SESSION["date"];
}

// pour enregistrer les modification 
if (isset($_GET["id"])) {
    if ($_GET["id"] == -1) {
        // deplacement et size
        
        $start = $_GET["start"];
        $end   = $_GET["end"];
        $id    = $_GET["cle"];
        
        if (test_de_modification()) {
            
            $sql    = "UPDATE evenement set " . "
            date_fin_evenement ='" . $end . "',
            date_debut_evenement ='" . $start . "'
             WHERE id_evenement=" . $id;
            $result = $conn2->query($sql);
        }
    } else {
        //pour la modification du forrmulaire 
        $id    = $_GET["id"];
        $start = $_GET["start"];
        $end   = $_GET["end"];
        $text  = $_GET["text"];
        
        $barcolor = $_GET["barcolor"];
        
        
        $sql    = "UPDATE evenement set " . "
       date_fin_evenement ='" . $end . "',
       date_debut_evenement ='" . $start . "',
       titre_evenement ='" . $text . "',
       couleur_evenement ='" . $barcolor . "'
        WHERE id_evenement=" . $id;
        $result = $conn2->query($sql);
    }
?>

<script type="text/javascript">
    //reactualise la page 
 window.location.href = "emploi_du_temps"
 </script>  <?php
}
function test_de_modification()
{
    //pour tester si il y a un chauvechement 
    global $conn3;
    $result = false;
    $sql1   = "SELECT * FROM evenement 
    inner join evenement_user_liaison 
    on evenement.id_evenement=evenement_user_liaison.id_evenement
    inner join evenement_groupe_liaison
    on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
        WHERE ((date_debut_evenement <= '" . $_GET['start'] . "'
        AND date_fin_evenement >= '" . $_GET['end'] . "') OR 
        (date_debut_evenement >=' " . $_GET['start'] . " '
        AND date_fin_evenement <= '" . $_GET['end'] . "') OR 
        (date_debut_evenement <= '" . $_GET['start'] . "'
        AND date_fin_evenement >= '" . $_GET['start'] . "' 
        AND date_fin_evenement <= '" . $_GET['end'] . "')OR
        (date_debut_evenement >= '" . $_GET['start'] . "' AND 
        date_debut_evenement <= '" . $_GET['end'] . "' AND 
        date_fin_evenement >= '" . $_GET['end'] . "')  ) 
        AND (id_salle = " . $_GET['salle'] . "
        OR code_groupe = '" . $_GET['code_groupe'] . "'
        OR id_user= " . $_GET['code_user'] . " )
        AND evenement.id_evenement !=" . $_GET['cle'] . " ";
    print($sql1);
    $result_salle = $conn3->query($sql1);
    //$result=mysqli_query($conn3, $sql1);
    while ($rowEns = $result_salle->fetch_assoc()) {
        $result = True;
    }
    if ($result == False) {
        echo "true";
        return True;
    } else {
        echo "false";
        return False;
    }
}
?> 
