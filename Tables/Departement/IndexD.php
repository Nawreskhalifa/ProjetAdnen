<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire de recherche -->
    <form method="post" action="IndexD.php">
      

        <label for="searchAttribute">Chercher dans :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="CodeDep">Code Département</option>
            <option value="Departement">Département</option>
            <option value="Responsable">Responsable</option>
            <option value="DepartementARAB">DepartementARAB</option>
            <option value="MatProf">MatProf</option>
        </select>
        <label for="searchTerm">Rechercher :</label>
        <input type="text" name="searchTerm" id="searchTerm" required>
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>
<?php
include '../Etudiant/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form is submitted

    $searchTerm = $_POST['searchTerm'];
    $searchAttribute = $_POST['searchAttribute'];

    // You may want to perform additional validation on $searchTerm

    $query = "SELECT * FROM departements WHERE $searchAttribute LIKE '%$searchTerm%'";}
    else{
        $query = "SELECT * FROM departements";
    }

    try {
        $result = $connection->query($query);

        if ($result) {
            echo "<table border='1'>
                    <tr>
                        <th>CodeDep</th>
                        <th>Departement</th>
                        <th>Responsable</th>
                        <th>DepartementARAB</th>
                        <th>MatProf</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['CodeDep'] . "</td>
                        <td>" . $row['Departement'] . "</td>
                        <td>" . $row['Responsable'] . "</td>
                        <td>" . $row['DepartementARAB'] . "</td>
                        <td>" . $row['MatProf'] . "</td>
                        <td>
                            <a href='EditD.php?CodeDep=" . $row['CodeDep'] . "'>Edit</a>
                            |
                            <a href='DeleteD.php?CodeDep=" . $row['CodeDep'] . "'>Delete</a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Aucun résultat trouvé.";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la recherche : " . $e->getMessage();
    }

?>

