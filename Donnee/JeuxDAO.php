<?php
class JeuxDAO{ 


    
    public static function listerJeux(){
        //echo 'listerJeux';
        
        require('/var/www/html/gameblexis/connexion.php');
            
        $SQL_JEUX = "SELECT * FROM jeux";

        $requete = $basededonnees->prepare($SQL_JEUX);
		$requete->execute();
		$jeux = $requete->fetchAll(PDO::FETCH_OBJ);
		
		return $jeux;
    }
}

?>