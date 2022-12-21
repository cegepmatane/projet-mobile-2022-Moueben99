class VueListeEndroit{
    constructor(){
        document.getElementById("ajouter-endroit").addEventListener("click", evenement => this.redirigerMembre(evenement));
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

    redirigerMembre(evenement) {
        evenement.preventDefault();
        var url = window.location.href.toString();

        if(window.localStorage.getItem('connecter') && localStorage.getItem('connecter') == 'true')
            window.location.href = url.replace('index.html', 'ajouter-endroit.html');
        else
            window.location.href = url.replace('index.html', 'connexion-membre.html');
    }
}