
	
<!DOCTYPE html>
<html>
   <head>
            <!--
     Nom du fichier : v_emploi_du_temps.html
     Auteur : Tom OLIVIER
     Date : 27 août 2023
     Description : cette page affiche les element pour notre app
     EDT(date,bouton pour admin,inter)
    -->
      <title>Emploi du temps</title>
      <!-- head -->
      <meta charset="utf-8" />
      <meta name="referrer" content="no-referrer-when-downgrade" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="../JS/src/dada-calendar.src.js" ></script>
      <script src="../JS/src/daypilot-commonnn.src.js"></script>
      <script src="../JS/src/daypilot-datepicker.src.js"></script>
      <script src="../JS/src/daypilot-menu.src.js"></script>
      <script src="../JS/src/daypilot-modal.src.js"></script>
      <script src="../JS/src/daypilot-month.src.js"></script>
      <script src="../JS/src/daypilot-navigator.src.js"  ></script>
      <link rel="stylesheet" href="../css/Emploi.css">
      <link type="text/css" rel="stylesheet" href="../theme/calendar_green.css?v=2023.2.5596"/>
    <link type="text/css" rel="stylesheet" href="../theme/calendar_traditional.css?v=2023.2.5596"/>
    <link type="text/css" rel="stylesheet" href="../theme/calendar_transparent.css?v=2023.2.5596"/>
    <link type="text/css" rel="stylesheet" href="../theme/calendar_white.css?v=2023.2.5596"/>

   </head>
<body>
    <ul>
        <!-- pour la bar du haut menu en trois bouton promotion,salle,enseignant-->
        <form action="emploi_du_temps" method="post">
            <li>
                <input type="submit" name="promotion" style="background-color: transparent; border: 0; color: #FFF"
                    value="promotion">
            </li>
            <li>
                <input type="submit" name="salle" style="background-color: transparent; border: 0; color: #FFF"
                    value="salle">
            </li>
            <li>

                <input type="submit" name="enseignant" style="background-color: transparent; border: 0; color: #FFF"
                    value="enseigant">
            </li>
        </form>
    </ul>

<?php
// en fonction du clique on ajoute 
// un input texte de type select  et un bouton 
// placer ici pour le placement des boutons 
    if (isset($_POST['promotion'])):
        ?>
        <form method="POST" action="emploi_du_temps">
            <select name="promotion_select" id="promotion_select">
                <?php
                while ($rowEns = $resultt->fetch()) {
                    echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["code_groupe"] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="Envoyer">
        </form>
        <?php
    endif;
    ?>
    <?php
    if (isset($_POST['salle'])):
        ?>
        <form method="POST" action="emploi_du_temps">
            <select name="salle_select" id="salle_select">
                <?php

                while ($rowEns = $result_salle->fetch()) {
                    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="Envoyer">
        </form>
        <?php
    endif;
    ?>
    <?php
    if (isset($_POST['enseignant'])):
        ?>
        <form method="POST" action="emploi_du_temps">
            <select name="enseignant_select" id="enseignant_select">
                <?php
                while ($rowEns = $result_ens->fetch()) {
                    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . " " . $rowEns["prenom_user"] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="Envoyer">
        </form>
        <?php
    endif;
    ?>
<!------------------------- -->
<center>
<!-- ici on a nos deux bouton next and previous ainsi que la date de reference  -->
<table>
    <tr>
        <td>
            <form action="emploi_du_temps" method="post">
                <input type="submit" value="semaine precedente">
                <input type="hidden" name="date_p" value="toto">
                <input type="hidden" name="semaine" value="<?php
                echo $_SESSION["index"];
                ?>">
            </form>
        </td>
        <td>
            <p class=paragraphe>
                <?php
                echo "semaine du: " . $date;
                ?>
            </p>
        </td>
        <td>
            <form action="emploi_du_temps" method="post">
                <input type="submit" value="semaine suivante">
                <input type="hidden" name="date_s" value="toto">
                <input type="hidden" name="semaine" value="<?php
                echo $_SESSION["index"];
                ?>">
            </form>
        </td>
    </tr>
</table>
</center>
<!-- pour changer la langue de app-->
<div class="space">Select locale:
<select id="locale">
        <option>ca-es</option>
        <option>cs-cz</option>
        <option>da-dk</option>
        <option>de-at</option>
        <option>de-ch</option>
        <option >de-de</option>
        <option>de-lu</option>
        <option>en-au</option>
        <option>en-ca</option>
        <option>en-gb</option>
        <option>en-us</option>
        <option>es-es</option>
        <option>es-mx</option>
        <option>eu-es</option>
        <option>fi-fi</option>
        <option>fr-be</option>
        <option>fr-ca</option>
        <option>fr-ch</option>
        <option selected="selected">fr-fr</option>
        <option>fr-lu</option>
        <option>gl-es</option>
        <option>it-it</option>
        <option>it-ch</option>
        <option>ja-jp</option>
        <option>ko-kr</option>
        <option>nb-no</option>
        <option>nl-nl</option>
        <option>nl-be</option>
        <option>nn-no</option>
        <option>pt-br</option>
        <option>pl-pl</option>
        <option>pt-pt</option>
        <option>ro-ro</option>
        <option>ru-ru</option>
        <option>sk-sk</option>
        <option>sv-se</option>
        <option>tr-tr</option>
        <option>uk-ua</option>
        <option>zh-cn</option>
    </select>
</div>
<!-- personnalisation de app-->
<select id="scriptSelector">
<option value="1">Normal</option>
    <option value="2">calendar green</option>
    <option value="3">calendar_traditional</option>
    <option value="4">calendar_transparent</option>
    <option value="5">calendar_white</option>
</select>

<div id="dp"></div>
    <div style="display: flex;">
        <div style="margin-right: 10px;">
            <div id="nav"></div>
        </div>
        <div style="flex-grow: 1;">
            <div id="dp"></div>
        </div>
    </div>
    <div id="dp"></div>
<!-- gestion de interface de EDT -->
<script type="text/javascript">

if (typeof localStorage.getItem("nomDeLaCle") === "undefined") {
    localStorage.getItem("nomDeLaCle")=NaN
}

function executeScript(selectedValue) {
    themepla=NaN;
    // fonction qui permet de personnaliser interface 
    switch (selectedValue) {
        case '1':
            // Code du script 1
            themepla = NaN
            break;
        case '2':
            // Code du script 2
            themepla = "calendar_green"
            break;
        case '3':
            // Code du script 3
            themepla = "calendar_traditional"
            break;
        case '4':
            // Code du script 4
            themepla = "calendar_transparent"
            break;
        case '5':
            // Code du script 4     
            themepla = "calendar_white"
            break;
        default:
            themepla = NaN
        
    }
    localStorage.setItem("nomDeLaCle", themepla);

}var nav = new DayPilot.Navigator("nav", {
            showMonths: 1,
            skipMonths: 1,
            selectMode: "Week",
            freeHandSelectionEnabled: true,
            selectionDay: "<?php 
                            echo $date;
                            ?>",  
            //clique sur un nombre 
            onTimeRangeSelected: (args) => {
                dp.startDate = nav.selectionDay;
   
                dp.update();
            },
            //clique sur feche
            onVisibleRangeChange: (args) => {
                var start = args.start;
                var end = args.end;
              
                if (start <= nav.selectionDay && nav.selectionDay < end) {
                    return;
                }

                var day = nav.selectionDay.getDay();

                var target = start.firstDayOfMonth().addDays(day);
                nav.select(target);
            },
            onBeforeCellRender: (args) => {
                if (args.cell.isCurrentMonth) {
                    args.cell.cssClass = "current-month";
                }
            }
        });

        nav.init();
         //création de EDT 
         var toto=[1,3,5]
         const dp = new DayPilot.Calendar("dp", {
            theme:localStorage.getItem("nomDeLaCle"),
             viewType: "Week",
             startDate: nav.selectionDay,
             headerDateFormat: "dddd",
             //pour la modification quand on clique dessus 
             onEventClick: async args => {
                const colors = [
                    {name: "Blue", id: "#ff8040"},
                    {name: "Green", id: "#0000ff"},
                    {name: "Yellow", id: "#ff0080"},
                    
                ];
            
                const form = [
                    {name: "Text", id: "text"},
                    {name: "Start", id: "start", type: "datetime"},
                    {name: "End", id: "end", type: "datetime"},
                    {name: "Color", id: "barColor", type: "select", options: colors},
                ];

                const modal = await DayPilot.Modal.form(form, args.e.data);

                if (modal.canceled) {
                    return;
                }
                var id = modal.result.id;
 
                var barcolor = modal.result.barColor.slice(1);
                var text = modal.result.text;
                var start = modal.result.start;
                var end = modal.result.end;  
                // on passe tout en get pour les utiliser dans
                // m_emploi_du_temps.php
                window.location.href = "emploi_du_temps?id=" + id + "&text=" + text+ "&start=" + start+ "&end=" + end+ "&barcolor=" + barcolor;
             },
            //clique sur emploie du temp pour cree un UE
             onTimeRangeSelected: async args => {          
                 window.location.href = "creationcours"
             },
             //avant le rendu 
             onBeforeEventRender: args => {  
                 args.data.barBackColor = "transparent";
                 if (!args.data.barColor) {
                     args.data.barColor = "#333";
                 }
             },        
         });
        
         dp.init();

         // ici on fait nos event (affcihe)
                <?php
    while ($rowEns = $result->fetch()) {
        ?>var e=new DayPilot.Event({
            <?php
        echo 'start: "' . $rowEns["date_debut_evenement"] . '",';
        echo 'end: "' . $rowEns["date_fin_evenement"] . '",';
        echo 'id:' . $rowEns["id_evenement"] . ',';
        echo 'text: "' . $rowEns["titre_evenement"] . '",';
        echo 'barColor: "#' . $rowEns["couleur_evenement"] . '",';
        echo 'groupe: "' . $rowEns["code_groupe"] . '",';
        echo 'identifiant_user: "' . $rowEns["id_user"] . '",';
        echo 'identifiant_salle: "' . $rowEns["id_salle"] . '",';
        echo 'id_user: "' . $rowEns["nom_user"] .' '.$rowEns["prenom_user"]. '",';
        echo 'id_salle: "' . $rowEns["nom_salle"] . '"';?>
    } )
//permet de ajouter dans le planning 
dp.events.add(e);
    <?php
    }

    ?>     

    
        
</script>
<!-- ici c'est pour l'interface de la navigation -->
<script type="text/javascript">
   
        document.querySelector("#locale").addEventListener("change", function() {
            dp.locale = this.value;
            dp.update();
        });
        document.getElementById('scriptSelector').addEventListener('change', function () {
            const selectedValue = this.value;
            executeScript(selectedValue);
           dp.theme=themepla
           
           dp.update();
        });
         
        
    </script>
    <!--  les bouton du bas + bouton si admin -->
    <button id="toggleViewButton">Basculer entre Jour et Semaine</button>

    <table>
        <tr>
            <td>
                <form action="connexion" method="post">
                    <input type="submit" value="connexion">
                </form>
                <form action="emploiday" method="post">
                    <input type="submit" value="vue sur un jour">
                </form>
            </td>
            <?php
            // si nous sommes admin, nous avons plusieurs options en plus 
            if ($_SESSION["admin"]):
            ?>
            <td>
                <form action="creationcours" method="post">
                    <input type="submit" value="creation/modif/sup/cours">
                </form>
            </td>
            <td>
                <form action="creationutilisateur" method="post">
                    <input type="submit" value="creation/modif/sup utilisateur">
                </form>
            </td>
            <td>
                <form action="creationue" method="post">
                    <input type="submit" value="creation/modification/suppression ue">
                </form>
            </td>
            <td>
                <form action="creationgroupe" method="post">
                    <input type="submit" value="creation/modification/suppression groupe">
                </form>
            </td>
            <td>
                <form action="creationsalle" method="post">
                    <input type="submit" value="creation/modification/suppression salle">
                </form>
            </td>
            <?php
            endif;
            ?>
        </tr>
    </table>
    <form action="index" method="post">
                <input type="submit" value="retour ">
            </form>

<script>
    // Sélectionnez le bouton par son ID
const toggleViewButton = document.getElementById('toggleViewButton');

// Gestionnaire d'événements pour le clic sur le bouton
toggleViewButton.addEventListener('click', function() {
    // Vérifiez la vue actuelle du calendrier
    if (dp.viewType === '') {
        console.log("putian sa ne marche pas")
        // Si la vue actuelle est "Jour", passez à la vue "Semaine"
        dp.update({ viewType: 'Week' });
    } else {
        console.log("putian sa ne marche pas2222")
        // Sinon, passez à la vue "Jour"
        dp.update({ viewType: '' });
    }
});
</script>