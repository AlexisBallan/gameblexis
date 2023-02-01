<?php

$idConteneur = $_GET["id"];
try{
    require('/var/www/html/gameblexis/connexion.php');
    $db = $basededonnees;

    $request = $db->prepare('SELECT id, titre, courte_descritption, description FROM jeux WHERE id=:id');
    $request->bindParam(':id', $idConteneur, PDO::PARAM_INT);
    $request->execute();

    $tableau = $request->fetchALL(PDO::FETCH_ASSOC);
    $json = json_encode($tableau);

    echo $json;
    
} catch(PDOExecption $e){
    echo 'erreur';
}
?>