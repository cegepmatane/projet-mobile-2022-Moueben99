class Application {
    constructor(window, endroitDAO, imageDAO, vueAjouterEndroit, vueAjouterImage) {
        this.window = window;
        this.endroitDAO = endroitDAO;
        this.imageDAO = imageDAO;

        this.vueAjouterEndroit = vueAjouterEndroit;
        this.vueAjouterEndroit.initialiserActionAjouterEndroit(endroit => this.actionAjouterEndroit(endroit));

        this.vueAjouterImage = vueAjouterImage;
        this.vueAjouterImage.initialiserActionAjouterImage(image => this.actionAjouterImage(image));
    }

    actionAjouterEndroit(endroit){
        this.endroitDAO.ajouter(endroit);
    }

    actionAjouterImage(image){
        this.imageDAO.ajouter(image);
    }
}

new Application(window, new EndroitDAO(), new ImageDAO(), new VueAjouterEndroit(), new VueAjouterImage());