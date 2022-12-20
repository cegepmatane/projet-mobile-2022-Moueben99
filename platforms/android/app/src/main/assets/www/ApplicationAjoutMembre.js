class Application {
    constructor(window, membreDAO, vueAjouterMembre) {
        this.window = window;
        this.membreDAO = membreDAO;

        this.vueAjouterMembre = vueAjouterMembre;
        this.vueAjouterMembre.initialiserActionAjouterMembre(membre => this.actionAjouterMembre(membre));
    }

    actionAjouterMembre(membre){
        this.membreDAO.ajouter(membre);
    }
}

new Application(window, new MembreDAO(), new VueAjouterMembre());