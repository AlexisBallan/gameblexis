<?php
interface ProjetSQL
{
		public const SQL_LISTE_PROJETS = "SELECT * FROM jeux";
		public const SQL_DETAIL_PROJET = "SELECT * FROM jeux WHERE id = :id"; 
		public const SQL_AJOUTER_PROJET = "INSERT into jeux(titre, courte_descritption, description, logo, image_jeux, entreprise, prix) VALUES(:titre, :courte_descritption, :description, :logo, :image_jeux, :entreprise, :prix)";
		public const SQL_EDITER_PROJET = "UPDATE jeux SET titre = :titre, courte_descritption= :courte_descritption, description = :description, logo = :logo, image_jeux = :image_jeux, entreprise = :entreprise, prix = :prix WHERE id = :id";
		public const SQL_EFFACER_PROJET = "DELETE FROM jeux WHERE id = :id";
}
?>