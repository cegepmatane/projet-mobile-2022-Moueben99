<?php

class Membre
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'mdp' => FILTER_SANITIZE_STRING,
            'nom' => FILTER_SANITIZE_STRING,
			'confirmation_mdp' => FILTER_SANITIZE_STRING,
			'pseudo' => FILTER_SANITIZE_STRING,
		);
		
	protected $mdp;
	protected $nom;
	protected $confirmation_mdp;
    protected $pseudo;
	
	public $erreurs = [];
	
	public $contenus = [];
	
	public function __construct($tableau, $authentifier)
	{
		
		$tableau = filter_var_array($tableau, Membre::$filtres);

		$this->id = $tableau['id'];
		$this->mdp = $tableau['mdp'];
		$this->nom = $tableau['nom'];
        $this->confirmation_mdp = $tableau['confirmation_mdp'];
        $this->pseudo = $tableau['pseudo'];

		$verifie = $this->verifierMotDePasse($authentifier);
		if(!$authentifier)
			$this->valider($verifie);
		else
			$this->validerContenuConnexionMembre();
	}
	
	public function verifierMotDePasse($authentifier){
		if($authentifier){
			return password_verify($this->confirmation_mdp, $this->mdp);
		}
		else {
			$this->mdp = password_hash ($this->mdp, PASSWORD_DEFAULT);
			return password_verify($this->confirmation_mdp, $this->mdp);
		}
	}
	
	
	
	public function valider($verifie){
		if(!$verifie){
			$this->erreurs[] = "Les deux valeurs de mots de passe saisies doivent être les mêmes !";
		}
		if(empty($this->nom)){
			$this->erreurs[] = "Veuillez entrer une valeur pour le nom !";
		}
		if(empty($this->pseudo)){
			$this->erreurs[] = "Veuillez entrer un pseudo !";
		}
		
	}
	
	public function validerContenuConnexionMembre(){
		if(empty($this->pseudo)){
			$this->contenus[] = "Veuillez entrer le bon pseudo !";
		}
		
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
            case 'confirmation_mdp':
				$this->confirmation_mdp = $valeur;
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