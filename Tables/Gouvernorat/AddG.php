<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un gouvernorat</title>
</head>
<body>

<h2>Formulaire d'ajout de gouvernorat</h2>

<form action="AddG.php" method="post">
    <label for="gouvernorat">Gouvernorat:</label>
    <input type="text" id="gouvernorat" name="gouvernorat" required><br>

    <label for="codpostal">Code Postal:</label>
    <input type="text" id="codpostal" name="codpostal" required><br>

    <input type="submit" value="Ajouter le gouvernorat">
</form>

</body>
</html>

<?php
include '../Etudiant/config.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $gouvernorat = $_POST['gouvernorat'];
    $codpostal = $_POST['codpostal'];

    // Préparer la requête d'insertion
    $insertQuery = "INSERT INTO gouvernorats (Gouvernorat, codpostal) VALUES ('$gouvernorat', $codpostal)";

    try {
        // Exécuter la requête
        if ($connection->query($insertQuery) === TRUE) {
            echo "Enregistrement ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout de l'enregistrement : " . $connection->error;
        }
    } catch (Exception $e) {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
    }
} else {
    echo "Formulaire non soumis.";
}
?>
