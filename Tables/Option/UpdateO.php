<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Code_Option = $_POST['Code_Option'];
    $optionName = $_POST['optionName'];
    $departement = $_POST['codeDep'];
    $optionAraB = $_POST['optionAraB'];

    // Exécuter la requête de mise à jour
    $query = "UPDATE options 
              SET Option_Name = '$optionName', Departement = '$departement', Option_AraB = '$optionAraB' 
              WHERE Code_Option = $Code_Option";

    if ($connection->query($query) === TRUE) {
        echo "Option mise à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de l'option : " . $connection->error;
    }
} else {
    echo "Méthode non autorisée.";
}
?>
