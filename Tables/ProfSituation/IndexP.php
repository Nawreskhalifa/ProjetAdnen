<?php
include '../Etudiant/config.php'; 

// $sql = "SELECT * FROM profsituation";
// $result = $connection->query($sql);

// Search functionality
$searchQuery = "SELECT * FROM profsituation";
$searchAttribute = isset($_POST['searchAttribute']) ? $_POST['searchAttribute'] : '';
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

if (!empty($searchAttribute) && !empty($searchTerm)) {
    $searchQuery .= " WHERE $searchAttribute LIKE '%$searchTerm%'";
}

$result = $connection->query($searchQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prof Situation</title>
</head>

<form method='POST' action=''>
        <label for='searchAttribute'>Sélectionner l'attribut :</label>
        <select name='searchAttribute' id='searchAttribute'>
            <option value='CodeProf'>Code Prof</option>
            <option value='Sess'>Session</option>
            <option value='Situation'>Situation</option>
            <option value='Grade'>Grade</option>
        </select>
        <label for='searchTerm'>Terme de recherche :</label>
        <input type='text' name='searchTerm' id='searchTerm' />
        <button type='submit'>Rechercher</button>
    </form>
<body>
    <h2>Prof Situation</h2>

    <table >
        <tr>
            <th>Code Prof</th>
            <th>Session</th>
            <th>Situation</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['CodeProf'] . "</td>";
                echo "<td>" . $row['Sess'] . "</td>";
                echo "<td>" . $row['Situation'] . "</td>";
                echo "<td>" . $row['Grade'] . "</td>";
                echo "<td>
                        <a href='EditP.php?codeProf=" . $row['CodeProf'] . "'>Edit</a>
                        <a href='DeleteP.php?codeProf=" . $row['CodeProf'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucune situation de professeur trouvée.</td></tr>";
        }
        ?>
    </table>

    <br>

    <a href="AddP.php">Add Prof Situation</a>
</body>

</html>
