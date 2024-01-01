<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $optionName = $_POST['optionName'];
    $departement = $_POST['codeDep'];
    $optionAraB = $_POST['optionAraB'];

    // Générer dynamiquement une nouvelle valeur pour Code_Option
    $nextCodeOptionQuery = "SELECT MAX(Code_Option) + 1 AS NextCodeOption FROM options";
    $nextCodeOptionResult = $connection->query($nextCodeOptionQuery);
    $nextCodeOptionRow = $nextCodeOptionResult->fetch_assoc();
    $nextCodeOption = $nextCodeOptionRow['NextCodeOption'];

    // Si aucune option n'existe encore, définir la première valeur à 1
    if ($nextCodeOption === null) {
        $nextCodeOption = 1;
    }

    $query = "INSERT INTO options (Code_Option, Option_Name, Departement, Option_AraB) 
              VALUES ('$nextCodeOption', '$optionName', '$departement', '$optionAraB')";

    if ($connection->query($query) === TRUE) {
        echo "Option ajoutée avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'option : " . $connection->error;
    }
}

// Récupérer la liste des départements pour le champ de sélection
$departementsQuery = "SELECT CodeDep, Departement FROM departements";
$departementsResult = $connection->query($departementsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une option</title>
</head>
<body>
    <h2>Ajouter une option</h2>
    <form method="post" action="">
        <label for="optionName">Option_Name:</label>
        <input type="text" name="optionName" required><br>

        <label for="departement">Departement:</label>
        <select name="codeDep">
            <?php
            // Afficher la liste des départements
            while ($row = $departementsResult->fetch_assoc()) {
                echo "<option value='" . $row['CodeDep'] . "'>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="optionAraB">Option_AraB:</label>
        <input type="text" name="optionAraB"><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
