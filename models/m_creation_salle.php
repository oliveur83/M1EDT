<?php
    /*
    Nom du fichier : v_creation_cours.html
    Auteur : Tom OLIVIER
    Date : 27 août 2023
    Description : cette page affiche les element html 
    de creation,modification,supresion de cours
   */
// connexion a la database
$servername = "localhost";
$username = "root";
$password = "";
$database = "m1_edt";

$conn = mysqli_connect($servername, $username, $password, $database);
//insertion de groupe 
if (!empty($_POST['cours'])) {
    $sql = "INSERT INTO salle(nom_salle)
    VALUES ('" . $_POST['salle'] . "')";
    $conn->query($sql);
}
//modification groupe
if (!empty($_POST['salle_mod'])) {
    $sql = "UPDATE salle 
    set nom_salle='" . $_POST['salle'] . "'
     WHERE id_sallE=" . $_POST['salle_mod'] . "";
    $conn->query($sql);
}
//supresion groupe 
if (!empty($_POST['salle_sup'])) {

    $sql = "DELETE FROM salle WHERE id_salle ='" . $_POST['salle_sup'] . "'";
    $conn->query($sql);
}
// select groupe
$sql = "SELECT * FROM salle";
$result_salle = $conn->query($sql);
$result_salle2 = $conn->query($sql);
?>