<?php

interface MembreSQL {
    const SQL_LISTER_MEMBRE = 'SELECT * FROM membre';
    const SQL_DETAIL_MEMBRE = 'SELECT * FROM membre WHERE id = :id';
    const SQL_AJOUTER_MEMBRE = 'INSERT INTO membre(pseudo, mdp, nom, confirmation_mdp) VALUES(:pseudo, :mdp, :nom, :confirmation_mdp)';

}