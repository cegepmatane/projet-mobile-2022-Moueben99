class Application {
    constructor(window, membreDAO, connexionDAO) {
        this.window = window;
        this.membreDAO = membreDAO;
        this.connexionDAO = connexionDAO;

        this.vueAjouterMembre = vueAjouterMembre;
        this.vueAjouterMembre.initialiserActionAjouterMembre(membre => this.actionAjouterMembre(membre));

        this.vueAjouterAutorisation = vueAjouterAutorisation;
        this.vueAjouterAutorisation.initialiserActionAjouterAutorisation(autorisation => this.actionAjouterAutorisation(autorisation));
    }

    actionAjouterMembre(membre){
        this.membreDAO.ajouter(membre);
    }

    vueAjouterAutorisation(autorisation){
        this.connexionDAO.ajouter(autorisation);
    }
}

new Application(window, new MembreDAO(), new AutorisationDAO(), new VueAjouterMembre(), new VueAjouterAutorisation());