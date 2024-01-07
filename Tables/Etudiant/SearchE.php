<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'étudiants</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h3>Liste d'étudiants</h3>

    <!-- Formulaire de recherche -->
   

    <?php
    require('config.php');

    // Traitement du formulaire de recherche
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $searchTerm = $_POST['searchTerm'];

        // Exécutez la requête de recherche
        $query = "SELECT e.*, c.*, g.* FROM etudiant AS e 
        JOIN classe AS c ON e.CodClasse = c.CodClasse
        JOIN gouvernorats AS g ON e.Gouvernorat = g.Gouvernorat
        WHERE e.Nom LIKE '%$searchTerm%'
           OR e.Prénom LIKE '%$searchTerm%'
           OR e.NCIN LIKE '%$searchTerm%'
           OR e.NCE LIKE '%$searchTerm%'
           OR e.LieuNais LIKE '%$searchTerm%'
           OR e.Ville LIKE '%$searchTerm%'
           OR e.CodClasse LIKE '%$searchTerm%'
           OR e.AnneeUniversitaire LIKE '%$searchTerm%'
           OR e.Gouvernorat LIKE '%$searchTerm%'
           OR e.Nationalite LIKE '%$searchTerm%'
           OR e.CodeCNSS LIKE '%$searchTerm%'
           OR e.TypeBacAB LIKE '%$searchTerm%'
           OR e.Origine LIKE '%$searchTerm%'
           OR e.Redaut LIKE '%$searchTerm%'
           OR g.codpostal LIKE '%$searchTerm%'
           OR e.SituationDpart LIKE '%$searchTerm%'";

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
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
            echo "Aucun résultat trouvé pour la recherche : '$searchTerm'.";
        }
    }

    $connection->close();
    ?>

</body>

</html>
