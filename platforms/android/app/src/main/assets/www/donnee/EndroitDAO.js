class EndroitDAO {
    constructor(){
        this.listeEndroit = [];
        this.listeEndroitDetail = [];
        this.vueListeEndroitDetail = new VueListeEndroitDetail();
    }

    lister(){
        let requette = new XMLHttpRequest();
        
        if(!requette){
            return null;
        }
        requette.open('GET', "http://51.79.70.237/serveur/lister-endroit.php", true);
        requette.send();
        requette.onreadystatechange = () => {
            if(requette.readyState == 4 && requette.status == 200){
                //console.log(requette.responseText);
                let liste = JSON.parse(requette.responseText);
                //console.log(liste);
                for(let i in liste){
                    //console.log(liste[i]);
                    console.log(this.listeEndroit);
                    this.listeEndroit[i] = liste[i];

                    console.log('titre endroit de EndroitDAO : ' + this.listeEndroit[i].titre);
                }

                this.vueListeEndroit = new VueListeEndroit();
                this.vueListeEndroit.afficher(this.listeEndroit);
            }
        }
    }

    listerDetail(id){
        let requette = new XMLHttpRequest();
        
        if(!requette){
            return null;
        }
        requette.open('GET', "http://51.79.70.237/serveur/lister-detail-endroit.php?id=" + id, true);
        requette.send();
        requette.onreadystatechange = () => {
            if(requette.readyState == 4 && requette.status == 200){

                let liste = JSON.parse(requette.responseText);

                for(let i in liste){

                    console.log(this.listeEndroitDetail);
                    this.listeEndroitDetail[i] = liste[i];

                    console.log('titre endroit de EndroitDAO : ' + this.listeEndroitDetail[i].titre);
                }

                this.vueListeEndroitDetail.afficher(this.listeEndroitDetail);
            }
        }
    }

    ajouter(endroit){
        var url = window.location.href.toString();
        let requette = new XMLHttpRequest();

        if(!requette) {
            return null;
        }
        requette.onreadystatechange = function(){

            if (requette.readyState === XMLHttpRequest.DONE) {
                if(requette.status === 200){
                    //alert(requette.responseText);
                    window.location.href = url.replace('ajouter-endroit.html', 'valider-endroit.html');
                }
                else {
                    alert(requette.responseText);
                    return null;
                }
            }
        }

        requette.open('POST', "http://51.79.70.237/serveur/ajouter-endroit.php");
        requette.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        requette.send(`titre=${encodeURIComponent(endroit.titre)}&description=${encodeURIComponent(endroit.description)}
        &musique=${encodeURIComponent(endroit.musique)}&meteo=${encodeURIComponent(endroit.meteo)}
        &heure=${encodeURIComponent(endroit.heure)}`)
    }
}