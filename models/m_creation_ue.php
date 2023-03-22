
	<?php
//connexion a la database 
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "m1_edt";

$conn = mysqli_connect($servername, $username, $password, $database);
//insertion de ue 
if (!empty($_POST['cours'])) {
    echo $_POST['uec'] . $_POST['ue'] . $_POST['ueh'];
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
     print($sql);
    $conn->query($sql);
}
//supression de ue
if (!empty($_POST['ue_sup'])) {
    
    $sql = "DELETE FROM ue WHERE code_ue ='" . $_POST['ue_sup'] . "'";
    $conn->query($sql);
}
// select ue
$sql        = "SELECT * FROM ue";
$result_ue  = $conn->query($sql);
$result_ue2 = $conn->query($sql);
?>
