<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<form method="post" action="IndexE.php">
        <label for="searchAttribute">Rechercher par :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="Nom">Nom</option>
            <option value="Prénom">Prénom</option>
            <option value="NCIN">NCIN</option>
            <option value="NCE">NCE</option>
            <option value="DateNais">DateNais</option>
            <option value="Ville">Ville</option>
            <option value="NomArabe">NomArabe</option>
            <option value="Sexe">Sexe</option>
      
        </select>

        <label for="searchTerm">Terme de recherche :</label>
        <input type="text" name="searchTerm" id="searchTerm" required>
        <input type="submit" value="Rechercher">
    </form>
</body>

</html>

<?php
require('config.php'); 

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['searchTerm'];
    $searchAttribute = $_POST['searchAttribute'];

    // Construct the query based on the selected attribute
    $query = "SELECT e.*, c.*, g.* FROM etudiant AS e 
              JOIN classe AS c ON e.CodClasse = c.CodClasse
              JOIN gouvernorats AS g ON e.Gouvernorat = g.Gouvernorat
              WHERE $searchAttribute LIKE '%$searchTerm%'";}
              else {
                // Default query to fetch all professors
                $query = "SELECT e.*, c.*, g.* FROM etudiant AS e 
                JOIN classe AS c ON e.CodClasse = c.CodClasse
                JOIN gouvernorats AS g ON e.Gouvernorat = g.Gouvernorat";
      
            }
    $result = $connection->query($query);

if ($result->num_rows > 0) {
    echo "<h3>Liste d'étudiants:</h3>";
    echo "<a href='AddE.php' class='action-btn back_btn'>Ajouter</a>";
    echo "<table border='1'><tr>
        <th>Nom</th>
        <th>DateNais</th>
        <th>NCIN</th>
        <th>NCE</th>
        <th>TypBac</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>LieuNais</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>CodePostal</th>
        <th>N°Tél</th>
        <th>CodClasse</th>
        <th>Décision du Conseil</th>
        <th>Année Unversitaire</th>
        <th>Semestre</th>
        <th>Dispenser</th>
        <th>Annees opt</th>
        <th>Première Inscp</th>
        <th>Gouvernorat</th>
        <th>Mention du Bac</th>
        <th>Nationalité</th>
        <th>Code CNSS</th>
        <th>NomArabe</th>
        <th>PrenomArabe</th>
        <th>LieuNaisArabe</th>
        <th>AdresseArabe</th>
        <th>VilleArabe</th>
        <th>GouvernoratArabe</th>
        <th>TypeBacAB</th>
        <th>Photo</th>
        <th>Origine</th>
        <th>SituationDpart</th>
        <th>NBAC</th>
        <th>Redaut</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
       echo "<tr>";
        echo "<td>" . $row["Nom"] . "</td>";
        echo "<td>" . $row["DateNais"] . "</td>";
        echo "<td>" . $row["NCIN"] . "</td>";
        echo "<td>" . $row["NCE"] . "</td>";
        echo "<td>" . $row["TypBac"] . "</td>";
        echo "<td>" . $row["Prénom"] . "</td>";
        echo "<td>" . $row["Sexe"] . "</td>";
        echo "<td>" . $row["LieuNais"] . "</td>";
        echo "<td>" . $row["Adresse"] . "</td>";
        echo "<td>" . $row["Ville"] . "</td>";
        echo "<td>" . $row["codpostal"] . "</td>";
        echo "<td>" . $row["N_Tel"] . "</td>";
        echo "<td>" . $row["CodClasse"] . "</td>";
        echo "<td>" . $row["DecisionConseil"] . "</td>";
        echo "<td>" . $row["AnneeUniversitaire"] . "</td>";
        echo "<td>" . $row["Semestre"] . "</td>";
        echo "<td>" . $row["Dispenser"] . "</td>";
        echo "<td>" . $row["AnneesOpt"] . "</td>";
        echo "<td>" . $row["DatePremiereInscp"] . "</td>";
        echo "<td>" . $row["Gouvernorat"] . "</td>";
        echo "<td>" . $row["MentionBac"] . "</td>";
        echo "<td>" . $row["Nationalite"] . "</td>";
        echo "<td>" . $row["CodeCNSS"] . "</td>";
        echo "<td>" . $row["NomArabe"] . "</td>";
        echo "<td>" . $row["PrenomArabe"] . "</td>";
        echo "<td>" . $row["LieuNaisArabe"] . "</td>";
        echo "<td>" . $row["AdresseArabe"] . "</td>";
        echo "<td>" . $row["VilleArabe"] . "</td>";
        echo "<td>" . $row["GouvernoratArabe"] . "</td>";
        echo "<td>" . $row["TypeBacAB"] . "</td>";
        echo "<td><img src='./photos/" . $row["Photo"] . "' alt='Photo' width='200' height='180'></td>";
        echo "<td>" . $row["Origine"] . "</td>";
        echo "<td>" . $row["SituationDpart"] . "</td>";
        echo "<td>" . $row["NBAC"] . "</td>";
        echo "<td>" . $row["Redaut"] . "</td>";
        echo "<td><a href='DeleteE.php?NCIN=" . $row["NCIN"] . "' class='action-btn delete-btn'>Supprimer</a>";
        echo "<a href='EditE.php?NCIN=" . $row["NCIN"] . "' class='action-btn edit-btn'>Modifier</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun étudiant trouvé";
}

$connection->close();
?>
