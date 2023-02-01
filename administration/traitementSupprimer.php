<?php
    include_once "accesseur/ProjetDAO.php";
   // print_r($_POST);

    //print_r($_POST['action-effacer']);

    $id = $_POST['projet'];
    print_r("id: ");
    print_r($id);
    $valeurAction = $_POST['action-effacer'];
    $URL = "../index.php";

    if($valeurAction == "Oui")
    {
        //print_r("C'est un oui");
        ProjetDAO::effacerProjet($id);
        header('Location: ../index.php') ;

    }
    else{
        //print_r("C'est un non");
        header('Location: ../index.php') ;
    }

?>