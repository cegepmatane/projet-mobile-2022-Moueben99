class Application {
    constructor(window, endroitDAO, vueListeEndroit, vueAjouterEndroit) {
        this.window = window;
        this.endroitDAO = endroitDAO;

        this.vueListeEndroit = vueListeEndroit;

        this.vueAjouterEndroit = vueAjouterEndroit;
        this.vueAjouterEndroit.initialiserActionAjouterEndroit(endroit => this.actionAjouterEndroit(endroit));
        
    }

    actionAjouterEndroit(endroit){
        this.endroitDAO.ajouter(endroit);
    }

}

new Application(window, new EndroitDAO(), new VueListeEndroit(), new VueAjouterEndroit());