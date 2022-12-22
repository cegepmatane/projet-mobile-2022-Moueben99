<?php

class Endroit
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'titre' => FILTER_SANITIZE_STRING,
            'description' => FILTER_SANITIZE_STRING
		);
		
	protected $titre;
    protected $description;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Endroit::$filtres);

		$this->id = $tableau['id'];
		$this->titre = $tableau['titre'];
        $this->description = $tableau['description'];
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
            case 'description':
				$this->description = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this); 
		return $self[$propriete];
	}	
}