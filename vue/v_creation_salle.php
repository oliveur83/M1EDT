<!DOCTYPE html>
<html>

<head>
    <!--
     Nom du fichier : v_creation_salle.html
     Auteur : Tom OLIVIER
     Date : 27 août 2023
     Description : cette page affiche les element html 
     de creation,modification,supresion de salle
    -->
    <title>Création salle - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>


    <center>
        <div id="container">
            <!-- zone de connexion -->
            <form action="creationsalle" method="post">
                <h1>CREATION salle</h1>
                <label><b> text</b></label>
                <input type="text" name="salle">

                <input type="hidden" name="cours" value="cours">
                <input type="submit" value="enregistre ">
            </form>
            <br>
            <form action="creationsalle" method="post">
                <h1>MODIFIER salle</h1>
                <label><b> salle</b></label>
                <select id="salle_mod" name="salle_mod">
                    <?php
                    // variable contenue dans models/m_creation_salle.php
                    while ($rowEns = $result_salle->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                    }
                    ?>
                </select>
                <input type="text" name="salle">
                <input type="submit" value="modifier">
            </form>
            <br>
            <form action="creationsalle" method="post">
                <h1>SUPRIMER salle</h1>
                <label><b> salle</b></label>
                <select id="salle_sup" name="salle_sup">
                    <?php
                    // variable contenue dans models/m_creation_salle.php
                    while ($rowEns = $result_salle2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="modifier">
            </form>

            <form action="emploi_du_temps" method="post">
                <input type="submit" value="retour ">
            </form>
        </div>
</body>

</html>