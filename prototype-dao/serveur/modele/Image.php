<?php

class Image
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'image' => FILTER_SANITIZE_STRING,
            'id_endroit' => FILTER_VALIDATE_INT
		);
		
	protected $titre;
    protected $id_endroit;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Image::$filtres);

		$this->id = $tableau['id'];
		$this->image = $tableau['image'];
        $this->id_endroit = $tableau['id_endroit'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'image':
				$this->image = $valeur;
			break;
            case 'id_endroit':
				$this->id_endroit = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this); 
		return $self[$propriete];
	}	
}