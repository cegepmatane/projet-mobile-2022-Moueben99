<?php

interface ImageSQL {
    const SQL_LISTER_IMAGE = 'SELECT * FROM image WHERE endroit_id = :id_endroit';
    //const SQL_AJOUTER_IMAGE = 'INSERT INTO image(image, endroit_id) VALUES(:image, :id_endroit)';
    const SQL_AJOUTER_IMAGE = 'INSERT INTO image(image) VALUES(:image)';
}