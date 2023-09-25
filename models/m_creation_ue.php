<?php
    /*
    Nom du fichier : v_creation_cours.html
    Auteur : Tom OLIVIER
    Date : 27 août 2023
    Description : cette page affiche les element html 
    de creation,modification,supresion de cours
   */
//connexion a la database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "m1_edt";


$conn = mysqli_connect($servername, $username, $password, $database);
//insertion de ue 
if (!empty($_POST['cours'])) {

    $sql = "INSERT INTO ue(code_ue,nom_ue,heures_ue)
    VALUES ('" . $_POST['uec'] . "','" . $_POST['ue'] . "'," . $_POST['ueh'] . ")";
    $conn->query($sql);
}
//modification de ue  
if (!empty($_POST['ue_mod'])) {
    $sql = "UPDATE ue 
    set nom_ue='" . $_POST['ue'] . "',
    code_ue='" . $_POST['label'] . "'
     WHERE code_ue='" . $_POST['ue_mod'] . "'";
   
    $conn->query($sql);
}
//supression de ue
if (!empty($_POST['ue_sup'])) {

    $sql = "DELETE FROM ue WHERE code_ue ='" . $_POST['ue_sup'] . "'";
    $conn->query($sql);
    $sqla = "SELECT evenement.id_evenement as toto FROM evenement where evenement.code_ue IS NULL";

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
// select ue
$sql = "SELECT * FROM ue";
$result_ue = $conn->query($sql);
$result_ue2 = $conn->query($sql);
?>