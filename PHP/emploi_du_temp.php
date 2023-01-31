<?php
// resize 926 calendar 2933
//ligne 2983 faire la modifcaticaton
   session_start();
   
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   
   //On établit la connexion
   $conn = new PDO("mysql:host=$servername;dbname=m1edt", $username, $password);
   $sql = "SELECT * FROM cours ";
   $result = $conn->query($sql);
   // pour le test de connexion 
   if (!empty($_POST['username'])){
   if ($_POST['username']!="admin" || $_POST['password']!="admin")
   {
       header('Location: http://localhost/M1EDT/PHP/connexion.php');
   }}
   $i = 0;
   //pour bouton semaine precedente ou suivante 
   // pour n semaines 
   if (!empty($_POST['date_p'])) {
       $i = intval($_POST['semaine']) - 1;
       $date = date('Y-m-d', strtotime('+' . $i . 'week'));
   } elseif (!empty($_POST['date_s'])) {
       $i = intval($_POST['semaine']) + 1;
       $date = date('Y-m-d', strtotime('+' . $i . 'week'));
   } else {
       $date = date("Y-m-d");
   }
   // pour enregistrer les modification 
   if (isset($_GET["id"])){
    echo $_GET["id"];
        if ($_GET["id"]==-1){
        
            $start = $_GET["start"] ;
            $end = $_GET["end"] ;
            $id = $_GET["cle"] ;
            $sql = "UPDATE cours set "."
            end ='".$end."',
            start ='".$start."'
             WHERE id=".$id;
            $result = $conn->query($sql);
            
        }
       elseif ($_GET["id"]==0){
        //on ajoute sur le planning 
           echo "totot";
           $start = $_GET["start"] ;
           $end = $_GET["end"] ;
           $text = $_GET["text"] ;
           $barcolor = $_GET["barcolor"] ;
           $sql = "INSERT INTO cours(text,start,end,barcolor)
           VALUES ('".$text."', '".$start."', '".$end."','".$barcolor."')";
           $conn->query($sql);
       }
       else{
    //pour la modification
       $id = $_GET["id"] ;
       $start = $_GET["start"] ;
       $end = $_GET["end"] ;
       $text = $_GET["text"] ;
       $barcolor = $_GET["barcolor"] ;
       //TODO : faire insertion 
       $sql = "UPDATE cours set "."
       end ='".$end."',
       start ='".$start."',
       text ='".$text."',
       barcolor ='".$barcolor."'
        WHERE id=".$id;
       $result = $conn->query($sql);
       }
       ?>
       
<script type="text/javascript">
    //reactualise la page 
   window.location.href = "emploi_du_temp.php"
 </script>  <?php
   }
   
   ?>
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
      <link rel="stylesheet" href="../CSS/emploi.css">
      <!-- /head -->
      <style>
      </style>
   </head>
   <body>
      <center>
         <table>
            <tr>
               <td>
                  <form action="emploi_du_temp.php" method="post">
                     <input type="submit" value="semaine precedente">
                     <input type="hidden" name="date_p" value="toto">
                     <input type="hidden" name="semaine" value="<?php echo $i ?>">
                  </form>
               </td>
               <td>
                  <p class=paragraphe>
                     <?php echo "semaine du: " . $date ?>
                  </p>
               </td>
               <td>
                  <form action="emploi_du_temp.php" method="post">
                     <input type="submit" value="semaine suivante">
                     <input type="hidden" name="date_s" value="toto">
                     <input type="hidden" name="semaine" value="<?php echo $i ?>">
                  </form>
               </td>
            </tr>
         </table>
      </center>
      <div id="dp"></div>
      <script type="text/javascript">
         // on crée notre planning 
         
         const dp = new DayPilot.Calendar("dp", {
             viewType: "Week",
             startDate: "<?php echo $date ?>",
             headerDateFormat: "dddd",
             //pour la modification quand on clique dessus 
             onEventClick: async args => {
                 
                 // on cree les colors que l'on veut 
                 const colors = [
                     { name: "Blue", id: "#3c78d8"},
                     { name: "Green", id: "#6aa84f"},
                     { name: "Yellow", id: "#f1c232"},
                     { name: "Red", id: "#cc0000"},
                     { name: "black", id: "#000000"}
                 ];
                 // on cree les form que l'on veut 
                 // pour modifier
                 const form = [
                     { name: "Text", id: "text"},
                     { name: "Start", id: "start", type: "datetime"},
                     { name: "End", id: "end", type: "datetime"},
                     { name: "Color", id: "barColor", type: "select", options: colors},
                 ];
                 //quand on click dessus 
                 const modal = await DayPilot.Modal.form(form, args.e.data);
                 
                 if (modal.canceled) {
         
                     return;
                 }
                 // update de modification 
                 // requette http par _GET
                 //voir ligne 31
                 var id = modal.result.id;
                 var barcolor = modal.result.barColor
                 var text = modal.result.text;
                 var start = modal.result.start;
                 var end = modal.result.end;
                 window.location.href = "emploi_du_temp.php?id=" + id + "&text=" + text+ "&start=" + start+ "&end=" + end+ "&barcolor=" + barcolor
         
             },
            //clique sur emploie du temp pour cree un UE
             onTimeRangeSelected: async args => {
                 
                 const form = [
                     { name: "Name", id: "text"}
                 ];
         
                 const data = {
                     text: "Evefsfqnt"
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
                 
                 var barcolor = "#3c78d8"
                 var text = modal.result.text;
                 var start = args.start;
                 var end = args.end;
                 window.location.href = "emploi_du_temp.php?id=" + 0 + "&text=" + text+ "&start=" + start+ "&end=" + end+ "&barcolor=" + barcolor
         
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
             <?php while ($rowEns = $result->fetch()) {
            echo '{start: "'.$rowEns["start"].'",';
            echo 'end: "'.$rowEns["end"].'",';
            echo 'id:'. $rowEns["id"] . ',';
            echo 'text: "' . $rowEns["text"] . '",';
            echo 'barColor: "#3c78d8"},';
            } ?>
             
         
         ];
         
         //permet de ajouter dans le planning 
         dp.update({events});
         
      </script>
      <table>
         <tr>
            <td>
               <form action="connexion.php" method="post">
                  <input type="submit" value="admin">
               </form>
            </td>
            <td>
               <form action="creation_cours.php" method="post">
                  <input type="submit" value="creation evenement">
               </form>
            </td>
         </tr>
      </table>
   </body>
</html>