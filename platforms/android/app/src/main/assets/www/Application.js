class Application {
    constructor(window, endroitDAO, imageDAO,vueListeEndroit, vueAjouterEndroit, vueAjouterImage) {
        this.window = window;
        this.endroitDAO = endroitDAO;
        this.imageDAO = imageDAO;

        this.vueListeEndroit = vueListeEndroit;

        this.vueAjouterEndroit = vueAjouterEndroit;
        this.vueAjouterEndroit.initialiserActionAjouterEndroit(endroit => this.actionAjouterEndroit(endroit));

        this.vueAjouterImage = vueAjouterImage;
        this.vueAjouterImage.initialiserActionAjouterImage(image => this.actionAjouterImage(image));
    }

    actionAjouterEndroit(endroit){
        //this.endroitDAO.ajouter(endroit);
        this.endroit = endroit;
    }

    actionAjouterImage(image){
        this.imageDAO.ajouter(image, this.endroit);
    }
}

new Application(window, new EndroitDAO(), new ImageDAO(), new VueListeEndroit(), new VueAjouterEndroit(), new VueAjouterImage());