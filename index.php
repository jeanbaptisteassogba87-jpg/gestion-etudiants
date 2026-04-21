<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Etudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>

<?php 
require_once 'config.php';

// Récupérer les filières pour le formulaire
$filieres = $db->query('SELECT * FROM filieres')->fetchAll();

// Récupérer les étudiants avec leur filière (jointure)
$sql = "SELECT e.id, e.nom, e.prenom, f.nom as filiere_nom 
        FROM etudiants e 
        LEFT JOIN filieres f ON e.filiere_id = f.id 
        ORDER BY e.id DESC";
$etudiants = $db->query($sql)->fetchAll();
?>

<div class="container">
    <!-- Formulaire d'ajout -->
    <form action="traitement.php" method="post">
        <h1>Gestion Etudiants</h1>
        
        <label>Nom :</label>
        <input type="text" name="nom"><br>

        <label>Prénom :</label>
        <input type="text" name="prenom"><br>

        <label>Filière :</label>
        <select name="filiere_id">
            <option value="">Choisir</option>
            <?php foreach($filieres as $f): ?>
                <option value="<?= $f['id'] ?>"><?= $f['nom'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Ajouter</button>
    </form>

    <!-- Tableau des étudiants -->
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
            <?php if(count($etudiants) > 0): ?>
                <?php foreach($etudiants as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e['nom']) ?></td>
                        <td><?= htmlspecialchars($e['prenom']) ?></td>
                        <td><?= htmlspecialchars($e['filiere_nom'] ?? 'Non assigné') ?></td>
                        <td>
                            <a href="update.php?id=<?= $e['id'] ?>" class="edit">Modifier</a>
                            <a href="delete.php?id=<?= $e['id'] ?>" class="delete" onclick="return confirm('Supprimer ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center">Aucun étudiant</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
