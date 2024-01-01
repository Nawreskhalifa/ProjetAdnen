<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeMatiere = $_POST['codeMatiere'];
    $nomMatiere = $_POST['nomMatiere'];
    $coefMatiere = $_POST['coefMatiere'];
    $departement = $_POST['codeDep'];
    $semestre = $_POST['semestre'];
    $option = $_POST['codeOption'];
    $nbHeureCI = $_POST["nbHeureCI"];
    $nbHeureTP = $_POST["nbHeureTP"];
    $typeLabo = $_POST["typeLabo"];
    $bonus = $_POST["bonus"];
    $categories = $_POST["categories"];
    $sousCategories = $_POST["sousCategories"];
    $dateDeb = $_POST["dateDeb"];
    $dateFin = $_POST["dateFin"];

    if ($dateFin <= $dateDeb) {
        echo "Erreur : La date de fin doit être supérieure à la date de début.";
        exit; // Arrêter l'exécution du script si la vérification échoue
    }

    $query = "INSERT INTO matieres (`Code Matière`, `Nom Matière`, `Coef Matière`, `Département`, `Semestre`, `Option`, `Nb Heure CI`, `Nb Heure TP`, `TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`, `CodeDep`, `Code_Option`) 
              VALUES ('$codeMatiere', '$nomMatiere', '$coefMatiere', '$departement', '$semestre', '$option', '$nbHeureCI', '$nbHeureTP', '$typeLabo', '$bonus', '$categories', '$sousCategories', '$dateDeb', '$dateFin', '$departement', '$option')";

    if ($connection->query($query) === TRUE) {
        echo "Matière ajoutée avec succès";
    } else {
        echo "Erreur lors de l'ajout de la matière : " . $connection->error;
    }
}

// Récupérer la liste des départements pour le champ de sélection
$departementsQuery = "SELECT CodeDep, Departement FROM departements";
$departementsResult = $connection->query($departementsQuery);

// Récupérer la liste des options pour le champ de sélection
$optionsQuery = "SELECT Code_Option, Option_Name FROM options";
$optionsResult = $connection->query($optionsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une matière</title>
</head>
<body>
    <h2>Ajouter une matière</h2>
    <form method="post" action="">
        <label for="codeMatiere">Code Matière:</label>
        <input type="text" name="codeMatiere" required><br>

        <label for="nomMatiere">Nom Matière:</label>
        <input type="text" name="nomMatiere" required><br>

        <label for="coefMatiere">Coef Matière:</label>
        <input type="text" name="coefMatiere" required><br>

        <label for="codeDep">Département:</label>
        <select name="codeDep">
            <?php
            // Afficher la liste des départements
            while ($row = $departementsResult->fetch_assoc()) {
                echo "<option value='" . $row['CodeDep'] . "'>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>

        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" required><br>

        <label for="codeOption">Option:</label>
        <select name="codeOption">
            <?php
            // Afficher la liste des options
            while ($row = $optionsResult->fetch_assoc()) {
                echo "<option value='" . $row['Code_Option'] . "'>" . $row['Option_Name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="nbHeureCI">Nb Heure CI :</label>
        <input type="text" name="nbHeureCI" required><br>

        <label for="nbHeureTP">Nb Heure TP :</label>
        <input type="text" name="nbHeureTP" required><br>

        <label for="typeLabo">TypeLabo :</label>
        <input type="text" name="typeLabo" required><br>

        <label for="bonus">Bonus :</label>
        <input type="text" name="bonus" required><br>

        <label for="categories">Catégories :</label>
        <input type="text" name="categories" required><br>

        <label for="sousCategories">SousCatégories :</label>
        <input type="text" name="sousCategories" required><br>

        <label for="dateDeb">Date de début :</label>
        <input type="date" name="dateDeb" required><br>

        <label for="dateFin">Date de fin :</label>
        <input type="date" name="dateFin" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
