<?php 
require_once 'config.php';

// Récupérer les filières pour le formulaire
$filieres = $db->query('SELECT * FROM filieres')->fetchAll();

// Récupérer les étudiants avec leur filière
$etudiants = $db->query('
    SELECT etudiants.*, filieres.nom as filiere_nom 
    FROM etudiants 
    LEFT JOIN filieres ON etudiants.filiere_id = filieres.id
    ORDER BY etudiants.id DESC
')->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Etudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>

<div class="container">
    <form action="traitement.php" method="post">
        <h1>Gestion Etudiants</h1>
        
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" id="nom">
        </div>

        <div class="form-group">
            <label>Prénom :</label>
            <input type="text" name="prenom" id="prenom">
        </div>

        <div class="form-group">
            <label>Filière :</label>
            <select name="filiere_id" id="filiere">
                <option value="">-- Choisir --</option>
                <?php foreach($filieres as $f): ?>
                    <option value="<?= $f['id'] ?>"><?= $f['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des étudiants</h2>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($etudiants as $e): ?>
            <tr>
                <td><?= $e['nom'] ?></td>
                <td><?= $e['prenom'] ?></td>
                <td><?= $e['filiere_nom'] ?></td>
                <td>
                    <a href="update.php?id=<?= $e['id'] ?>" class="edit">Modifier</a>
                    <a href="delete.php?id=<?= $e['id'] ?>" class="delete" onclick="return confirm('Vraiment supprimer ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
