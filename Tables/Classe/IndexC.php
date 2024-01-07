<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Classe</title>
</head>
<body>

<!-- Formulaire de recherche -->
<form method="post" action="IndexC.php">
    <label for="searchAttribute">Sélectionner l'attribut :</label>
    <select name="searchAttribute" id="searchAttribute">
        <option value="CodClasse">Code Classe</option>
        <option value="IntClasse">Intitulé Classe</option>
        <option value="Departement">Département</option>
        <option value="Code_Option">Code Code_Option</option>
        <option value="Niveau">Niveau Classe</option>
        <option value="IntCalsseArabB">IntCalsseArabB</option>
        <option value="OptionAaraB">OptionAaraB </option>
        <option value="DepartementAaraB">DepartementAaraB Classe</option>
        <option value="NiveauAaraB">NiveauAaraB</option>
        <option value="CodeEtape">Code CodeEtape</option>
        <option value="CodeSalima">CodeSalima Classe</option>
        <!-- Ajoutez d'autres options en fonction de vos besoins -->
    </select>
    <label for="searchTerm">Rechercher :</label>
    <input type="text" name="searchTerm" id="searchTerm" required>
    <input type="submit" value="Rechercher">
</form>

<?php
include '../Etudiant/config.php';

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchAttribute = $_POST["searchAttribute"];
    $searchTerm = $_POST["searchTerm"];

    $query = "SELECT * FROM classe WHERE $searchAttribute LIKE '%$searchTerm%'";
} else {
    // Requête par défaut (affichage de toutes les classes)
    $query = "SELECT * FROM classe";
}

try {
    $result = $connection->query($query);

    if ($result) {
        echo "<table border='1'>
                <tr>
                    <th>CodClasse</th>
                    <th>IntClasse</th>
                    <th>Departement</th>
                    <th>Optionn</th>
                    <th>Niveau</th>
                    <th>IntCalsseArabB</th>
                    <th>OptionAaraB</th>
                    <th>DepartementAaraB</th>
                    <th>NiveauAaraB</th>
                    <th>CodeEtape</th>
                    <th>CodeSalima</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['CodClasse'] . "</td>
                    <td>" . $row['IntClasse'] . "</td>
                    <td>" . $row['Departement'] . "</td>
                    <td>" . $row['Optionn'] . "</td>
                    <td>" . $row['Niveau'] . "</td>
                    <td>" . $row['IntCalsseArabB'] . "</td>
                    <td>" . $row['OptionAaraB'] . "</td>
                    <td>" . $row['DepartementAaraB'] . "</td>
                    <td>" . $row['NiveauAaraB'] . "</td>
                    <td>" . $row['CodeEtape'] . "</td>
                    <td>" . $row['CodeSalima'] . "</td>
                    <td>
                        <a href='EditC.php?CodClasse=" . $row['CodClasse'] . "'>Edit</a>
                        |
                        <a href='DeleteC.php?CodClasse=" . $row['CodClasse'] . "'>Delete</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune classe trouvée.";
    }
} catch (Exception $e) {
    echo "Erreur lors de la lecture des classes : " . $e->getMessage();
}
?>
</body>
</html>
