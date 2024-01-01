<?php
include '../Etudiant/config.php';

// Fetch department data
$query_departements = "SELECT * FROM departements";
$result_departements = mysqli_query($connection, $query_departements);

// Check if the query was successful
if ($result_departements) {
    // Fetch department data into an array
    $all_departements = mysqli_fetch_all($result_departements, MYSQLI_ASSOC);
} else {
    // Handle the error if the query fails
    echo "Error fetching departements: " . mysqli_error($connection);
}
// Fetch option data
$query_options = "SELECT * FROM options";
$result_options = mysqli_query($connection, $query_options);

// Check if the query was successful
if ($result_options) {
    // Fetch option data into an array
    $all_options = mysqli_fetch_all($result_options, MYSQLI_ASSOC);
} else {
    // Handle the error if the query fails
    echo "Error fetching options: " . mysqli_error($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Classe</title>
</head>
<body>
    <h2>Créer une nouvelle classe</h2>
    <form action="AddC.php" method="post">
        <label for="CodClasse">Code de la classe:</label>
        <input type="text" name="CodClasse" required><br>

        <label for="IntClasse">Intitulé de la classe:</label>
        <input type="text" name="IntClasse" required><br>

      <label for="Departement">Département:</label>
<select name="CodDep">
    <?php 
        foreach ($all_departements as $Departement) {
            echo "<option value='{$Departement["CodeDep"]}'>{$Departement["CodeDep"]}</option>";
        }
    ?>
</select><br>

<label for="Optionn">Option:</label>
<select name="Code_Option">
    <?php 
        foreach ($all_options as $Option_Name) {
            echo "<option value='{$Option_Name["Code_Option"]}'>{$Option_Name["Code_Option"]}</option>";
        }
    ?>
</select><br>

        <label for="Niveau">Niveau:</label>
        <input type="text" name="Niveau"><br>
        
        <label for="IntCalsseArabB">Intitulé de la classe (Arabe):</label>
<input type="text" name="IntCalsseArabB"><br>

<label for="OptionAaraB">Option (Arabe):</label>
<input type="text" name="OptionAaraB"><br>

<label for="DepartementAaraB">Département (Arabe):</label>
<input type="text" name="DepartementAaraB"><br>

<label for="NiveauAaraB">Niveau (Arabe):</label>
<input type="text" name="NiveauAaraB"><br>

<label for="CodeEtape">Code Étape:</label>
<input type="text" name="CodeEtape"><br>

<label for="CodeSalima">Code Salima:</label>
<input type="text" name="CodeSalima"><br>



        <!-- Ajoutez les autres champs du formulaire en fonction de votre structure de base de données -->

        <button type="submit" name="AddC">Créer la classe</button>
    </form>
</body>
</html>

<?php
include '../Etudiant/config.php';

if (isset($_POST['AddC'])) {
    $CodClasse = $_POST['CodClasse'];
    $IntClasse = $_POST['IntClasse'];
    $Departement = $_POST['CodDep'];
    $Optionn = $_POST['Code_Option'];
    $Niveau = $_POST['Niveau'];
    $IntCalsseArabB = $_POST['IntCalsseArabB'];
    $OptionAaraB = $_POST['OptionAaraB'];
    $DepartementAaraB = $_POST['DepartementAaraB'];
    $NiveauAaraB = $_POST['NiveauAaraB'];
    $CodeEtape = $_POST['CodeEtape'];
    $CodeSalima = $_POST['CodeSalima'];

    // Check if the CodClasse already exists
    $check_query = "SELECT CodClasse FROM classe WHERE CodClasse = ?";
    $check_stmt = $connection->prepare($check_query);
    $check_stmt->execute([$CodClasse]);

    if ($check_stmt->fetch()) {
        echo "Error: CodClasse already exists.";
    } else {
        // Perform the insertion
        $query = "INSERT INTO classe (CodClasse, IntClasse, Departement, Optionn, Niveau, IntCalsseArabB, OptionAaraB, 
                   DepartementAaraB, NiveauAaraB, CodeEtape, CodeSalima)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $connection->prepare($query);
            $stmt->execute([$CodClasse, $IntClasse, $Departement, $Optionn, $Niveau, $IntCalsseArabB, $OptionAaraB,
                            $DepartementAaraB, $NiveauAaraB, $CodeEtape, $CodeSalima]);

            echo "La classe a été créée avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la classe : " . $e->getMessage();
        }
    }
}

?>
