
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />

</head>

<body>
    
    
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creationgroupe" method="post">
    <h1>CREATION groupe</h1>    
    <label><b> text</b></label>
        <input type="text" name="groupe">
        <label><b> code groupe</b></label>
        <input type="text" name="groupec">
        <input type="hidden" name="cours" value="cours">
        <input type="submit" value="enregistre ">
        </form>

<form action="creationgroupe" method="post">
<h1>MODIFIER groupe</h1> 
<label><b> groupe</b></label>
        <select id="groupe_mod" name="groupe_mod">
        <?php

while ($rowEns = $result_groupe->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
}
?>
</select>  
<label><b> texte</b></label>
    <input type="text" name="groupe">
    <label><b> code groupe</b></label>
    <input type="text" name="code_groupe">
    <input type="submit" value="modifier">
</form>
<br>
<form action="creationgroupe" method="post">
<h1>SUPRIMER groupe</h1> 
<label><b> groupe</b></label>
        <select id="groupe_sup" name="groupe_sup">
        <?php

while ($rowEns = $result_groupe2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["code_groupe"] . '">' . $rowEns["nom_groupe"] . '</option>';
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

