class VueAjouterEndroit{
    constructor(){
        this.hmtl = document.getElementById("html-vue-ajouter-endroit").innerHTML;

    }

    afficher(){
        document.getElementsByTagName("body")[0].innerHTML = this.hmtl;

        //base de donnée
    }
}