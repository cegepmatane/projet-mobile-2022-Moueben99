# Sécurtié

Seul les membres connectés à l'application peuvent ajouter des endroits. Si un utilisateur n'est pas connecté il peut cosulter les endroits déjà listés.
Du coter client le js envoie les données en ajax au coter serveur en php qui interroge la base de données.

Du coter serveur nous avons des php filters et des prepare statement pour le sql pour éviter l'injection de données non valide dans notre base de données.

Sources :
https://www.jbvigneron.fr/parlons-dev/php-pdo-et-les-injections-sql/