<?php
class JeuxDAO{ 


    
    public static function listerJeux(){
        //echo 'listerJeux';
        
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        $usager = 'keeels';
        $motdepasse = 'fqwJFG5b55rp862';
        $hote = 'localhost';
        $base = 'gameblexis';
        //$charset = 'utf8mb4'; // $charset = 'utf8';
    
        $dsn = "mysql:host=$hote;dbname=$base;";
        $basededonnees = new PDO($dsn, $usager, $motdepasse);
            
        $SQL_JEUX = "SELECT * FROM jeux";

        $requete = $basededonnees->prepare($SQL_JEUX);
		$requete->execute();
		$jeux = $requete->fetchAll(PDO::FETCH_OBJ);
		
		return $jeux;
    }
}

?>