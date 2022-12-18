class Application {
    constructor(window, endroitDAO, imageDAO, vueListeEndroit) {
        console.log("Application");

        this.window = window;
        this.endroitDAO = endroitDAO;
        this.imageDAO = imageDAO;

        this.vueListeEndroit = vueListeEndroit;
        this.endroitDAO.lister();
    }

}

new Application(window, new EndroitDAO(), new ImageDAO(), new VueListeEndroit());