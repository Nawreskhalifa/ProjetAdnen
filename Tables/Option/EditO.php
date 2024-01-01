<?php
include '../Etudiant/config.php';

// Vérifier si l'identifiant de l'option est passé dans l'URL
if (isset($_GET['Code_Option'])) {
    $Code_Option = $_GET['Code_Option'];

    // Récupérer les détails de l'option
    $query = "SELECT * FROM options WHERE Code_Option = '$Code_Option'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $option = $result->fetch_assoc();
    } else {
        echo "Option non trouvée.";
        exit;
    }
} else {
    echo "Identifiant de l'option non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une option</title>
</head>
<body>
    <h2>Modifier une option</h2>
    <form method="post" action="UpdateO.php">
        <input type="hidden" name="Code_Option" value="<?php echo $option['Code_Option']; ?>">

        <label for="optionName">Option_Name:</label>
        <input type="text" name="optionName" value="<?php echo $option['Option_Name']; ?>" required><br>

        <label for="departement">Departement:</label>
        <select name="codeDep">
            <?php
            // Récupérer la liste des départements
            $departementsQuery = "SELECT CodeDep, Departement FROM departements";
            $departementsResult = $connection->query($departementsQuery);

            while ($row = $departementsResult->fetch_assoc()) {
                $selected = ($row['CodeDep'] == $option['Departement']) ? 'selected' : '';
                echo "<option value='" . $row['CodeDep'] . "' $selected>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="optionAraB">Option_AraB:</label>
        <input type="text" name="optionAraB" value="<?php echo $option['Option_AraB']; ?>"><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
