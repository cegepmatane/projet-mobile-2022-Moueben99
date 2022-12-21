class MembreDAO {

    ajouter(membre){
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

        console.log("ajouter");
        requette.open('POST', "http://services.mayal.systems/ajouter-membre.php");
        requette.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        requette.send(`pseudo=${encodeURIComponent(membre.pseudo)}&mdp=${encodeURIComponent(membre.mdp)}&courriel=${encodeURIComponent(membre.courriel)}&nom=${encodeURIComponent(membre.nom)}`)
    }

    connecter(membre){
        let requette = new XMLHttpRequest();

        if(!requette) {
            return null;
        }
        requette.onreadystatechange = function(){

            if (requette.readyState === XMLHttpRequest.DONE) {
                if(requette.status === 200){
                    alert(requette.responseText);

                    let verfier = JSON.parse(requette.responseText);

                    if(verfier.membre == true)
                        localStorage.setItem('connecter', 'true');
                    else 
                        localStorage.setItem('connecter', 'false');

                    console.log(localStorage.getItem('connecter'));
                }
                else {
                    alert(requette.responseText);
                    return null;
                }
            }
        }

        requette.open('POST', "http://services.mayal.systems/connexion-membre.php");
        requette.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        requette.send(`pseudo=${encodeURIComponent(membre.pseudo)}&mdp=${encodeURIComponent(membre.mdp)}`)
    }
}