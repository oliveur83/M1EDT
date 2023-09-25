<!DOCTYPE html>
<html>

<head>
    <!--
     Nom du fichier : v_creation_cours.html
     Auteur : Tom OLIVIER
     Date : 27 août 2023
     Description : cette page affiche les element html 
     de creation,modification,supresion de cours
    -->
    <title>Création cours - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>
    <center>
        <div id="container">
            <form action="creationcours" method="post">
                <h1>CREATION EVENEMENT</h1>
                <label><b>Titre</b></label>
                <input type="text" id="responseinsert" name="text" oninput="validerReponseinsert()">
                <div id="messageinsert"></div>
                <br>
                <label><b>Début</b></label>
                <input type="datetime-local" id="start" name="start">
                <label><b>Fin</b></label>
                <input type="datetime-local"id="end" name="end">
                <br>
                <label><b>Couleur</b></label>
                <select id="barcolor" name="barcolor">
                    <option value="3c78d8">Bleu</option>
                    <option value="6aa84f">Vert</option>
                    <option value="f1c232">Jaune</option>
                    <option value="cc0000">Rouge</option>
                </select><br>
                <label><b>UE</b></label>
                <select id="code_ue" name="code_ue">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code->fetch_assoc()) {

                        echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <label><b>Enseignant</b></label>
                <select id="code_user" name="code_user">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_u->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Groupe</b></label>
                <select id="code_groupe" name="code_groupe">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_g->fetch_assoc()) {

                        echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Catégorie</b></label>
                <select id="categorie" name="categorie">
                    <option value="CM">CM</option>
                    <option value="TP">TP</option>
                    <option value="TD">TD</option>
                </select> <br>
                <label><b>Salle</b></label>
                <select id="salle" name="salle">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_salle->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                    }
                    ?>
                    <input type="hidden" name="cours" value="cours">
                    <input type="submit" id="submitBtninsert" disabled value="Enregistrer">
            </form>
            <form action="creationcours" method="post">
                <h1>MODIFICATION EVENEMENT</h1>
                <select id="id_ev" name="id_ev">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_id->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_evenement"] . '">' . $rowEns["titre_evenement"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Titre</b></label>
                <input type="text" id="response" name="text" oninput="validerReponsemod()"> <br>
                <div id="message"></div>
                <label><b>Début</b></label>
                <input type="datetime-local" id="start2" name="start2">
                <label><b>Fin</b></label>
                <input type="datetime-local" id="end2" name="end2">
                <br>
                <label><b>Couleur</b></label>
                <select id="barcolor" name="barcolor">
                    <option value="3c78d8">Bleu</option>
                    <option value="6aa84f">Vert</option>
                    <option value="f1c232">Jaune</option>
                    <option value="cc0000">Rouge</option>
                </select><br>
                <label><b>UE</b></label>
                <select id="code_ue" name="code_ue">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Enseignant</b></label>
                <select id="code_user" name="code_user">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_u2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Groupe</b></label>
                <select id="code_groupe" name="code_groupe">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_g2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
                    }
                    ?>
                </select> <br>
                <label><b>Catégorie</b></label>
                <select id="categorie" name="categorie">
                    <option value="CM">CM</option>
                    <option value="TP">TP</option>
                    <option value="TD">TD</option>
                </select> <br>
                <label><b>Salle</b></label>
                <select id="salle" name="salle">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_salle2->fetch_assoc()) {

                        echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                    }
                    ?>


                    <input type="submit" id="submitBtn" disabled value="Enregistrer">
            </form>
            <form action="creationcours" method="post">
                <h1>SUPPRIMER EVENEMENT</h1>
                <select id="id_ev2" name="id_ev2">
                    <?php
                    // variable contenue dans models/m_creation_cours.php
                    while ($rowEns = $result_code_id2->fetch_assoc()) {
                        echo '<option value="' . $rowEns["id_evenement"] . '">' . $rowEns["titre_evenement"] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Valider">
            </form>
            <form action="emploi_du_temps" method="post">
                <input type="submit" value="retour ">
            </form>
        </div>
</body>

</html>
<!-- script pour les date  -->
<script>
        const startDateInput = document.getElementById('start');
        const endDateInput = document.getElementById('end');
        const start2DateInput = document.getElementById('start2');
        const end2DateInput = document.getElementById('end2');

        // Définir la date et l'heure actuelles avec les secondes comme valeur par défaut
        const now = new Date();
        const year = now.getFullYear();
        const month = ('0' + (now.getMonth() + 1)).slice(-2);
        const day = ('0' + now.getDate()).slice(-2);
        const hour = ('0' + now.getHours()).slice(-2);
        const minute = ('0' + now.getMinutes()).slice(-2);
        now.setSeconds(0);
        const datetime = year + '-' + month + '-' + day + 'T' + hour + ':' + minute ;
        startDateInput.value = datetime;
        endDateInput.value = datetime;
        start2DateInput.value = datetime;
        end2DateInput.value = datetime;

        // Désactiver les dates antérieures à la date actuelle
        const todayISOString = now.toISOString().split('.')[0]; // Convertir en format datetime-local
        startDateInput.min = todayISOString;
        endDateInput.min = todayISOString;
        start2DateInput.min = todayISOString;
        end2DateInput.min = todayISOString;
        // Écouter les modifications des champs de date
        startDateInput.addEventListener('input', () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
        });

        endDateInput.addEventListener('input', () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

        });
        start2DateInput.addEventListener('input', () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
        });

        end2DateInput.addEventListener('input', () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

        });
        
    </script>
    <script>
    function validerReponsemod() {
        const responseInput = document.getElementById('response');
            const messageDiv = document.getElementById('message');
            const submitBtn = document.getElementById('submitBtn');
            const reponseRegex = /^(CM|tp|td) [A-Za-z]+ \d+$/;

            if (reponseRegex.test(responseInput.value)) {
                messageDiv.textContent = "Réponse valide : " + responseInput.value;
                messageDiv.style.color = 'green';
                submitBtn.removeAttribute('disabled');
            } else {
                messageDiv.textContent = "Réponse invalide. Le format doit être 'x y z', où x est CM, tp ou td, y est un nom et z est un chiffre.";
                messageDiv.style.color = 'red';
                submitBtn.setAttribute('disabled', true);
            }
        }
        function validerReponseinsert() {
        const responseInput = document.getElementById('responseinsert');
            const messageDiv = document.getElementById('messageinsert');
            const submitBtn = document.getElementById('submitBtninsert');
            const reponseRegex = /^(CM|tp|td) [A-Za-z]+ \d+$/;

            if (reponseRegex.test(responseInput.value)) {
                messageDiv.textContent = "Réponse valide : " + responseInput.value;
                messageDiv.style.color = 'green';
                submitBtn.removeAttribute('disabled');
            } else {
                messageDiv.textContent = "Réponse invalide. Le format doit être 'x y z', où x est CM, tp ou td, y est un nom et z est un chiffre.";
                messageDiv.style.color = 'red';
                submitBtn.setAttribute('disabled', true);
            }
        }
    </script>