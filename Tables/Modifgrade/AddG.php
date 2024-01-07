<?php
// create.php

include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve values from the form
    $NGmodif = $_POST['NGmodif'];
    $Grade = $_POST['Grade'];
    $DateNomin = $_POST['DateNomin'];
    $MatProf = $_POST['MatProf'];

    // Prepare the SQL query
    $sql = "INSERT INTO modifgrade (NGmodif, Grade, DateNomin, MatProf)
            VALUES (:NGmodif, :Grade, :DateNomin, :MatProf)";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':NGmodif', $NGmodif, PDO::PARAM_INT);
    $stmt->bindParam(':Grade', $Grade, PDO::PARAM_STR);
    $stmt->bindParam(':DateNomin', $DateNomin, PDO::PARAM_STR);
    $stmt->bindParam(':MatProf', $MatProf, PDO::PARAM_STR);

    // Execute the query
    try {
        $stmt->execute();
        header('Location: IndexG.php');
        exit();
    } catch (PDOException $e) {
        // Handle query execution errors
        die("Erreur d'insertion dans la base de données: " . $e->getMessage());
    }
}

// Fetch available options for Grade and MatProf
$gradeOptions = fetchOptions($pdo, "grades", "Grade");
$profOptions = fetchOptions($pdo, "prof", "MatProf");

// Function to fetch options from a table
function fetchOptions($pdo, $tableName, $columnName)
{
    $options = [];

    $query = "SELECT $columnName FROM $tableName";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options[] = $row[$columnName];
    }

    return $options;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Modification Grade</title>
</head>
<body>
    <h2>Add Modification Grade</h2>

    <form method="post" action="AddG.php">
        <label for="NGmodif">NGmodif:</label>
        <input type="text" name="NGmodif" required>
        <br>

        <label for="Grade">Grade:</label>
        <select name="Grade" required>
            <?php
            foreach ($gradeOptions as $grade) {
                echo "<option value='$grade'>$grade</option>";
            }
            ?>
        </select>
        <br>

        <label for="DateNomin">DateNomin:</label>
        <input type="datetime-local" name="DateNomin" required>
        <br>

        <label for="MatProf">MatProf:</label>
        <select name="MatProf" required>
            <?php
            foreach ($profOptions as $prof) {
                echo "<option value='$prof'>$prof</option>";
            }
            ?>
        </select>
        <br>

        <input type="submit" name="submit" value="Add Modification Grade">
    </form>
</body>
</html>
