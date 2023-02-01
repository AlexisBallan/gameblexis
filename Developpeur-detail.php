<?php

$idNouvelle = $_GET["id"];

try{
    require('/var/www/html/gameblexis/connexion.php');

    $db = $basededonnees;

    $req = $db->prepare('SELECT id, nom, description FROM developpeur WHERE id=:id');
    $req->bindParam(':id', $idNouvelle, PDO::PARAM_INT);
    $req->execute();

    $tableau = $req->fetchALL(PDO::FETCH_ASSOC);
    $json = json_encode($tableau);

    echo $json;
    
} catch(PDOExecption $e){
    echo 'Erreur ! ';
}
?>