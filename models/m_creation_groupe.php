
	<?php
// connexion a la database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "m1_edt";

$conn = mysqli_connect($servername, $username, $password, $database);
$conn2 = mysqli_connect($servername, $username, $password, $database);

//insertion de groupe 
if (!empty($_POST['cours'])) {
    $sql = "INSERT INTO groupe(code_groupe,nom_groupe)
    VALUES ('" . $_POST['groupec'] . "','" . $_POST['groupe'] . "')";
    $conn->query($sql);
}
//modification groupe
if (!empty($_POST['groupe_mod'])) {
    $sql = "UPDATE groupe 
    set nom_groupe='" . $_POST['groupe'] . "',
    code_groupe='" . $_POST['code_groupe'] . "'
     WHERE code_groupe='" . $_POST['groupe_mod'] . "'";
  
    $conn2->query($sql);
}
//supresion groupe 
if (!empty($_POST['groupe_sup'])) {
    
    //$sql = "DELETE FROM groupe WHERE code_groupe ='" . $_POST['groupe_sup'] . "'";
    //$conn->query($sql);
    $sqla = "SELECT * FROM evenement LEFT JOIN evenement_groupe_liaison ON evenement_groupe_liaison.id_evenement = evenement.id_evenement where evenement_groupe_liaison.id_evenement IS NULL";

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
                print_r($row);
                if ($row['id_evenement']==62)
                {
                    echo "ptn je suis trop fort";
                }
                    //$sql = "DELETE FROM evenement WHERE titre_evenement ='" . $row['titre_evenement'] . "'";
                    //$conn->query($sql);
            }
        } else {
            echo "La requête est vide.";
        }
    }
}
// select groupe
$sql            = "SELECT * FROM groupe";
$result_groupe  = $conn->query($sql);
$result_groupe2 = $conn->query($sql);
?>

