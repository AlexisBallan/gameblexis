<?php

class Projet
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'titre' => FILTER_SANITIZE_STRING,
			'courte_descritption' => FILTER_SANITIZE_STRING,
			'description' => FILTER_SANITIZE_STRING,
			'photo' => FILTER_SANITIZE_STRING,
			'entreprise' => FILTER_SANITIZE_STRING,
			'prix' => FILTER_SANITIZE_STRING
		);
		
	protected $titre;
	protected $courte_descritption;
	protected $description;
	protected $photo;
	protected $entreprise;
	protected $prix;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Projet::$filtres);

		$this->id = $tableau['id'];
		$this->titre = $tableau['titre'];
		$this->courte_descritption = $tableau['courte_descritption'];
		$this->description = $tableau['description'];
		$this->photo = $tableau['photo'];
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
			case 'photo':
				$this->photo = $valeur;
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
		$self = get_object_vars($this);
		return $self[$propriete];
	}	
}
?>