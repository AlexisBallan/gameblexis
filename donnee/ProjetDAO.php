<?php 
	include_once "/var/www/www.gameblexis.com/modele/Projet.php"; // autoload permis
	include_once "/var/www/www.gameblexis.com/administration/accesseur/ProjetSQL.php";

	class Accesseur
	{
		public static $basededonnees = null;

		public static function initialiser()
		{
			require('/var/www/html/gameblexis/connexion.php');

			ProjetDAO::$basededonnees = $basededonnees;
			ProjetDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
	}	
	
	class ProjetDAO extends Accesseur implements ProjetSQL
	{		
		public static function listerProjets()
		{
			ProjetDAO::initialiser();
			$demandeProjets = ProjetDAO::$basededonnees->prepare(ProjetDAO::SQL_LISTE_PROJETS);
			$demandeProjets->execute();
			//$projets = $demandeProjets->fetchAll(PDO::FETCH_OBJ);
			$ProjetsTableau = $demandeProjets->fetchAll(PDO::FETCH_ASSOC);
			foreach($ProjetsTableau as $ProjetTableau) $projets[] = new Projet($ProjetTableau);
			return $projets;
		}
		
		public static function detaillerProjet($id)
		{
			ProjetDAO::initialiser();
			$demandeProjet = ProjetDAO::$basededonnees->prepare(ProjetDAO::SQL_DETAIL_PROJET);
			$demandeProjet->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeProjet->execute();
			//$projet = $demandeProjet->fetchAll(PDO::FETCH_OBJ)[0];
			$projet = $demandeProjet->fetch(PDO::FETCH_ASSOC);
			return new Projet($projet);
		}
		
		public static function ajouterProjet($projet)
		{
			ProjetDAO::initialiser();
			//echo $SQL_AJOUTER_PROJET;
			$demandeAjoutProjet = ProjetDAO::$basededonnees->prepare(ProjetDAO::SQL_AJOUTER_PROJET);
			$demandeAjoutProjet->bindValue(':titre',$projet->titre, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':description',$projet->description, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':logo',$projet->logo, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':image_jeux',$projet->image_jeux, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':entreprise',$projet->entreprise, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':courte_descritption',$projet->courte_descritption, PDO::PARAM_STR);
			$demandeAjoutProjet->bindValue(':prix',$projet->prix, PDO::PARAM_STR);
			$demandeAjoutProjet->execute();			
		}
		
		public static function editerProjet($projet)
		{
			//print_r($projet);
			ProjetDAO::initialiser();

			//echo $SQL_EDITER_PROJET;
			$demandeEditionProjet = ProjetDAO::$basededonnees->prepare(ProjetDAO::SQL_EDITER_PROJET);
			$demandeEditionProjet->bindValue(':titre',$projet->titre, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':courte_descritption',$projet->courte_descritption, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':description',$projet->description, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':logo',$projet->logo, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':image_jeux',$projet->image_jeux, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':entreprise',$projet->entreprise, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':prix',$projet->prix, PDO::PARAM_STR);
			$demandeEditionProjet->bindValue(':id',$projet->id, PDO::PARAM_INT);
			print_r($projet);

			$demandeEditionProjet->execute();
			//print_r($demandeEditionProjet->errorInfo());
		}
		
		public static function effacerProjet($id)
		{
			ProjetDAO::initialiser();

			//echo $SQL_EFFACER_PROJET;
			$demandeEffacementProjet = ProjetDAO::$basededonnees->prepare(ProjetDAO::SQL_EFFACER_PROJET);
			$demandeEffacementProjet->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeEffacementProjet->execute();
		}
		
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}