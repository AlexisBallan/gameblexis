<?php
interface UsersSQL
{
		public const SQL_DETAIL_UTILISATEUR = "SELECT * FROM utilisateurs WHERE id = :id"; 
		public const SQL_AJOUTER_UTILISATEUR = "INSERT into utilisateurs(nom, photo, mdp, email, description, entreprise, admin) VALUES(:nom, :photo, :mdp, :email, :description, :entreprise, :admin)";
		public const SQL_EDITER_UTILISATEUR = "UPDATE utilisateurs SET nom = :nom, photo= :photo, mdp = :mdp, email = :email, description = :description, entreprise = :entreprise WHERE id = :id";
		public const SQL_EFFACER_UTILISATEUR = "DELETE FROM utilisateurs WHERE id = :id";
}
?>