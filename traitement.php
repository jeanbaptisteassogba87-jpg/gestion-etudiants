<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere_id = $_POST['filiere_id'];
    
    $sql = "INSERT INTO etudiants (nom, prenom, filiere_id) VALUES (?, ?, ?)";
    $tmt = $db->prepare($sql);
    $tmt->execute([$nom, $prenom, $filiere_id]);
    
    header('Location: index.php');
    exit();
}
?>
