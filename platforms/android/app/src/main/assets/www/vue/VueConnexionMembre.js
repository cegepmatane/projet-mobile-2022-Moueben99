class VueConnexionMembre{
    constructor(){
        document.getElementById("formulaire-membre").addEventListener("submit", evenement => this.connecterMembre(evenement));
        this.actionConnexionMembre = null;
    }

    initialiserActionConnexionMembre(actionConnexionMembre){
        this.actionConnexionMembre = actionConnexionMembre;
    }

    connecterMembre(evenement) {
        evenement.preventDefault();

        let pseudo = document.getElementById("pseudo").value;
        let mdp = document.getElementById("mdp").value;

        this.actionConnexionMembre(new Membre(pseudo, mdp, null, null, null));
    }

}