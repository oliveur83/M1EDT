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
   

}

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <form action="creation_cours.php" method="post">
        <p> text</p>
        <input type="text" name="text">
        <p> start </p>
        <input type="datetime-local" name="start">
        <p> end</p>
        <input type="datetime-local" name="end">
        <p> colorbar</p>
        <input type="text" name="barcolor">
        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="enregistre ">

    </form>
</body>

</html>