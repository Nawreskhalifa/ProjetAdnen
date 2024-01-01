<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre MatProf est présent dans l'URL
if (isset($_GET['MatProf'])) {
    $matProfToDelete = $_GET['MatProf'];

    // Prépare et exécute la requête de suppression
    $deleteQuery = "DELETE FROM prof WHERE MatProf = '$matProfToDelete'";

    if ($connection->query($deleteQuery) === TRUE) {
        echo "Enregistrement supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'enregistrement : " . $connection->error;
    }
} else {
    echo "Paramètre MatProf non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
