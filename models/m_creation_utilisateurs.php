<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "m1_edt";
//On établit la connexion
$conn = mysqli_connect($servername, $username, $password, $database);
if (!empty($_POST['nom'])) {
    $sql = "INSERT INTO user(nom_user,prenom_user)
    VALUES ('".$_POST['nom']."','".$_POST['prenom']."')";
mysqli_query($conn, $sql);
}

?>