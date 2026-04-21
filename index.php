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
$filieres = $db->query('SELECT * FROM filieres')->fetchAll();
?>

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

</body>
</html>
