class ImageDAO{
    ajouter(image){
        console.log(image.image)
        fetch("http://services.mayal.systems/ajouter-image.php", {
            method: "POST",
            body: image.image
        }).then((reponse) =>{
            console.log(reponse.body);
        });
    }
}