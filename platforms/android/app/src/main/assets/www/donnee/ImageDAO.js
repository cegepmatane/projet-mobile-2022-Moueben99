class ImageDAO{
    ajouter(image){
        console.log(image.image)
        fetch("http://51.79.70.237/serveur/ajouter-image.php", {
            method: "POST",
            body: image.image
        }).then((reponse) =>{
            console.log(reponse.body);
        });
    }
}