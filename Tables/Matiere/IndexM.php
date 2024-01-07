<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="IndexM.php">
        <label for="searchAttribute">Recherche par :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="Code Matière">Code Matière</option>
            <option value="Nom Matière">Nom Matière</option>
            <option value="Coef Matière">Coefficient Matière</option>
            <option value="Departement">Département</option>
            <option value="Semestre">Semestre</option>
            <option value="Option">Option</option>
            <option value="Nb Heure CI">Nb Heure CI</option>
            <option value="Nb Heure TP">Nb Heure TP</option>
            <option value="TypeLabo">TypeLabo</option>
            <option value="Bonus">Bonus</option>
            <option value="Catégories">Catègories</option>
            <option value="SousCatégories">SousCatégories</option>
            <option value="DateDeb">DateDeb</option>
            <option value="DateFin">DateFin</option>
        </select>

        <label for="searchTerm">Recherche :</label>
        <input type="text" name="searchTerm" id="searchTerm" placeholder="Terme de recherche">

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

    $query = "SELECT * FROM matieres WHERE  `$searchAttribute` LIKE '%$searchTerm%'";}
    else{
        $query = "SELECT * FROM matieres";
    }

    try {
        $result = $connection->query($query);

    if ($result) {
        echo "<table border='1'>
                <tr>
                    <th>Code Matière</th>
                    <th>Nom Matière</th>
                    <th>Coef Matière</th>
                    <th>Département</th>
                    <th>Semestre</th>
                    <th>Option</th>
                    <th>Nb Heure CI</th>
                    <th>Nb Heure TP</th>
                    <th>TypeLabo</th>
                    <th>Bonus</th>
                    <th>Catègories</th>
                    <th>SousCatégories</th>
                    <th>DateDeb</th>
                    <th>DateFin</th>
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["Code Matière"] . "</td>
            <td>" . $row["Nom Matière"] . "</td>
            <td>" . $row["Coef Matière"] . "</td>
            <td>" . $row["Département"] . "</td>
            <td>" . $row["Semestre"] . "</td>
            <td>" . $row["Option"] . "</td>
            <td>" . $row["Nb Heure CI"] . "</td>
            <td>" . $row["Nb Heure TP"] . "</td>
            <td>" . $row["TypeLabo"] . "</td>
            <td>" . $row["Bonus"] . "</td>
            <td>" . $row["Catègories"] . "</td>
            <td>" . $row["SousCatégories"] . "</td>
            <td>" . $row["DateDeb"] . "</td>
            <td>" . $row["DateFin"] . "</td>
            <td><a href='DeleteM.php?CodeMatiere=" . $row["Code Matière"] . "'>Delete</a></td>
            <td><a href='EditM.php?CodeMatiere=" . $row["Code Matière"] . "'>Modifier</a></td>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune matière trouvée.";
    }
}  catch (Exception $e) {
    echo "Erreur lors de la recherche : " . $e->getMessage();
}
?>
