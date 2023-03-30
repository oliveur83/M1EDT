
<!DOCTYPE html>
<html>

<head>
    <title>Gestion utilisateur - EDT</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
</head>

<body>
    
    </form>
    <center>
    <div id="container">
        <!-- zone de connexion -->
        <form action="creationutilisateur" method="post">
    <h1>CREATION utilisateur</h1>    
    <label><b> nom</b></label>
        <input type="text" name="nom">
        <label><b> prenom</b></label>
        <input type="text" name="prenom">
        

        <input type="submit" value="enregistre ">

<form action="creationutilisateur" method="post">
    <h1>MODIFICATION utilisateur</h1>    
    <label><b> nom</b></label>
        <input type="text" name="nom1">
        <label><b> prenom</b></label>
        <input type="text" name="prenom">
        <label><b> identifiant du user </b></label>
        <select id="user_mod" name="user_mod">
        <?php

while ($rowEns = $result_code_u->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"] ." ".$rowEns["prenom_user"]. '</option>';
}
?>
 </select> 
        <input type="submit" value="enregistre ">

<form action="creationutilisateur" method="post">
    <h1>SUPPRIMER utilisateur</h1>    
    <label><b> identifiant du user </b></label>
    <select id="user_sup" name="user_sup">
        <?php

while ($rowEns = $result_code_u2->fetch_assoc()) {
    
    echo '<option value="' . $rowEns["id_user"] . '">' . $rowEns["nom_user"]." ".$rowEns["prenom_user"] . '</option>';
}
?>
 </select> 
        <input type="submit" value="enregistre ">
        <form action="emploi_du_temps" method="post">
    <input type="submit" value="retour ">
</form>
    </div>
    
</body>

</html>