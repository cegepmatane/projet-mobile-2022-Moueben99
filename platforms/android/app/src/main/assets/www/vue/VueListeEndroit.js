class VueListeEndroit{
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

            let id = this.listeEndroitDonnee[numeroEndroit].id;
            let titre = this.listeEndroitDonnee[numeroEndroit].titre;
            let image = this.listeEndroitDonnee[numeroEndroit].image;

            console.log('titre endroit de VueListeEndroit : ' + titre);

            html += '<a href="liste-details.html?' + id + '" style="text-decoration:none">'; 
                html += '<div class="card bg-dark my-1">';
                    html += '<div class="card-body text-white row">'
                        html += '<p  class="col-6 align-self-center lead">' + titre + '</p>';
                        html += '<img class="img-responsive col-6" src="' + image + '" alt="Exemple"></img>';
                    html += '</div>'
                html += '</div>';
            html+='</a>';
        }
    
        document.getElementById("liste-endroit").innerHTML = html;
    }
}