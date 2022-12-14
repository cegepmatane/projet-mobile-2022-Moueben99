class Application {
    constructor(window, authentificationDAO, connexionDAO) {
        this.window = window;
        this.authentificationDAO = authentificationDAO;
        this.connexionDAO = connexionDAO;

        this.vueAjouterMembre = vueAjouterMembre;
        this.vueAjouterMembre.initialiserActionAjouterMembre(membre => this.actionAjouterMembre(membre));

        this.vueAjouterAutorisation = vueAjouterAutorisation;
        this.vueAjouterAutorisation.initialiserActionAjouterAutorisation(autorisation => this.actionAjouterAutorisation(autorisation));
    }

    actionAjouterMembre(membre){
        this.authentificationDAO.ajouter(membre);
    }

    vueAjouterAutorisation(autorisation){
        this.connexionDAO.ajouter(autorisation);
    }
}

new Application(window, new AuthentificationDAO(), new AutorisationDAO(), new VueAjouterAuthentification(), new VueAjouterAutorisation());