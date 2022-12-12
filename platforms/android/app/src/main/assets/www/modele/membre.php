<?php

class Membre
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'md5' => FILTER_SANITIZE_STRING,
            'nom' => FILTER_SANITIZE_STRING,
            'courriel' => FILTER_VALIDATE_EMAIL,
            'confirmation_md5' => FILTER_SANITIZE_STRING,
			'pseudo' => FILTER_SANITIZE_STRING,
		);
		
	protected $md5;
	protected $nom;
    protected $courriel;
    protected $confirmation_md5;
    protected $pseudo;
	
	public $erreurs = [];
	
	public $contenus = [];
	
	public function __construct($tableau, $authentifier)
	{
		
		$tableau = filter_var_array($tableau, Membre::$filtres);

		$this->id = $tableau['id'];
		$this->md5 = $tableau['md5'];
		$this->nom = $tableau['nom'];
        $this->courriel = $tableau['courriel'];
        $this->confirmation_md5 = $tableau['confirmation_md5'];
        $this->pseudo = $tableau['pseudo'];

		$verifie = $this->verifierMotDePasse($authentifier);
		if(!$authentifier)
			$this->valider($verifie);
		else
			$this->validerContenuConnexionMembre();
	}
	
	public function verifierMotDePasse($authentifier){
		if($authentifier){
			return password_verify($this->confirmation_md5, $this->md5);
		}
		else {
			$this->md5 = password_hash ($this->md5, PASSWORD_DEFAULT);
			return password_verify($this->confirmation_md5, $this->md5);
		}
	}
	
	
	
	public function valider($verifie){
		if(!$verifie){
			$this->erreurs[] = "Les deux valeurs de mots de passe saisies doivent être les mêmes !";
		}
		if(empty($this->nom)){
			$this->erreurs[] = "Veuillez entrer une valeur pour le nom !";
		}
		if(empty($this->courriel)){
			$this->erreurs[] = "Veuillez entrer un courriel valide !";
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
			case 'md5':
				$this->md5 = $valeur;
			break;
			case 'nom':
				$this->nom = $valeur;
			break;
            case 'courriel':
				$this->courriel = $valeur;
			break;
            case 'confirmation_md5':
				$this->confirmation_md5 = $valeur;
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