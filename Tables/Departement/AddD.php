<?php
include '../Etudiant/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch data from the form
    $CodeDep = $_POST['CodeDep'];
    $Departement = $_POST['Departement'];
    $Responsable = $_POST['Responsable'];
    $DepartementARAB = $_POST['DepartementARAB'];
    $MatProf = $_POST['MatProf'];

    // Check if CodeDep already exists in the departements table
    $checkQuery = "SELECT CodeDep FROM departements WHERE CodeDep = ?";
    $stmtCheck = $connection->prepare($checkQuery);
    $stmtCheck->bind_param('s', $CodeDep);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows == 0) {
        // CodeDep doesn't exist, proceed with the insertion
        $insertQuery = "INSERT INTO departements (CodeDep, Departement, Responsable, DepartementARAB, MatProf) VALUES (?, ?, ?, ?, ?)";

        try {
            // Use prepared statement to prevent SQL injection
            $stmtInsert = $connection->prepare($insertQuery);
            $stmtInsert->bind_param('sssss', $CodeDep, $Departement, $Responsable, $DepartementARAB, $MatProf);
            $stmtInsert->execute();

            echo "Département ajouté avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du département : " . $e->getMessage();
        }
    } else {
        // CodeDep already exists in the departements table
        echo "Le Code du département existe déjà dans la table.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un département</title>
</head>

<body>
    <h2>Ajouter un département</h2>
    <form action="AddD.php" method="post">
        <label for="CodeDep">Code du département:</label>
        <input type="text" name="CodeDep" required><br>

        <label for="Departement">Nom du département:</label>
        <input type="text" name="Departement" required><br>

        <label for="Responsable">Responsable:</label>
        <input type="text" name="Responsable" required><br>

        <label for="DepartementARAB">Nom du département en arabe:</label>
        <input type="text" name="DepartementARAB" required><br>

        <label for="MatProf">Matricule du professeur responsable:</label>
   

        <select name="MatProf">
        <?php
         
         $queryProf = "SELECT MatProf FROM prof";
         $resultProf = $connection->query($queryProf);

         if ($resultProf) {
             while ($rowProf = $resultProf->fetch_assoc()) {
                 echo "<option value='" . $rowProf['MatProf'] . "'>" . $rowProf['MatProf'] . "</option>";
             }
         } else {
             echo "Erreur lors de la récupération des professeurs : " . $connection->error;
         }
         ?> 
        </select><br>
        <button type="submit">Ajouter le département</button>
    </form>
</body>

</html>
