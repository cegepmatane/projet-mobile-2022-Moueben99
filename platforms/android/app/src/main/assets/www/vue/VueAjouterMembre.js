class VueAjouterMembre{
    constructor(){
        document.getElementById("confirmer").addEventListener("submit", evenement => this.authentifier(evenement));
        this.actionAjouterMembre = null;
    }

    initialiserActionAjouterMembre(actionAjouterMembre){
        this.actionAjouterMembre = actionAjouterMembre;
    }

    authentifier(evenement) {
        evenement.preventDefault();

        let pseudo = document.getElementById("pseudo").value;
        let mdp = document.getElementById("mdp").value;
        let courriel = document.getElementById("courriel").value;
        let nom = document.getElementById("nom").value;

        this.actionAjouterMembre(new Membre(pseudo, mdp, courriel, nom, null));
    }

}