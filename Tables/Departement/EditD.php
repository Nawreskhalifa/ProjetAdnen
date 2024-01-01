<?php
include '../Etudiant/config.php';

// Vérifier si l'identifiant du département est passé dans l'URL
if (isset($_GET['CodeDep'])) {
    $CodeDep = $_GET['CodeDep'];

    // Exécuter la requête pour obtenir les détails du département
    $query = "SELECT * FROM departements WHERE CodeDep = $CodeDep";

    try {
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le département</title>
</head>
<body>

    <h2>Modifier le département</h2>

    <!-- Formulaire d'édition -->
    <form method="post" action="UpdateD.php">
        <input type="hidden" name="CodeDep" value="<?php echo $row['CodeDep']; ?>">
        <label for="Departement">Département :</label>
        <input type="text" name="Departement" value="<?php echo $row['Departement']; ?>" required><br>

        <label for="Responsable">Responsable :</label>
        <input type="text" name="Responsable" value="<?php echo $row['Responsable']; ?>" required><br>

        <label for="DepartementARAB">Département en arabe :</label>
        <input type="text" name="DepartementARAB" value="<?php echo $row['DepartementARAB']; ?>" required><br>

        <label for="MatProf">Matricule du Professeur :</label>
        <input type="text" name="MatProf" value="<?php echo $row['MatProf']; ?>" required><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>

</body>
</html>

<?php
        } else {
            echo "Aucun département trouvé avec cet identifiant.";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la lecture des détails du département : " . $e->getMessage();
    }
} else {
    echo "Identifiant du département non spécifié.";
}
?>
