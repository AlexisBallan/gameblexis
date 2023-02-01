<?php 
    print_r($_POST);

    include_once("../donnee/PojetDAO.php");
    include_once("../modele/Projet.php");
	
	$projet = new Projet($_POST);
	
	ProjetDAO::ajouterProjet($projet);

    header('Location: https://gameblexis.com/');
    exit;
?>