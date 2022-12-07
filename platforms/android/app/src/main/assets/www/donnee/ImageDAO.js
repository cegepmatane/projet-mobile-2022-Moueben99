class ImageDAO{
    ajouter(image, endroit){
        console.log(image.image + endroit.titre);
        fetch("http://services.mayal.systems/ajouter-image.php", {
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({'FormData' : image.image, 'titre': endroit.titre, 'description': endroit.description})
        }).then((reponse) =>{
            console.log(reponse.body);
        });
    }
}