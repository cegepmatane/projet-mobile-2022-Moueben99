class VueAjouterMembre{
    constructor(){
        document.getElementById("formulaire-membre").addEventListener("submit", evenement => this.ajouterMembre(evenement));
        this.actionAjouterMembre = null;
    }

    initialiserActionAjouterMembre(actionAjouterMembre){
        this.actionAjouterMembre = actionAjouterMembre;
    }

    ajouterMembre(evenement) {
        evenement.preventDefault();

        let pseudo = document.getElementById("pseudo").value;
        let mdp = document.getElementById("mdp").value;
        let courriel = document.getElementById("courriel").value;
        let nom = document.getElementById("nom").value;

        console.log("VueAjoutMembre" + nom);

        this.actionAjouterMembre(new Membre(pseudo, mdp, courriel, nom, null));
    }

}