

	   <?php
//-------------connexion a la base de donnée--------------
$servername              = "localhost";
$username                = "root";
$password                = "";
$database                = "m1_edt";
$validation              = false;
$validation_modification = false;
$heure_ue                = null;
//insertion de evenement 
$conn                    = mysqli_connect($servername, $username, $password, $database);
$conn1                   = mysqli_connect($servername, $username, $password, $database);
//---------------------------------------------------------
//insertion cours
if (!empty($_POST['cours'])) {
    //test au niveaux des heures 
    test_de_validation();
    test_de_chevauchement_insert();
    print($validation.$validation_insertion_chevauchement);
    //if le test est valider
    if ($validation and $validation_insertion_chevauchement) {
        //insertion dans evenement 
        $sql = "INSERT INTO evenement(titre_evenement,date_debut_evenement,date_fin_evenement,couleur_evenement,categorie_evenement,id_salle,code_ue)
    VALUES ('" . $_POST['text'] . "','" . $_POST['start'] . ":00','" . $_POST['end'] . ":00','" . $_POST['barcolor'] . "','" . $_POST['categorie'] . "'," . $_POST['salle'] . ",'" . $_POST['code_ue'] . "')";
        $conn->query($sql);
        
        //recherce de la clé de notre evenment que l'on vien inserer
        $sql      = "select max(id_evenement) from evenement";
        $resultat = $conn->query($sql);
        $lignes   = $resultat->fetch_assoc();
        foreach ($lignes as $ligne) {
            $max = $ligne;
        }
        
        // insertion group
        $sql = "INSERT INTO evenement_groupe_liaison(id_evenement,code_groupe)
    VALUES ('" . $max . "','" . $_POST['code_groupe'] . "')";
        $conn->query($sql);
        
        // insertion salle
        $sql = "INSERT INTO evenement_user_liaison(id_evenement,id_user)
    VALUES ('" . $max . "','" . $_POST['code_user'] . "')";
        $conn->query($sql);
        
        // on fait le mise a jour dans ue 
        $sql = "UPDATE ue set heures_ue=" . $heure_ue . "
    where code_ue='" . $_POST['code_ue'] . "'";
        $conn->query($sql);
        
    }
    
}
//modification cours
if (!empty($_POST['id_ev'])) {
    //test de modification chevauchement 
    test_de_modification();
    //if le test est valide

    if ($validation_modification) {
        test_de_modification_heure();
        // modification coté evenement 
        $sql = "UPDATE evenement
    set titre_evenement='" . $_POST['text'] . "',
    date_debut_evenement='" . $_POST['start2'] . ":00',
    date_fin_evenement='" . $_POST['end2'] . ":00',
    categorie_evenement='" . $_POST['categorie'] . "',
    couleur_evenement='" . $_POST['barcolor'] . "',
    code_ue='" . $_POST['code_ue'] . "',
    id_salle=" . $_POST['salle'] . "

     WHERE id_evenement=" . $_POST['id_ev'];
        $conn->query($sql);
    //modification cote ue 
    $sql          = "SELECT heures_ue FROM ue where code_ue='" . $_POST['code_ue'] . "'";
    $result_salle = $conn->query($sql);
    $lignes       = $result_salle->fetch_assoc();
    foreach ($lignes as $ligne) {
        $heure_ue = $ligne;
    }
   
    $date_debut_database= strtotime($_POST["start2"]);
    $date_fin_database= strtotime($_POST["end2"]);
    $diff_seconds = $date_fin_database - $date_debut_database;
    $diff = floor(($diff_seconds % (60 * 60 * 24)) / (60 * 60));   
 
    $result_h=$heure_ue-$diff;
    
    $sql = "UPDATE ue 
    set heures_ue=" .$result_h. "
     WHERE code_ue='" . $_POST['code_ue'] . "'";
    $conn->query($sql);
    }
}
// supression cours 
if (!empty($_POST['id_ev2'])) {
    // TODO rajouter les heures
    test_de_modification_heure_sup() ;
    $sql = "DELETE FROM evenement    WHERE id_evenement =" . $_POST['id_ev2'];
    $conn->query($sql);
}

// ---------------selection pour le front------------------
// select salle
$sql            = "SELECT * FROM salle";
$result_salle   = $conn->query($sql);
$result_salle2  = $conn->query($sql);
//select ue 
$sql            = "SELECT * FROM ue";
$result_code    = $conn->query($sql);
$result_code2   = $conn->query($sql);
//select groupe
$sql            = "SELECT * FROM groupe";
$result_code_g  = $conn->query($sql);
$result_code_g2 = $conn->query($sql);
//select user
$sql            = "SELECT * FROM user";
$result_code_u  = $conn->query($sql);

$result_code_u2 = $conn->query($sql);

$sql             = "SELECT * FROM evenement";
$result_code_id  = $conn->query($sql);
$result_code_id2 = $conn->query($sql);
//-------------------------------------------
function test_de_modification_heure()
// pour la modification ,changement d'heure 
{
    global $validation, $heure_ue;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "m1_edt";
    $conn       = mysqli_connect($servername, $username, $password, $database);
    
    $sql          = "SELECT heures_ue FROM ue where code_ue='" . $_POST['code_ue'] . "'";
    $sql11       ="SELECT* FROM evenement where id_evenement='" . $_POST['id_ev'] . "'";
 
    $result_salle = $conn->query($sql);
    $lignes       = $result_salle->fetch_assoc();
    //recuperation de l'heure de ue 
    foreach ($lignes as $ligne) {
        $heure_ue = $ligne;
    }
    $result_ev = $conn->query($sql11);
    // recuperation de date de fin et de debut 
    while ($rowEns = $result_ev->fetch_assoc()) {
    
        $date_debut_database= strtotime($rowEns["date_debut_evenement"]);
        
        $date_fin_database= strtotime($rowEns["date_fin_evenement"]);
    }
    // faire la difference 
    $diff_seconds = $date_fin_database - $date_debut_database;
    $diff = floor(($diff_seconds % (60 * 60 * 24)) / (60 * 60));   
    $result_h=$diff+$heure_ue;
    $sql = "UPDATE ue 
    set heures_ue=" .$result_h. "
     WHERE code_ue='" . $_POST['code_ue'] . "'";
    $conn->query($sql);
echo "la difference est de ".$diff. "est l'heure de ue ".$heure_ue." ".$result_h;
}
function test_de_modification_heure_sup()
// pour la modification ,changement d'heure 
{
    global $validation, $heure_ue;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "m1_edt";
    $conn       = mysqli_connect($servername, $username, $password, $database);
    

    $sql11       ="SELECT* FROM evenement where id_evenement='" . $_POST['id_ev2'] . "'";
    $result_ev = $conn->query($sql11);
    // recuperation de date de fin et de debut 
    while ($rowEns = $result_ev->fetch_assoc()) {
    
        $date_debut_database= strtotime($rowEns["date_debut_evenement"]);
        
        $date_fin_database= strtotime($rowEns["date_fin_evenement"]);
        $code_ue=$rowEns["code_ue"];    
    }

    $sql          = "SELECT heures_ue FROM ue where code_ue='" . $code_ue . "'";
 
    $result_salle = $conn->query($sql);
    $lignes       = $result_salle->fetch_assoc();
    //recuperation de l'heure de ue 
    foreach ($lignes as $ligne) {
        $heure_ue = $ligne;
    }
    // faire la difference 
    $diff_seconds = $date_fin_database - $date_debut_database;
    $diff = floor(($diff_seconds % (60 * 60 * 24)) / (60 * 60));   
    $result_h=$diff+$heure_ue;



    $sql = "UPDATE ue 
    set heures_ue=" .$result_h. "
     WHERE code_ue='" . $code_ue . "'";
    $conn->query($sql);
echo "la difference est de ".$diff. "est l'heure de ue ".$heure_ue." ".$result_h;
}
function test_de_modification()
// dans cette fonction on test le chevauchement 
{
    // soit si c'est une salle un prof ou un groupe
    global $validation_modification, $conn1;
    $sql1   = "SELECT * FROM evenement 
        inner join evenement_user_liaison 
        on evenement.id_evenement=evenement_user_liaison.id_evenement
        inner join evenement_groupe_liaison
        on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
            WHERE ((date_debut_evenement <= '" . $_POST['start2'] . "'
            AND date_fin_evenement >= '" . $_POST['end2'] . "') OR 
            (date_debut_evenement >=' " . $_POST['start2'] . " '
            AND date_fin_evenement <= '" . $_POST['end2'] . "') OR 
            (date_debut_evenement <= '" . $_POST['start2'] . "'
            AND date_fin_evenement >= '" . $_POST['start2'] . "' 
            AND date_fin_evenement <= '" . $_POST['end2'] . "')OR
            (date_debut_evenement >= '" . $_POST['start2'] . "' AND 
            date_debut_evenement <= '" . $_POST['end2'] . "' AND 
            date_fin_evenement >= '" . $_POST['end2'] . "')  ) 
            AND (id_salle = " . $_POST['salle'] . "
            OR code_groupe = '" . $_POST['code_groupe'] . "'
            OR id_user= " . $_POST['code_user'] . " )
            AND evenement.id_evenement !=" . $_POST['id_ev'] . " ";
    $result = mysqli_query($conn1, $sql1);
    print($sql1);
    if ($result == False) {
        $validation_modification = True;
    }
}
function test_de_validation()
// test validation au niveux des heure pour l'ue 
{
    //TODO insertion chevauchement 
    global $validation, $heure_ue;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "m1_edt";
    $conn       = mysqli_connect($servername, $username, $password, $database);
    
    $sql          = "SELECT heures_ue FROM ue where code_ue='" . $_POST['code_ue'] . "'";
    $result_salle = $conn->query($sql);
    $lignes       = $result_salle->fetch_assoc();
    foreach ($lignes as $ligne) {
        $heure_ue = $ligne;
    }
    // faire la soustraction 
    $date1      = new datetime($_POST['start']);
    $date2      = new datetime($_POST['end']);
    $diff       = $date1->diff($date2);
    $diff_hours = $diff->h + ($diff->days * 24);
    $heure_ue   = $heure_ue - $diff_hours;
    if ($heure_ue >= 0) {
        $validation = True;
    } else {
        $validation = false;
    }
}
function test_de_chevauchement_insert()
// dans cette fonction on test le chevauchement 
{
    // soit si c'est une salle un prof ou un groupe
    global $validation_insertion_chevauchement, $conn1;
    $sql1   = "SELECT * FROM evenement 
        inner join evenement_user_liaison 
        on evenement.id_evenement=evenement_user_liaison.id_evenement
        inner join evenement_groupe_liaison
        on evenement.id_evenement=evenement_groupe_liaison.id_evenement 
            WHERE ((date_debut_evenement <= '" . $_POST['start'] . ":00'
            AND date_fin_evenement >= '" . $_POST['end'] . ":00') OR 
            (date_debut_evenement >=' " . $_POST['start'] . ":00'
            AND date_fin_evenement <= '" . $_POST['end'] . ":00') OR 
            (date_debut_evenement <= '" . $_POST['start'] . ":00'
            AND date_fin_evenement >= '" . $_POST['start'] . ":00' 
            AND date_fin_evenement <= '" . $_POST['end'] . ":00')OR
            (date_debut_evenement >= '" . $_POST['start'] . ":00' AND 
            date_debut_evenement <= '" . $_POST['end'] . ":00' AND 
            date_fin_evenement >= '" . $_POST['end'] . ":00')  ) 
            AND (id_salle = " . $_POST['salle'] . "
            OR code_groupe = '" . $_POST['code_groupe'] . "'
            OR id_user= " . $_POST['code_user'] . " )";
    
    $result = mysqli_query($conn1, $sql1);
    if ($rowEns = $result->fetch_assoc()) {
        $result = false;
    }
    if ($result) {
        $validation_insertion_chevauchement = True;
    } else {
       
       
        $validation_insertion_chevauchement = false;
    }
}
