
	
<!DOCTYPE html>
<html>
   <head>
      <title>Open-Source JavaScript Event Calendar</title>
      <!-- head -->
      <meta charset="utf-8" />
      <meta name="referrer" content="no-referrer-when-downgrade" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="../JS/src/daypilot-calendar.src.js"></script>
      <script src="../JS/src/daypilot-common.src.js"></script>
      <script src="../JS/src/daypilot-datepicker.src.js"></script>
      <script src="../JS/src/daypilot-menu.src.js"></script>
      <script src="../JS/src/daypilot-modal.src.js"></script>
      <script src="../JS/src/daypilot-month.src.js"></script>
      <script src="../JS/src/daypilot-navigator.src.js"></script>
      <link rel="stylesheet" href="../css/Emploi.css">
      <!-- /head -->
      <style>
      </style>
   </head>
   <body>
   <ul>
   <form action="emploi_du_temps" method="post">
  <li>   <a>
      <input type="submit"  name="promotion" style="background-color: transparent; border: 0; color: #FFF" value="promotion">
 </a></li>
  <li>   <a>
      <input type="submit"  name="salle" style="background-color: transparent; border: 0; color: #FFF" value="salle">
 </a></li>
  <li>
   <a>
      <input type="submit"  name="enseignant" style="background-color: transparent; border: 0; color: #FFF" value="enseigant">
 </a>
</li>
</form>

</ul>

<?php
// en fonction du clique on ajoute 
// un input texte et un bouton 
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
     <center>
         <table>
            <tr>
               <td>
                  <form action="emploi_du_temps" method="post">
                     <input type="submit" value="semaine precedente">
                     <input type="hidden" name="date_p" value="toto">
                     <input type="hidden" name="semaine" value="<?php
echo $i;
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
echo $i;
?>">
                  </form>
               </td>
            </tr>
         </table>
      </center>
      <div id="dp"></div>
      <script type="text/javascript">
         // on crée notre planning 
         var toto=[1,3,5]
         const dp = new DayPilot.Calendar("dp", {
             viewType: "Week",
             startDate: "<?php
echo $date;
?>",
             headerDateFormat: "dddd",
             //pour la modification quand on clique dessus 
             onEventClick: async args => {
                const colors = [
                    {name: "Blue", id: "#3c78d8"},
                    {name: "Green", id: "#6aa84f"},
                    {name: "Yellow", id: "#f1c232"},
                    {name: "Red", id: "#cc0000"},
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
                
                
                window.location.href = "emploi_du_temps?id=" + id + "&text=" + text+ "&start=" + start+ "&end=" + end+ "&barcolor=" + barcolor;
        

             },
            //clique sur emploie du temp pour cree un UE
             onTimeRangeSelected: async args => {

                
                 const form = [

                     { name: "Name", id: "text"}
                    
                 ];
        
                 const data = {
                     text: "event"
                    
                 };
                 // a regarder !!!!!
                 const modal = await DayPilot.Modal.form(form, data);
        
                 dp.clearSelection();
        
                 if (modal.canceled) {
                     return;
                 }
                 //ajout dans planning 
                
                 dp.events.add({
                     start: args.start,
                     end: args.end,
                     id: DayPilot.guid(),
                     text: modal.result.text,
                     barColor: "#3c78d8"
                 });
                 //insertion in database 
                
                 var barcolor = '3c78d8'
                 var text = modal.result.text;
                 var start = args.start;
                 var end = args.end;
                 window.location.href = "emploi_du_temps?id=" + 0 + "&text=" + text+ "&start=" + start+ "&end=" + end+ "&barcolor=" + barcolor;
        
             },
             //avant le rendu 
             onBeforeEventRender: args => {
                
                 args.data.barBackColor = "transparent";
                 if (!args.data.barColor) {
                     args.data.barColor = "#333";
                 }

             },

             //?
             onHeaderClick: args => {
                
                 console.log("args", args);
             },
        
         });
        
         dp.init();

         // ici on fait nos event (affcihe)
         const events = [
             <?php
while ($rowEns = $result->fetch()) {
    echo '{start: "' . $rowEns["date_debut_evenement"] . '",';
    echo 'end: "' . $rowEns["date_fin_evenement"] . '",';
    echo 'id:' . $rowEns["id_evenement"] . ',';
    echo 'text: "' . $rowEns["titre_evenement"] . '",';
    echo 'barColor: "#' . $rowEns["couleur_evenement"] . '"},';
}
?>
        ];
        
        
         //permet de ajouter dans le planning 
         dp.update({events});
        
      </script>

<table>
         <tr>
            <td>
            <form action="connexion" method="post">
                  <input type="submit" value="connexion">
               </form>
            </td>      <?php
// si nous somme admin nous avons plusieur option en plus 
if ($_SESSION["admin"]):

?>
            <td>
            <form action="creationcours" method="post">
                  <input type="submit" value="creation_cours">
               </form>
            </td>
            <td>
            <form action="creationutilisateur" method="post">
        <input type="submit" value="creation utilisateur ">
    </form>
    </td>
    <?php
endif;
?>
         </tr>
      </table>

      
   </body>
</html>

