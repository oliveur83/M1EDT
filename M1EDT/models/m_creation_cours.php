<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "m1_edt";
//insertion de evenement 
$conn = mysqli_connect($servername, $username, $password, $database);
if (!empty($_POST['cours'])) {
    $sql = "INSERT INTO evenement(titre_evenement,date_debut_evenement,date_fin_evenement,couleur_evenement,categorie_evenement,id_salle,code_ue)
    VALUES ('".$_POST['text']."','".$_POST['start'].":00','".$_POST['end'].":00','".$_POST['barcolor']."','".$_POST['categorie']."',".$_POST['salle'].",'".$_POST['code_ue']."')";
$conn->query($sql);
}
// select salle
$sql= "SELECT * FROM salle";
$result_salle = $conn->query($sql);
//select ue 
$sql= "SELECT * FROM ue";
$result_code = $conn->query($sql);

?>
