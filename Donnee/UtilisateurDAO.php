<?php

	include_once "/var/www/www.gameblexis.com/modele/Utilisateur.php"; // autoload permis
    include_once "/var/www/www.gameblexis.com/administration/accesseur/UsersSQL.php";

    class Accesseur
    {
        public static $basededonnees = null;

        public static function initialiser()
        {
            //include_once "../Donnee/connexion.php";

            require('/var/www/html/gameblexis/connexion.php');

            $dsn = $basededonnees

            UtilisateurDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
            UtilisateurDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
    }	

    class UtilisateurDAO extends Accesseur implements UsersSQL
    {


        function ajouterUtilisateur($projet)
        {

            UtilisateurDAO::initialiser();

            /*print_r("UtilisateurDAO(projet), projet = ");
            print_r($projet);

            print_r("projet.nom = ");
            print_r($projet->nom);*/

            //private const SQL_AJOUTER_UTILISATEUR = "INSERT into utilisateurs(nom, photo, mdp, email, description, entreprise) VALUES(:nom, :photo, :mdp, :email, :description, :entreprise)";
            $password = password_hash($projet->mdp, PASSWORD_DEFAULT);

            $demandeAjoutUtilisateur = UtilisateurDAO::$basededonnees->prepare(UsersSQL::SQL_AJOUTER_UTILISATEUR);

            $demandeAjoutUtilisateur->bindValue(':nom',$projet->nom, PDO::PARAM_STR);
			$demandeAjoutUtilisateur->bindValue(':photo',$projet->photo, PDO::PARAM_STR);
			$demandeAjoutUtilisateur->bindValue(':mdp',$password, PDO::PARAM_STR);
			$demandeAjoutUtilisateur->bindValue(':email',$projet->email, PDO::PARAM_STR);
			$demandeAjoutUtilisateur->bindValue(':description',$projet->description, PDO::PARAM_STR);
			$demandeAjoutUtilisateur->bindValue(':entreprise',$projet->entreprise, PDO::PARAM_STR);
            $demandeAjoutUtilisateur->bindValue(':admin',$projet->admin, PDO::PARAM_STR);

			$demandeAjoutUtilisateur->execute();	

        }

        public static function detaillerUtilisateur($id)
		{
			UtilisateurDAO::initialiser();
			$demandeUtilisateur = UtilisateurDAO::$basededonnees->prepare(UtilisateurDAO::SQL_DETAIL_UTILISATEUR);
			$demandeUtilisateur->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeUtilisateur->execute();
			//$projet = $demandeProjet->fetchAll(PDO::FETCH_OBJ)[0];
			$utilisateur = $demandeUtilisateur->fetch(PDO::FETCH_ASSOC);

			return new Utilisateur($utilisateur);
		}

        public static function editerUtilisateur($utilisateur)
		{
			//print_r($projet);
			UtilisateurDAO::initialiser();

			//echo $SQL_EDITER_PROJET;
			$demandeEditionUtilisateur = UtilisateurDAO::$basededonnees->prepare(UtilisateurDAO::SQL_EDITER_UTILISATEUR);
			$demandeEditionUtilisateur->bindValue(':nom',$utilisateur->nom, PDO::PARAM_STR);
			$demandeEditionUtilisateur->bindValue(':photo',$utilisateur->photo, PDO::PARAM_STR);
			$demandeEditionUtilisateur->bindValue(':mdp',$utilisateur->mdp, PDO::PARAM_STR);
			$demandeEditionUtilisateur->bindValue(':email',$utilisateur->email, PDO::PARAM_STR);
            $demandeEditionUtilisateur->bindValue(':description',$utilisateur->description, PDO::PARAM_STR);
			$demandeEditionUtilisateur->bindValue(':entreprise',$utilisateur->entreprise, PDO::PARAM_STR);
			$demandeEditionUtilisateur->bindValue(':id',$utilisateur->id, PDO::PARAM_STR);
			print_r($utilisateur);

			$demandeEditionUtilisateur->execute();
			//print_r($demandeEditionProjet->errorInfo());
		}
    }
?>