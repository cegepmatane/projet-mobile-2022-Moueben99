if(typeof navigator.geolocation == 'undefined')
alert("Géolocalisation non prise en charge.")
else 
navigator.geolocation.getCurrentPosition(autorise, refuse)

function autorise(position)
{
    var lat = position.coords.latitude
    var lon = position.coords.longitude

    alert("Permission accordée. Vous êtes ici :\n\n"
        + lat + ", " + lon +
        "\n\nCliquez sur << OK >> pour ouvrir Google Maps à votre emplacement")

    window.location.replace("https://www.google.com/maps/@"
        + lat + "," + lon + ",10z")
}

function refuse(error)
{
    var message
    
    switch (error.code) {
        case 1: message = 'Permission refusée';
        break;
        case 2: message = 'Position non disponible';
        break;
        case 3: message = 'Dépassement de délai';
        break;
        case 4: message = 'Erreur inconnue';
        break;
    }
    alert("Erreur de géolocalisation : " + message)
}