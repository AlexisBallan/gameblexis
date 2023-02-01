<?php

$idNouvelle = $_GET["id"];

try{
    $db = new PDO('mysql:host=localhost;dbname=gameblexis', 'keeels', 'fqwJFG5b55rp862');

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