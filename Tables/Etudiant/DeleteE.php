<?php
include('config.php');

if (isset($_GET['NCIN'])) {
    $NCIN = $_GET['NCIN'];

    // Supprimer l'étudiant de la base de données
    $query = "DELETE FROM etudiant WHERE NCIN = '$NCIN'";

    if (mysqli_query($connection, $query)) {
        header("Location: IndexE.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'étudiant : " . mysqli_error($connection);
        exit();
    }
} else {
    echo "Aucun identifiant d'étudiant fourni.";
    exit();
}
?>
