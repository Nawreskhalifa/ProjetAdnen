<?php
include '../Etudiant/config.php';

if (isset($_GET['CodeDep'])) {
    $CodeDep = $_GET['CodeDep'];

    try {
        // Démarrez la transaction
        $connection->begin_transaction();

        // Supprimer les enregistrements liés dans la table prof
        $deleteProfQuery = "DELETE FROM prof WHERE CodeDep = $CodeDep";
        $connection->query($deleteProfQuery);

        // Ensuite, supprimer le département
        $deleteDepartementQuery = "DELETE FROM departements WHERE CodeDep = $CodeDep";
        $connection->query($deleteDepartementQuery);

        // Validez la transaction
        $connection->commit();

        echo "Département et enregistrements liés dans la table prof supprimés avec succès";
    } catch (Exception $e) {
        // En cas d'erreur, annulez la transaction
        $connection->rollback();
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    echo "Identifiant du département non spécifié.";
}

?>
