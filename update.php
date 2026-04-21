<?php
require_once 'config.php';

$id = $_GET['id'];

// Récupérer l'étudiant
$stmt = $db->prepare("SELECT * FROM etudiants WHERE id = ?");
$stmt->execute([$id]);
$etudiant = $stmt->fetch();

// Récupérer les filières
$filieres = $db->query("SELECT * FROM filieres")->fetchAll();

// Mise à jour
if($_POST) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere_id = $_POST['filiere_id'];
    
    $sql = "UPDATE etudiants SET nom = ?, prenom = ?, filiere_id = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nom, $prenom, $filiere_id, $id]);
    
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier Etudiant</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>

<div class="container">
    <form method="post">
        <h1>Modifier Etudiant</h1>
        
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" value="<?= $etudiant['nom'] ?>">
        </div>

        <div class="form-group">
            <label>Prénom :</label>
            <input type="text" name="prenom" value="<?= $etudiant['prenom'] ?>">
        </div>

        <div class="form-group">
            <label>Filière :</label>
            <select name="filiere_id">
                <?php foreach($filieres as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['filiere_id'] ? 'selected' : '' ?>>
                        <?= $f['nom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Mettre à jour</button>
        <a href="index.php" class="cancel">Annuler</a>
    </form>
</div>

</body>
</html>
