// Validation formulaire d'ajout
const formAjout = document.querySelector('form[action="traitement.php"]');
if(formAjout) {
    formAjout.addEventListener('submit', function(e) {
        let nom = document.getElementById('nom').value;
        let prenom = document.getElementById('prenom').value;
        let filiere = document.getElementById('filiere').value;
        
        if(nom === "" || prenom === "") {
            e.preventDefault();
            alert("Nom et prénom sont obligatoires !");
        } else if(filiere === "") {
            e.preventDefault();
            alert("Veuillez choisir une filière !");
        }
    });
}

// Validation formulaire de modification
const formUpdate = document.querySelector('form[method="post"]');
if(formUpdate) {
    formUpdate.addEventListener('submit', function(e) {
        let nom = document.querySelector('input[name="nom"]').value;
        let prenom = document.querySelector('input[name="prenom"]').value;
        
        if(nom === "" || prenom === "") {
            e.preventDefault();
            alert("Nom et prénom sont obligatoires !");
        }
    });
}
