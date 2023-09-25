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
// insertion utilisateur 
if (!empty($_POST['nom'])) {

    $sql = "INSERT INTO user(nom_user,prenom_user)
    VALUES ('" . $_POST['nom'] . "','" . $_POST['prenom'] . "')";
    mysqli_query($conn, $sql);
}
//modification utilisateur 
if (!empty($_POST['user_mod'])) {

    $sql = "UPDATE user 
    set nom_user='" . $_POST['nom1'] . "',
    prenom_user='" . $_POST['prenom'] . "'
     WHERE id_user=" . $_POST['user_mod'];
    $conn->query($sql);
}
// supresion utilisateur 
if (!empty($_POST['user_sup'])) {

    $sql = "DELETE FROM user WHERE id_user ='" . $_POST['user_sup'] . "'";
    $conn->query($sql);
    $sqla = "SELECT evenement.id_evenement as toto FROM evenement LEFT JOIN evenement_user_liaison ON evenement_user_liaison.id_evenement = evenement.id_evenement where evenement_user_liaison.id_evenement IS NULL";

    // Executer la requête
    $result = mysqli_query($conn, $sqla);
   
    // Vérifier si la requête a échoué
    if (!$result) {
        echo "Erreur de requête : (" . mysqli_errno($conn) . ") " . mysqli_error($conn);
    } else {
        // Vérifier si la requête a retourné des résultats
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
                // Traitement des données ici
                $sqla = "DELETE FROM evenement WHERE id_evenement ='" . $row['toto']. "'";
                // Executer la requête
                $resultt = mysqli_query($conn, $sqla);
            }
        } else {
            echo "La requête est vide.";
        }
    }
}
$sql = "SELECT * FROM user";
$result_code_u = $conn->query($sql);
$result_code_u2 = $conn->query($sql);
?>