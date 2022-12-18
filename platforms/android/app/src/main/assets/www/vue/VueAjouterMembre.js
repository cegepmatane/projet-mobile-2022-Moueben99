class VueAjouterMembre{
    constructor(){
        document.getElementById("authentification-membre").addEventListener("submit", evenement => this.authentifier(evenement));
        this.actionAjouterMembre = null;
    }

    initialiserActionAjouterMembre(actionAjouterMembre){
        this.actionAjouterMembre = actionAjouterMembre;
    }

    authentifier(evenement) {
        console.log("authentifier");
        evenement.preventDefault();

        let pseudo = document.getElementById("pseudo").value;
        let mdp = document.getElementById("mdp").value;

        this.actionAjouterMembre(new Membre(pseudo, mdp, null));
    }

}