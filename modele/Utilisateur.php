<?php

class Utilisateur
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_STRING,
			'photo' => FILTER_SANITIZE_STRING,
			'mdp' => FILTER_SANITIZE_STRING,
			'email' => FILTER_SANITIZE_STRING,
			'description' => FILTER_SANITIZE_STRING,
			'entreprise' => FILTER_SANITIZE_STRING,
			'admin' => FILTER_VALIDATE_INT
		);
		
	protected $nom;
	protected $photo;
	protected $mdp;
	protected $email;
	protected $description;
	protected $entreprise;
	protected $admin;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Utilisateur::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->photo = $tableau['photo'];
		$this->mdp = $tableau['mdp'];
		$this->email = $tableau['email'];
		$this->description = $tableau['description'];
		$this->entreprise = $tableau['entreprise'];
		$this->admin = $tableau['admin'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'nom':
				$this->nom = $valeur;
			break;
			case 'photo':
				$this->photo = $valeur;
			break;
			case 'mdp':
				$this->mdp = $valeur;
			break;
			case 'email':
				$this->email = $valeur;
			break;
			case 'description':
				$this->description = $valeur;
			break;
			case 'entreprise':
				$this->entreprise = $valeur;
			break;
			case 'admin':
				$this->admin = $valeur;
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