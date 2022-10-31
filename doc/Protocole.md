# Communication sevreur

La base de données est sur un vps, les intéractions se font en php.

Les différentes posititons d'endroits sont stocker dans le serveur et sont réceptionnées par google maps en json. La liste d'endroit est aussi sur le serveur, donc lors de l'ajout d'endroits un nouveau champ est ajouté dans la table.

* ajouter avec titre, descritpion, image et position en entrée
* lister avec id en entrée

# Exemple de données possibles

position google maps sur serveur mysql

eqfeed_callback({"type":"FeatureCollection","metadata":{"generated":1667218768000,"url":"https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp","title":"USGS Magnitude 2.5+ Earthquakes, Past Week","status":200,"api":"1.10.3","count":265},"features":[{"type":"Feature","properties":{"mag":2.5,"place":"Kodiak Island region, Alaska","time":1667216728542,"updated":1667217107040,"tz":null,"url":"https://earthquake.usgs.gov/earthquakes/eventpage/ak022dyy6z7a","detail":"https://earthquake.usgs.gov/earthquakes/feed/v1.0/detail/ak022dyy6z7a.geojsonp","felt":null,"cdi":null,"mmi":null,"alert":null,"status":"automatic","tsunami":0,"sig":96,"net":"ak","code":"022dyy6z7a","ids":",us7000ilgj,ak022dyy6z7a,","sources":",us,ak,","types":",origin,phase-data,","nst":null,"dmin":null,"rms":0.52,"gap":null,"magType":"ml","type":"earthquake","title":"M 2.5 - Kodiak Island region, Alaska"},"geometry":{"type":"Point","coordinates":[-153.7338,57.1771,34]},"id":"ak022dyy6z7a"}
