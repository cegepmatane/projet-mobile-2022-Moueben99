<?php

class Membre
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'mdp' => FILTER_SANITIZE_STRING,
            'nom' => FILTER_SANITIZE_STRING,
			'courriel' => FILTER_SANITIZE_STRING,
			'pseudo' => FILTER_SANITIZE_STRING,
		);
		
	protected $mdp;
	protected $nom;
	protected $courriel;
    protected $pseudo;
	
	public $erreurs = [];
	
	public $contenus = [];
	
	public function __construct($tableau)
	{
		
		$tableau = filter_var_array($tableau, Membre::$filtres);

		$this->id = $tableau['id'];
		$this->mdp = $tableau['mdp'];
		$this->nom = $tableau['nom'];
        $this->courriel = $tableau['courriel'];
        $this->pseudo = $tableau['pseudo'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'mdp':
				$this->mdp = $valeur;
			break;
			case 'nom':
				$this->nom = $valeur;
			break;
            case 'courriel':
				$this->courriel = $valeur;
			break;
            case 'pseudo':
				$this->pseudo = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this);
		return $self[$propriete];
	}	
}