// Validation du formulaire
document.addEventListener('DOMContentLoaded', function() {
    
    // Récupérer le formulaire
    const formulaire = document.querySelector('form');
    
    // Ajouter l'événement au moment de l'envoi
    formulaire.addEventListener('submit', function(event) {
        
        // Récupérer les valeurs
        let nom = document.querySelector('input[name="nom"]').value;
        let prenom = document.querySelector('input[name="prenom"]').value;
        let filiere = document.querySelector('select[name="filiere_id"]').value;
        let erreur = false;
        let message = "";
        if(nom === "") {
            erreur = true;
            message = message + "Le nom est obligatoire.\n";
        }
        if(prenom === "") {
            erreur = true;
            message = message + "Le prénom est obligatoire.\n";
        }
        
        if(filiere === "") {
            erreur = true;
            message = message + "Veuillez choisir une filière.\n";
        }

        if(erreur) {
            event.preventDefault();
            alert(message);         
        }
    });
});
