<?php

$servername = "localhost";
$username = "root";
$password = "";

//On établit la connexion
$conn = new PDO("mysql:host=$servername;dbname=m1edt", $username, $password);
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <?php // faire coorectement ?>
    <form action="emploi_du_temp.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="pass">Password (8 characters minimum):</label>
        <input type="password" id="pass" name="password" minlength="8" required>
    </form>
</body>

</html>