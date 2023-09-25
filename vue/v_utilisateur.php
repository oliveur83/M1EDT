<!DOCTYPE html>
<html>

<head>
    <!--
     Nom du fichier : v_utilisateur.html
     Auteur : Tom OLIVIER
     Date : 27 août 2023
     Description : cette page affiche les element html 
     de creation,modification,supresion de utilisateur
    -->
    <title>Gestion utilisateur - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>

    </form>
    <center>
        <div id="container">
            <!-- zone de connexion -->
            <form action="creationutilisateur" method="post">
                <h1>CREATION utilisateur</h1>
                <label><b> nom</b></label>
                <input type="text" name="nom">
                <label><b> prenom</b></label>
                <input type="text" name="prenom">
                <input type="submit" value="enregistre ">
            </form>
            <form action="creationutilisateur" method="post">
                <h1>MODIFICATION utilisateur</h1>
                <label><b> nom</b></label>
                <input type="text" name="nom1">
                <label><b> prenom</b></label>
                <input type="text" name="prenom">
                <label><b> identifiant du user </b></label>
                <select id="user_mod" name="user_mod">
                    <?php
                    // variable contenue dans models/m_utilisateur.php
                    while ($rowEns = $result_code_u->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . " " . $rowEns["prenom_user"] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="enregistre ">
            </form>
            <form action="creationutilisateur" method="post">
                <h1>SUPPRIMER utilisateur</h1>
                <label><b> identifiant du user </b></label>
                <select id="user_sup" name="user_sup">
                    <?php
                    // variable contenue dans models/m_utilisateur.php
                    
                    while ($rowEns = $result_code_u2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . " " . $rowEns["prenom_user"] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="enregistre ">
                </form>
            <form action="emploi_du_temps" method="post">
                <input type="submit" value="retour ">
            </form>
        </div>

</body>

</html>