class Application {
    constructor(window, endroitDAO, imageDAO, vueListeEndroit) {
        console.log("Application");

        this.window = window;
        this.endroitDAO = endroitDAO;
        this.imageDAO = imageDAO;

        this.vueListeEndroit = vueListeEndroit;
        this.vueListeEndroit.initialiserListeEndroit(this.endroitDAO.lister());
        this.vueListeEndroit.afficher();
    }

}

new Application(window, new EndroitDAO(), new ImageDAO(), new VueListeEndroit());