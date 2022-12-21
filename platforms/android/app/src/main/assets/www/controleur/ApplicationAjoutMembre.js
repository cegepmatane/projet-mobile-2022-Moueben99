class Application {
    constructor(window, membreDAO, vueAjouterMembre) {
        console.log("ApplicationAjoutMembre");
        this.window = window;
        this.membreDAO = membreDAO;

        this.vueAjouterMembre = vueAjouterMembre;
        this.vueAjouterMembre.initialiserActionAjouterMembre(membre => this.actionAjouterMembre(membre));
    }

    actionAjouterMembre(membre){
        console.log("ici!!");
        this.membreDAO.ajouter(membre);
    }
}

new Application(window, new MembreDAO(), new VueAjouterMembre());