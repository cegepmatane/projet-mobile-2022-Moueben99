class VueAjouterImage{
    constructor(){
        document.getElementById("formulaire-endroit").addEventListener("submit", evenement => this.enregistrer(evenement));
        this.actionAjouterImage = null;
    }

    initialiserActionAjouterImage(actionAjouterImage){
        this.actionAjouterImage = actionAjouterImage;
    }

    enregistrer(evenement) {
        console.log("enregistrer");
        evenement.preventDefault();

        let images = document.querySelector('[type=file]').files;
        let data = new FormData();

        for (let i = 0; i < images.length; i++) {
            let image = images[i];

            data.append('files[]', image);
        }

        this.actionAjouterImage(new Images(data, null, null));
    }

}