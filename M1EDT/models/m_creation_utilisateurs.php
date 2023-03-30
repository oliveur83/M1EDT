
	<?php
// connexion a la database 
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "m1_edt";


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
}
$sql            = "SELECT * FROM user";
$result_code_u  = $conn->query($sql);
$result_code_u2 = $conn->query($sql);
?>

