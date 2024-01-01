<?php
include '../Etudiant/config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $CodeDep = $_POST['CodeDep'];
    $Departement = $_POST['Departement'];
    $Responsable = $_POST['Responsable'];
    $DepartementARAB = $_POST['DepartementARAB'];
    $MatProf = $_POST['MatProf'];

    // Exécuter la requête de mise à jour
    $query = "UPDATE departements SET Departement = '$Departement', Responsable = '$Responsable', DepartementARAB = '$DepartementARAB', MatProf = '$MatProf' WHERE CodeDep = $CodeDep";

    try {
        if ($connection->query($query) === TRUE) {
            echo "Mise à jour réussie";
        } else {
            echo "Erreur de mise à jour : " . $connection->error;
        }
    } catch (Exception $e) {
        echo "Erreur lors de la mise à jour du département : " . $e->getMessage();
    }
}
?>
