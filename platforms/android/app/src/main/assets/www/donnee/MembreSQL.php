<?php
interface MembreSQL {
	public const SQL_TROUVER_MEMBRE = "SELECT * FROM membre WHERE pseudo = :pseudo";
	public const SQL_VERIFIER_MEMBRE = "SELECT pseudo,md5 FROM membre WHERE pseudo = :pseudo AND md5= :md5";
    public const SQL_MEMBRE = "SELECT * FROM membre WHERE id = :id";
	public const SQL_CREER_MEMBRE = 'INSERT into membre(nom, courriel, pseudo, md5, confirmation_md5) VALUES(:nom, :courriel, :pseudo, :md5, :confirmation_md5)';
	public const SQL_MODIFIER_MEMBRE = "UPDATE membre SET pseudo = :pseudo, nom = :nom, courriel = :courriel, md5 = :md5, confirmation_md5 = :confirmation_md5 WHERE id = :id";
}