<?php
include '../Etudiant/config.php';

// Vérifier si le code de la matière est passé dans l'URL
if (isset($_GET['Code_Matiere'])) {
    $codeMatiere = $_GET['Code_Matiere'];

    // Récupérer les données de la matière à éditer
    $query = "SELECT * FROM matieres WHERE `Code Matière` = '$codeMatiere'";
    $result = $connection->query($query);

    if ($result) {
        $matiere = $result->fetch_assoc();
    } else {
        echo "Erreur lors de la récupération des données de la matière : " . $connection->error;
        exit;
    }
} else {
    echo "Code de la matière non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une matière</title>
</head>
<body>
    <h2>Modifier une matière</h2>
    <form method="post" action="updateM.php">
        <input type="hidden" name="codeMatiere" value="<?php echo $matiere['Code Matière']; ?>">

        <label for="nomMatiere">Nom Matière:</label>
        <input type="text" name="nomMatiere" value="<?php echo $matiere['Nom Matière']; ?>" required><br>

        <label for="coefMatiere">Coef Matière:</label>
        <input type="text" name="coefMatiere" value="<?php echo $matiere['Coef Matière']; ?>" required><br>

        <label for="codeDep">Département:</label>
        <select name="codeDep">
            <?php
            // Récupérer la liste des départements
            $departementsQuery = "SELECT CodeDep, Departement FROM departements";
            $departementsResult = $connection->query($departementsQuery);

            while ($row = $departementsResult->fetch_assoc()) {
                $selected = ($row['CodeDep'] == $matiere['CodeDep']) ? 'selected' : '';
                echo "<option value='" . $row['CodeDep'] . "' $selected>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" value="<?php echo $matiere['Semestre']; ?>" required><br>

        <label for="codeOption">Option:</label>
        <select name="codeOption">
            <?php
            // Récupérer la liste des options
            $optionsQuery = "SELECT Code_Option, Option_Name FROM options";
            $optionsResult = $connection->query($optionsQuery);

            while ($row = $optionsResult->fetch_assoc()) {
                $selected = ($row['Code_Option'] == $matiere['Code_Option']) ? 'selected' : '';
                echo "<option value='" . $row['Code_Option'] . "' $selected>" . $row['Option_Name'] . "</option>";
            }
            ?>
            
        </select><br>
        <label for="nbHeureCI">Nom Nb Heure CI:</label>
        <input type="text" name="nbHeureCI" value="<?php echo $matiere['Nb Heure CI']; ?>" required><br>
       
        <label for="nbHeureTP">Nb Heure TP :</label>
        <input type="text" name="nbHeureTP" value="<?php echo $matiere['Nb Heure TP']; ?>" required><br>

        <label for="typeLabo">TypeLabo :</label>
        <input type="text" name="typeLabo" value="<?php echo $matiere['TypeLabo']; ?>" required><br>

        <label for="bonus">Bonus :</label>
        <input type="text" name="bonus" value="<?php echo $matiere['Bonus']; ?>" required><br>

        <label for="categories">Catégories :</label>
        <input type="text" name="categories" value="<?php echo $matiere['Catègories']; ?>" required><br>

        <label for="sousCategories">SousCatégories :</label>
        <input type="text" name="sousCategories" value="<?php echo $matiere['SousCatégories']; ?>" required><br>

        <label for="dateDeb">Date de début :</label>
        <input type="date" name="dateDeb"  value="<?php echo $matiere['DateDeb']; ?>"required><br>

        <label for="dateFin">Date de fin :</label>
        <input type="date" name="dateFin" value="<?php echo $matiere['DateFin']; ?>"required><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
