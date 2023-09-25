<html>
        <!--
     Nom du fichier : v_creation_groupe.html
     Auteur : Tom OLIVIER
     Date : 20 septembre 2023
     Description : cette page vous permet de générer un emploi
     du temps automatiquement 
    -->
<head>
    <meta charset="utf-8">
    <title>Connexion - EDT</title>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../CSS/edt_ia.css" media="screen" type="text/css" />
</head>

<body>
    <center>
        <div id="container">
        <!-- partie de visualtion des module ajouter  -->
            <p class="para"> Module ajouté </p>
            <table>
                <tr>
                    <th>modules</th>
                    <th>CM-en heures</th>
                    <th>TD-en heures</th>
                    <th>TP-en heures</th>
                    <th>options</th>
                </tr>
                <?php
       if (isset($_SESSION['liste_event']) )
       {
        $listeDeListes = $_SESSION['liste_event'];
        $listeprofafficher = $_SESSION['liste_prof'];
        $listesalleafficher = $_SESSION['liste_salle'];
        
        // Notez que $listeDeListes, $listeprofafficher et $listesalleafficher doivent avoir la même longueur.
        
        foreach ($listeDeListes as $index => $liste) {
            echo "<tr>";
            foreach ($liste as $indexheure => $sousliste) {
                echo "<td>$sousliste";
         echo "<br> ";
                // Vérifiez que l'indice existe dans $listeprofafficher et $listesalleafficher
                if (isset($listeprofafficher[$index]) && $indexheure >= 1 && $indexheure <= 3)  {
                    echo "Professeur  ";
                    foreach ($listeprofafficher[$index][$indexheure-1] as $listep) {
                        
                            echo "<br> $listep ";
                        
                    }
                    
                }
                echo "<br> ";
                if (isset($listesalleafficher[$index]) && $indexheure >= 1 && $indexheure <= 3) {
                    echo "Salle  ";
                    foreach ($listesalleafficher[$index][$indexheure-1] as $listes) {
                        
                            echo "<br> $listes";
                        
                    }
                    echo "</td>";
                }
            }
        
            echo '<td>
                <form action="EDT_IA" method="post">
                    <input type="hidden" name="index" value="$index">
                    <input type="submit" value="Modifier">
                </form>
        
                <form action="EDT_IA" method="post">
                <button type="submit " name="affichage_supr" valeur="'.$index.'">modifier</button>
            </form>
            </td>';
            echo "</tr>";
        }
        
       }
            ?>
            </table>
            <!-- partie pour la crétaion des modules -->
            <p class="para"> création d'un module </p>
            <form action="EDT_IA" method="POST">
                <p class="para"> quelle formation </p>
                    <select name="forma"<?php if ($_SESSION['selectformation']) echo 'disabled'; ?>>
                        <?php
                        
                      while ($rowEns = $result_groupe->fetch()) {
                          echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
                      }
                      ?>
                    </select>
                    <?php if ($_SESSION['selectformation']): ?>
                        <form action="EDT_IA" method="post">
                        <button type="submit " name="formation_modifier">modifier</button>
                    </form>
                    <?php endif; ?>
               <!-- affichage sous forme de tableau
            pour plus de faciliter a completer  -->

            <!--    
                 <input type="text" name="date_debut" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" placeholder="AAAA/MM/JJ" required>
                 <input type="text" name="date_fin" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" placeholder="AAAA/MM/JJ" required>
                <input type="text" name="periode de vacance " pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" placeholder="AAAA/MM/JJ" required>
    
                 --->
                <table>
                    <tr>
                        <th>modules</th>
                        <th>CM-en heures</th>
                        <th>TD-en heures</th>
                        <th>TP-en heures</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="mat" required></td>
                        <td><input type="text" name="CM"  placeholder="Saisissez des chiffres uniquement" required pattern="[0-9]+" title="Veuillez saisir des chiffres uniquement.">
                            <p> professeur</p>
                            <select class="selectBox" name="profcm[]" id="profcm" multiple>
                                <?php
                                while ($rowEns = $result_profcm->fetch()) {
                                    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
                                }
                                ?>  
                            </select>
                            <div class="selectedOptions"></div>
                            <p>salle</p>
                            <select class="selectBox" name="sallecm[]" id="sallecm" multiple>
                                <?php
                                while ($rowEns = $result_sallecm->fetch()) {
                                    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="selectedOptions"></div>
                        </td>
                        <td><input type="text" name="TD"  placeholder="Saisissez des chiffres uniquement" required pattern="[0-9]+" title="Veuillez saisir des chiffres uniquement.">
                            <p> professeur</p>
                            <select class="selectBox" name="proftd[]" id="proftd" multiple>
                                <?php
                                while ($rowEns = $result_proftd->fetch()) {
                                  echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';

                                }
                                ?>
                            </select>
                            <div class="selectedOptions"></div>
                            <p>salle</p>
                            <select class="selectBox" name="salletd[]" id="salletd" multiple>
                                <?php
                                while ($rowEns = $result_salletd->fetch()) {
                                    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="selectedOptions"></div>
                        </td>
                        <td><input type="text" name="TP" placeholder="Saisissez des chiffres uniquement" required pattern="[0-9]+" title="Veuillez saisir des chiffres uniquement.">
                            <p> professeur</p>
                            <select class="selectBox" name="proftp[]" id="proftp" multiple>
                                <?php
                                while ($rowEns = $result_proftp->fetch()) {
                                  echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="selectedOptions"></div>
                            <p>salle</p>
                            <select class="selectBox" name="salletp[]" id="salletp" multiple>
                                <?php
                                while ($rowEns = $result_salletp->fetch()) {
                                    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="selectedOptions"></div>
                        </td>

                    </tr>

                </table>
                <input type="submit" value="valider">
            </form>
            <!-- bouton de fin  -->

            <form action="EDT_IA" method="post">
                <input type="submit" name="export" value="exportation new EDT ">
            </form>
    
            <form action="index/emploi_du_temps" method="post">
                <input type="submit" value="exportation sur EDT actuel ">
            </form>
            <form action="index" method="post">
                <input type="submit" value="retour ">
            </form>
        </div>
        
    </center>
    <?php
# **************************************************
# traitement affichage de tout les select 
# **************************************************
?>

    <script>
    // Récupérez tous les éléments select avec la classe "selectBox"
    var selectBoxes = document.querySelectorAll('.selectBox');

    // Parcourez tous les select
    selectBoxes.forEach(function(selectBox) {
        var selectedOptionsDiv = selectBox.nextElementSibling; // Div juste après le select

        selectBox.addEventListener('change', function() {
            selectedOptionsDiv.innerHTML = '';

            for (var i = 0; i < selectBox.options.length; i++) {
                var option = selectBox.options[i];
                if (option.selected) {
                    var optionText = option.text;
                    var listItem = document.createElement('li');
                    listItem.textContent = optionText;
                    selectedOptionsDiv.appendChild(listItem);
                }
            }
        });
    });
    </script>