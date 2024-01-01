<?php
include '../Etudiant/config.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $gouvernoratToUpdate = $_POST['Gouvernorat'];
    $newCodPostal = $_POST['codpostal'];

    // Prépare et exécute la requête SQL de mise à jour
    $updateQuery = "UPDATE gouvernorats SET codpostal = '$newCodPostal' WHERE Gouvernorat = '$gouvernoratToUpdate'";

    if ($connection->query($updateQuery) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }
} else {
    echo "Accès non autorisé.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
