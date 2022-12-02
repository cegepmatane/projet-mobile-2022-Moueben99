class VueListeEndroit{
    constructor(){
        this.hmtl = document.getElementById("html-vue-liste-endroit").innerHTML;

    }

    //base de donnée

    afficher(){
        document.getElementsByTagName("body")[0].innerHTML = this.hmtl;

        //base de donnée
    }
}