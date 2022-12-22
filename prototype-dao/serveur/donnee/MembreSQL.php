<?php
interface MembreSQL {
	public const SQL_VERIFIER_MEMBRE = "SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp";
	public const SQL_CREER_MEMBRE = 'INSERT into membre(nom, mdp, pseudo, courriel) VALUES(:nom, :mdp, :pseudo, :courriel)';
}