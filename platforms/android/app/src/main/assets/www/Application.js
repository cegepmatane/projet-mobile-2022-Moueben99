class Application {
    constructor(window, vueListeEndroit) {
        this.window = window;

        this.vueListeEndroit = vueListeEndroit;
        this.naviguer();
    }

    naviguer(){
        this.vueListeEndroit.afficher();
    }

}

new Application(window, new VueListeEndroit());