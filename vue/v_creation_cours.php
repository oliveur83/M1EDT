
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />

</head>

<body>
    
    
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creationcours" method="post">
    <h1>CREATION EVENEMENT</h1>    
    <label><b> text</b></label>
        <input type="text" name="text">
        <label><b>start </b></label>
        <input type="datetime-local" name="start">
        <label><b> end</b></label>
        <input type="datetime-local" name="end">
        <label><b> colorbar</b></label>
        <select id="barcolor" name="barcolor">
    <option value="3c78d8">Blue</option>
    <option value="6aa84f">Green</option>
    <option value="f1c232">Yellow</option>
    <option value="cc0000">Red</option>
  </select><br>
  <label><b> code-ue</b></label>
        <select id="code_ue" name="code_ue">
        <?php

while ($rowEns = $result_code->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
 </select> 
 <label><b> user</b></label>
        <select id="code_user" name="code_user">
        <?php

while ($rowEns = $result_code_u->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
}
?>
 </select> <br>
 <label><b> groupe</b></label>
        <select id="code_groupe" name="code_groupe">
        <?php

while ($rowEns = $result_code_g->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
}
?>
 </select> 
  <label><b> categorie</b></label>
        <select id="categorie" name="categorie">
    <option value="CM">CM</option>
    <option value="TP">TP</option>
    <option value="TD">TD</option>
  </select>
  <label><b> salle</b></label>
        <select id="salle" name="salle">
        <?php

while ($rowEns = $result_salle->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
}
?>

        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="enregistre ">
        </form>

<form action="creationcours" method="post"> 
    <h1>MODIFICATION EVENEMENT</h1>    
    <select id="id_ev" name="id_ev">
        <?php

while ($rowEns = $result_code_id->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_evenement"] . '">' . $rowEns["titre_evenement"] . '</option>';
}
?>
 </select> 
    <label><b> nom de l'evenement </b></label>
        <input type="text" name="text">
        <label><b>start </b></label>
        <input type="datetime-local" name="start2">
        <label><b> end</b></label>
        <input type="datetime-local" name="end2">
        <label><b> colorbar</b></label>
        <select id="barcolor" name="barcolor">
    <option value="3c78d8">Blue</option>
    <option value="6aa84f">Green</option>
    <option value="f1c232">Yellow</option>
    <option value="cc0000">Red</option>
  </select><br>
  <label><b> code-ue</b></label>
        <select id="code_ue" name="code_ue">
        <?php

while ($rowEns = $result_code2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
 </select> 
 <label><b> user</b></label>
        <select id="code_user" name="code_user">
        <?php

while ($rowEns = $result_code_u2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
}
?>
 </select> <br>
 <label><b> groupe</b></label>
        <select id="code_groupe" name="code_groupe">
        <?php

while ($rowEns = $result_code_g2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
}
?>
 </select> 
  <label><b> categorie</b></label>
        <select id="categorie" name="categorie">
    <option value="CM">CM</option>
    <option value="TP">TP</option>
    <option value="TD">TD</option>
  </select>
  <label><b> salle</b></label>
        <select id="salle" name="salle">
        <?php

while ($rowEns = $result_salle2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
}
?>

     
        <input type="submit" value="enregistre ">
        </form>



<form action="creationcours" method="post"> 
    <h1>SUPRIMER EVENEMENT</h1>    
    <select id="id_ev2" name="id_ev2">
        <?php

while ($rowEns = $result_code_id2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_evenement"] . '">' . $rowEns["titre_evenement"] . '</option>';
}
?>
 </select> 
 <input type="submit" value="valider">
 </form>
 <form action="emploi_du_temps" method="post">
    <input type="submit" value="retour ">
</form>
    </div>


</body>

</html>

<script>
    // pour avoir l'heure par defaut 
  var now = new Date();
  var year = now.getFullYear();
  var month = ('0' + (now.getMonth() + 1)).slice(-2);
  var day = ('0' + now.getDate()).slice(-2);
  var hour = ('0' + now.getHours()).slice(-2);
  var minute = ('0' + now.getMinutes()).slice(-2);
  var datetime = year+'-'+month+'-'+day+'T'+hour+':'+minute;

  document.getElementsByName('start')[0].value = datetime;
  document.getElementsByName('start2')[0].value = datetime;
  var hour = ('0' + (now.getHours()+2)).slice(-2);
  var datetime = year+'-'+month+'-'+day+'T'+(hour)+':'+minute;

document.getElementsByName('end')[0].value = datetime;
document.getElementsByName('end2')[0].value = datetime;
</script>

