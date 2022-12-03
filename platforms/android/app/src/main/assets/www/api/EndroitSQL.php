<?php

interface EndroitSQL {
    const SQL_LISTER_ENDROIT = 'SELECT * FROM endroit';
    const SQL_DETAIL_ENDROIT = 'SELECT * FROM endroit WHERE id = :id';
    const SQL_AJOUTER_ENDROIT = 'INSERT INTO endroit(titre, description) VALUES(:titre, :description)';

}