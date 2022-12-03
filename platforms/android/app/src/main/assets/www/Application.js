class Application {
    constructor(window, vueListeEndroit, vueAjouterEndroit) {
        this.window = window;

        this.vueListeEndroit = vueListeEndroit;

        this.vueAjouterEndroit = vueAjouterEndroit;

  
    }

}

new Application(window, new VueListeEndroit(), new VueAjouterEndroit());