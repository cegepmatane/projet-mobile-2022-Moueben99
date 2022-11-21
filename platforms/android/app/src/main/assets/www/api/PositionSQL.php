<?php
interface PositonSQL {
    public const SQL_LISTER_POSITION = 'SELECT * FROM position WHERE id_endroit = :id_endroit';
    public const SQL_AJOUTER_POSITION = 'INSERT INTO position(longitude, latitude) VALUES(:longitude, :latitude)';
}