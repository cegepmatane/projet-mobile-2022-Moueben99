class Application {
    constructor(window, vueListeEndroit, vueAjouterEndroit) {
        this.window = window;

        this.vueListeEndroit = vueListeEndroit;

        this.vueAjouterEndroit = vueAjouterEndroit;

        this.naviguer();
        this.window.addEventListener("hashchange", () =>this.naviguer());
    }

    naviguer(){
        let hash = window.location.hash;

        if(!hash){
            this.vueListeEndroit.afficher();
        }
        else if(hash.match(/^#ajouter/)){
            this.vueAjouterEndroit.afficher();
        }
    }

}

new Application(window, new VueListeEndroit(), new VueAjouterEndroit());