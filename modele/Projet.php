<?php

class Projet
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'titre' => FILTER_SANITIZE_STRING,
			'courte_descritption' => FILTER_SANITIZE_STRING,
			'description' => FILTER_SANITIZE_STRING,
			'logo' => FILTER_SANITIZE_STRING,
			'image_jeux' => FILTER_SANITIZE_STRING,
			'entreprise' => FILTER_SANITIZE_STRING,
			'prix' => FILTER_SANITIZE_STRING
		);
		
	protected $titre;
	protected $courte_descritption;
	protected $description;
	protected $logo;
	protected $image_jeux;
	protected $entreprise;
	protected $prix;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Projet::$filtres);

		$this->id = $tableau['id'];
		$this->titre = $tableau['titre'];
		$this->courte_descritption = $tableau['courte_descritption'];
		$this->description = $tableau['description'];
		$this->logo = $tableau['logo'];
		$this->image_jeux = $tableau['image_jeux'];
		$this->entreprise = $tableau['entreprise'];
		$this->prix = $tableau['prix'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'titre':
				$this->titre = $valeur;
			break;
			case 'courte_descritption':
				$this->courte_descritption = $valeur;
			break;
			case 'description':
				$this->description = $valeur;
			break;
			case 'logo':
				$this->logo = $valeur;
			break;
			case 'image_jeux':
				$this->image_jeux = $valeur;
			break;
			case 'entreprise':
				$this->entreprise = $valeur;
			break;
			case 'prix':
				$this->prix = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		//$variable = '$this->'.$propriete;
		//return $$variable;
		$self = get_object_vars($this); // externaliser pour optimiser
		//print_r($self);
		return $self[$propriete];
	}	
}
//$contrat = new Contrat();
//$contrat->titre = "coucou";
//echo $contrat->titre;
?>