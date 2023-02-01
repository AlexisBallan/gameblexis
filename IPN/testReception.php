<?php
    $mail = $_POST['payer_email'];

    $to      = $mail;
    $subject = 'Merci de votre achat !';
    $message = 'Toutes l equipe Gameblexis vous remercie pour votre achat, a bientot !';
    $headers = 'From: gameblexis@hotmail.com' . "\r\n" .
        'Reply-To: gameblexis@hotmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
    mail($to, $subject, $message, $headers);


    $usager = 'keeels';
    $motdepasse = 'fqwJFG5b55rp862';
    $hote = 'localhost';
    $base = 'gameblexis';
    //$charset = 'utf8mb4'; // $charset = 'utf8';

    $dsn = "mysql:host=$hote;dbname=$base;";
    $basededonnees = new PDO($dsn, $usager, $motdepasse);

    $infos = json_encode($_POST);

    $INFO = "INSERT into paiement(information) VALUES(:info)";
    $initialiser = $basededonnees->prepare($INFO);
    $initialiser->bindValue(':info', $infos);
    $initialiser->execute();

    //file_put_contents('test.txt', $mail);
?>
