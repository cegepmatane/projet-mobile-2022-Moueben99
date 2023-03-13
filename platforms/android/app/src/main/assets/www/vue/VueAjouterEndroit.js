class VueAjouterEndroit{
    constructor(){
        document.getElementById("formulaire-endroit").addEventListener("submit", evenement => this.enregistrer(evenement));
        this.actionAjouterEndroit = null;
    }

    initialiserActionAjouterEndroit(actionAjouterEndroit){
        this.actionAjouterEndroit = actionAjouterEndroit;
    }

    enregistrer(evenement) {
        console.log("enregistrer");
        evenement.preventDefault();

        let titre = document.getElementById("titre").value;
        let description = document.getElementById("description").value;
        let musique = document.getElementById("musique").value;
        let meteo = document.getElementById("meteo").value;
        let heure = document.getElementById("heure").value;

        this.actionAjouterEndroit(new Endroit(titre, description, musique, meteo, heure, null));
    }

}