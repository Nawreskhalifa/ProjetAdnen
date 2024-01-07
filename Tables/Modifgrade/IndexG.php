<?php
// index.php

include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Handle search form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchTerm'])) {
    $searchAttribute = $_POST['searchAttribute'];
    $searchTerm = $_POST['searchTerm'];

    // Construct the SQL query for searching
    $sql = "SELECT * FROM modifgrade WHERE $searchAttribute LIKE :searchTerm";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
} else {
    // Fetch all records from the modifgrade table
    $sql = "SELECT * FROM modifgrade";
    $stmt = $pdo->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Grade</title>
</head>
<body>
    <h2>Modification Grade</h2>
    <form method="post" action="IndexG.php">
        <label for="searchAttribute">Recherche par :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="NGmodif">NGmodif</option>
            <option value="Grade">Grade</option>
            <option value="DateNomin">DateNomin</option>
            <option value="MatProf">MatProf</option>
        </select>

        <label for="searchTerm">Recherche :</label>
        <input type="text" name="searchTerm" id="searchTerm" placeholder="Terme de recherche">

        <input type="submit" value="Rechercher">
    </form>
    <table border="1">
        <tr>
            <th>NGmodif</th>
            <th>Grade</th>
            <th>DateNomin</th>
            <th>MatProf</th>
            <th>Action</th>
        </tr>

        <?php
          if ($stmt->execute() && $stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['NGmodif'] . "</td>";
                echo "<td>" . $row['Grade'] . "</td>";
                echo "<td>" . $row['DateNomin'] . "</td>";
                echo "<td>" . $row['MatProf'] . "</td>";
                echo "<td>
                        <a href='EditG.php?NGmodif=" . $row['NGmodif'] . "'>Edit</a>
                        <a href='DeleteG.php?NGmodif=" . $row['NGmodif'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucune modification de grade trouvée.</td></tr>";
        }
        ?>
    </table>

    <br>

    <a href="AddG.php">Add Modification Grade</a>
</body>
</html>
