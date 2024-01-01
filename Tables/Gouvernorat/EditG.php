<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre Gouvernorat est présent dans l'URL
if (isset($_GET['Gouvernorat'])) {
    $gouvernoratToEdit = $_GET['Gouvernorat'];

    // Récupère les données du gouvernorat à modifier
    $editQuery = "SELECT * FROM gouvernorats WHERE Gouvernorat = '$gouvernoratToEdit'";
    $result = $connection->query($editQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Affiche le formulaire de modification avec les données existantes
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Gouvernorat</title>
        </head>
        <body>
            <h2>Modifier Gouvernorat</h2>
            <form action="Update.php" method="post">
                <!-- Ajoutez les champs du formulaire avec les valeurs existantes -->
                <!-- Utilisez $row['Gouvernorat'], $row['codpostal'], etc. pour remplir les champs -->
                <input type="hidden" name="Gouvernorat" value="<?php echo $row['Gouvernorat']; ?>">
                <label for="codpostal">Code Postal :</label>
                <input type="text" name="codpostal" value="<?php echo $row['codpostal']; ?>"><br>

                <input type="submit" value="Enregistrer les modifications">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun enregistrement trouvé avec le Gouvernorat : $gouvernoratToEdit";
    }
} else {
    echo "Paramètre Gouvernorat non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
