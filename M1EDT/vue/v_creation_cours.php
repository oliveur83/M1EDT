
<!DOCTYPE html>
<html>

<head>
    <title>Création cours - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>
    
    
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creationcours" method="post">
    <h1>CREATION EVENEMENT</h1>
    <label><b>Titre</b></label>
        <input type="text" name="text">
        <br>
        <label><b>Début</b></label>
        <input type="datetime-local" name="start">
        <label><b>Fin</b></label>
        <input type="datetime-local" name="end">
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

while ($rowEns = $result_code->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
 </select>
 <br>
 <label><b>Enseignant</b></label>
        <select id="code_user" name="code_user">
        <?php

while ($rowEns = $result_code_u->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
}
?>
 </select> <br>
 <label><b>Groupe</b></label>
        <select id="code_groupe" name="code_groupe">
        <?php

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

while ($rowEns = $result_salle->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
}
?>

        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="Enregistrer">
        </form>

<form action="creationcours" method="post"> 
    <h1>MODIFICATION EVENEMENT</h1>    
    <select id="id_ev" name="id_ev">
        <?php

while ($rowEns = $result_code_id->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_evenement"] . '">' . $rowEns["titre_evenement"] . '</option>';
}
?>
 </select> <br>
    <label><b>Titre</b></label>
        <input type="text" name="text">
        <br>
        <label><b>Début</b></label>
        <input type="datetime-local" name="start2">
        <label><b>Fin</b></label>
        <input type="datetime-local" name="end2">
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

while ($rowEns = $result_code2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
 </select> <br>
 <label><b>Enseignant</b></label>
        <select id="code_user" name="code_user">
        <?php

while ($rowEns = $result_code_u2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] . '</option>';
}
?>
 </select> <br>
 <label><b>Groupe</b></label>
        <select id="code_groupe" name="code_groupe">
        <?php

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

while ($rowEns = $result_salle2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_salle"] . '">' . $rowEns["nom_salle"] . '</option>';
}
?>

     
        <input type="submit" value="Enregistrer">
        </form>



<form action="creationcours" method="post"> 
    <h1>SUPPRIMER EVENEMENT</h1>    
    <select id="id_ev2" name="id_ev2">
        <?php

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

