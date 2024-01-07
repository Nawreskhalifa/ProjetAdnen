<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire de recherche -->
    <form method="post" action="IndexG.php">
      

        <label for="searchAttribute">Chercher dans :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="Gouvernorat">Gouvernorat</option>
            <option value="codpostal">codpostal</option>
            
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

    $query = "SELECT * FROM gouvernorats WHERE $searchAttribute LIKE '%$searchTerm%'";}
    else{
        $query = "SELECT * FROM gouvernorats";
    }
//$query = "SELECT * FROM gouvernorats";
$result = $connection->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Gouvernorats</title>
</head>
<body>

<h2>Liste des Gouvernorats</h2>

<table >
    <tr>
        <th>Gouvernorat</th>
        <th>Code Postal</th>
    </tr>

    <?php
    // Affiche les données de la table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Gouvernorat'] . "</td>";
        echo "<td>" . $row['codpostal'] . "</td>";
        // Ajoutez une colonne pour le lien "Modifier"
        echo "<td><a href='EditG.php?Gouvernorat=" . $row['Gouvernorat'] . "'>Modifier</a></td>";
        echo "<td><a href='DeleteG.php?Gouvernorat=" . $row['Gouvernorat'] . "'>Supprimer</a></td>";

        echo "</tr>";
    }
    
    // Libère le résultat
    $result->free_result();

    // Ferme la connexion à la base de données
    $connection->close();
    ?>

</table>

</body>
</html>
