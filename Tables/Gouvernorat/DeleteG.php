<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre Gouvernorat est présent dans l'URL
if (isset($_GET['Gouvernorat'])) {
    $gouvernoratToDelete = $_GET['Gouvernorat'];

    // Utilisez la connexion à la base de données existante
    // Ne fermez pas la connexion ici pour éviter l'erreur
    // $connection->close();

    // Préparez et exécutez la requête DELETE
    $deleteQuery = "DELETE FROM gouvernorats WHERE Gouvernorat = ?";
    $stmtDelete = $connection->prepare($deleteQuery);
    $stmtDelete->bind_param('s', $gouvernoratToDelete);

    if ($stmtDelete->execute()) {
        echo "Gouvernorat supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du gouvernorat : " . $stmtDelete->error;
    }

    // Fermez la déclaration après utilisation
    $stmtDelete->close();
} else {
    echo "Paramètre Gouvernorat non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
