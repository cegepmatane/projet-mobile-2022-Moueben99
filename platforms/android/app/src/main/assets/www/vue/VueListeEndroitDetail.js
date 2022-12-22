class VueListeEndroitDetail{
    constructor(){
        this.listeEndroitDonnee = null;
    }

    initialiserListeEndroit(listeEndroitDonnee) {
        this.listeEndroitDonnee = listeEndroitDonnee;
        console.log('initialisation' + listeEndroitDonnee);
    }

    afficher(listeEndroitDonnee) {
        this.listeEndroitDonnee = listeEndroitDonnee;

        console.log("VueListeEndroit " + this.listeEndroitDonnee);

        let html = "";

        for(let numeroEndroit in this.listeEndroitDonnee){

            let titre = this.listeEndroitDonnee[numeroEndroit].titre;
            let description = this.listeEndroitDonnee[numeroEndroit].description;
            let image = this.listeEndroitDonnee[numeroEndroit].image;

            console.log('titre endroit de VueListeEndroit : ' + titre);

            html += '<h1>' + titre + '</h1>';
            html += '<p class="mt-2 mb-5">' + description + '</p>';
            html += '<div id="rotate-container">';
                html += '<div id="rotatable">';
                    html += '<img class="img-fluid" src="' + image +'"/>';
                html += '</div>';
            html += '</div>';
            html += '<div id="interaction"></div>';
        }
    
        document.getElementById("endroit").innerHTML = html;
    }
}