<?php
// delete.php

include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifiez si l'identifiant du dossier est passé dans l'URL
if (isset($_GET['Ndossier'])) {
    $Ndossier = $_GET['Ndossier'];

    // Préparez et exécutez la requête de suppression
    $query = "DELETE FROM DossierEtud WHERE Ndossier = :Ndossier";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Ndossier', $Ndossier, PDO::PARAM_INT);

    try {
        $stmt->execute();
        header('Location: IndexD.php');
        exit();
    } catch (PDOException $e) {
        // Gestion des erreurs d'exécution de la requête
        die("Erreur de suppression dans la base de données: " . $e->getMessage());
    }
} else {
    // Redirigez vers la page principale si l'identifiant du dossier n'est pas spécifié
    header('Location: IndexD.php');
    exit();
}
?>
