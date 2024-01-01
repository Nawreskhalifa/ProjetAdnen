<?php
include '../Etudiant/config.php';

// Vérifier si l'identifiant de l'option est passé dans l'URL
if (isset($_GET['Code_Option'])) {
    $Code_Option = $_GET['Code_Option'];

    // Exécuter la requête pour supprimer l'option
    $query = "DELETE FROM options WHERE Code_Option = $Code_Option";

    try {
        if ($connection->query($query) === TRUE) {
            echo "Option supprimée avec succès";
        } else {
            echo "Erreur lors de la suppression de l'option : " . $connection->error;
        }
    } catch (Exception $e) {
        echo "Erreur lors de la suppression de l'option : " . $e->getMessage();
    }
} else {
    echo "Identifiant de l'option non spécifié.";
}
?>
