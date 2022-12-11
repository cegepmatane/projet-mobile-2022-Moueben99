class EndroitDAO {
    constructor(){
        this.listeEndroit = [];
    }

    lister(){

        for(let position in this.listeEndroit){
            let endroit = new Personnage(this.listeEndroit[position].titre,
                this.listeEndroit[position].description,
                this.listeEndroit[position].id);

            this.listeEndroit[endroit.id] = endroit;
        }
        return this.listeEndroit;
    }

    ajouter(endroit){
        let requette = new XMLHttpRequest();

        if(!requette) {
            return null;
        }
        requette.onreadystatechange = function(){

            if (requette.readyState === XMLHttpRequest.DONE) {
                if(requette.status === 200){
                    //alert(requette.responseText);
                }
                else {
                    alert(requette.responseText);
                    return null;
                }
            }
        }

        requette.open('POST', "http://services.mayal.systems/ajouter-endroit.php");
        requette.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        requette.send(`titre=${encodeURIComponent(endroit.titre)}&description=${encodeURIComponent(endroit.description)}`)
    }
}