<?php 
    print_r($_POST);

    include_once("donnee/UtilisateurDAO.php");
    include_once("modele/Utilisateur.php");
	
    $utilisateur = new Utilisateur($_POST);

    UtilisateurDAO::ajouterUtilisateur($utilisateur);

    $to      = $_POST['email'];
    $subject = 'Inscription';
    $message = 'Bienvenue ches nous ! On espere de tout coeur que vous allez prendre du plaisir sur le site!';
    $headers = 'From: gameblexis@hotmail.com' . "\r\n" .
        'Reply-To: gameblexis@hotmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);

    header('Location: https://gameblexis.com/');
    exit;
    
?>