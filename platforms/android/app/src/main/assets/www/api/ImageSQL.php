<?php

interface ImageSQL {
    const SQL_LISTER_IMAGE = 'SELECT * FROM image WHERE id_endroit = :id_endroit';
    const SQL_AJOUTER_IMAGE = 'INSERT INTO image(image, id_endroit) VALUES(:image, :id_endroit)';

}