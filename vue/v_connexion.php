<html>

<head>
    <meta charset="utf-8">
    <title>Connexion - EDT</title>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../CSS/style.css" media="screen" type="text/css" />
</head>

<body>
    <center>
    <div id="container">
        <!-- zone de connexion -->

        <form action="emploi_du_temps" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='Se connecter'>

        </form>
    </div>
</center>
</body>

</html>