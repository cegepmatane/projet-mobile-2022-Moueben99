class EndroitDAO {
    constructor(){
        this.listeEndroit = [];
    }

    lister(){
        console.log("EndroitDAO");

        let requette = new XMLHttpRequest();
        
        if(!requette){
            return null;
        }
        requette.open('GET', "http://services.mayal.systems/lister-endroit.php", true);
        requette.send();
        requette.onreadystatechange = function(){
            if(requette.readyState == 4 && requette.status == 200){
                console.log(requette.responseText);
                let liste = requette.responseText;

                for(let i in liste){
                    this.listeEndroit[i].titre = liste[i].titre;

                    console.log('titre endroit de EndroitDAO : ' + this.listeEndroit[i].titre);
                }
            }
        }

        /*for(let i in this.listeEndroit){
            let endroit = new Endroit(this.listeEndroit[i].titre,
                this.listeEndroit[i].image,
                this.listeEndroit[i].id);

            this.listeEndroit[endroit.id] = endroit;

            console.log('titre endroit de EndroitDAO : ' + this.listeEndroit[i].titre);
        }*/
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