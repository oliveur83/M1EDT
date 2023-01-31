<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "m1edt";
//On établit la connexion
$conn = mysqli_connect($servername, $username, $password, $database);
if (!empty($_POST['cours'])) {
    $sql = "INSERT INTO cours(text,start,end,barcolor)
    VALUES ('".$_POST['text']."', '".$_POST['start'].":00', '".$_POST['end'].":00','".$_POST['barcolor']."')";
mysqli_query($conn, $sql);
    echo $_POST['start'];
header('Location: http://localhost/M1EDT/PHP/emploi_du_temp.php');

}

?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../CSS/style.css" media="screen" type="text/css" />

</head>

<body>
    
    </form>
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creation_cours.php" method="post">
    <h1>CREATION EVENEMENT</h1>    
    <label><b> text</b></label>
        <input type="text" name="text">
        <label><b>start </b></label>
        <input type="datetime-local" name="start">
        <label><b> end</b></label>
        <input type="datetime-local" name="end">
        <label><b> colorbar</b></label>
        <input type="text" name="barcolor">
        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="enregistre ">

    </div>
</body>

</html>