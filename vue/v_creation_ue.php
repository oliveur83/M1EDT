
<!DOCTYPE html>
<html>

<head>
    <title>Création UE - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>
    
    
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creationue" method="post">
    <h1>CREATION ue</h1>    
    <label><b> text</b></label>
        <input type="text" name="ue">
        <label><b> code ue</b></label>
        <input type="text" name="uec">
        <label><b> nombre heure ue</b></label>
        <input type="text" name="ueh">
        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="enregistre ">
        </form>

<form action="creationue" method="post">
<h1>MODIFIER ue</h1> 
<label><b> ue</b></label>
        <select id="ue_mod" name="ue_mod">
        <?php

while ($rowEns = $result_ue->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
</select>  
    <input type="text" name="ue">
    <input type="text" name="label">
    <input type="submit" value="modifier">
</form>
<br>
<form action="creationue" method="post">
<h1>SUPRIMER ue</h1> 
<label><b> ue</b></label>
        <select id="ue_sup" name="ue_sup">
        <?php

while ($rowEns = $result_ue2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_ue"] . '">' . $rowEns["nom_ue"] . '</option>';
}
?>
</select>  
    <input type="submit" value="modifier">
</form>

    <form action="emploi_du_temps" method="post">
    <input type="submit" value="retour ">
</form></div>
</body>

</html>

