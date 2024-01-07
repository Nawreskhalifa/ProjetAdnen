<?php
include '../Etudiant/config.php';

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchAttribute = $_POST["searchAttribute"];
    $searchTerm = $_POST["searchTerm"];

    $query = "SELECT * FROM options WHERE $searchAttribute LIKE '%$searchTerm%'";
} else {
    // Requête par défaut (affichage de toutes les options)
    $query = "SELECT * FROM options";
}

try {
    $result = $connection->query($query);

    if ($result) {
        echo "<form method='POST' action=''>
                <label for='searchAttribute'>Sélectionner l'attribut :</label>
                <select name='searchAttribute' id='searchAttribute'>
                    <option value='Code_Option'>Code Option</option>
                    <option value='Option_Name'>Nom Option</option>
                    <option value='Departement'>Département</option>
                    <option value='Option_AraB'>Option Arabe</option>
                </select>
                <label for='searchTerm'>Terme de recherche :</label>
                <input type='text' name='searchTerm' id='searchTerm' />
                <button type='submit'>Rechercher</button>
            </form>";

        echo "<table border='1'>
                <tr>
                    <th>Code_Option</th>
                    <th>Option_Name</th>
                    <th>Departement</th>
                    <th>Option_AraB</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['Code_Option'] . "</td>
                    <td>" . $row['Option_Name'] . "</td>
                    <td>" . $row['Departement'] . "</td>
                    <td>" . $row['Option_AraB'] . "</td>
                    <td>
                        <a href='EditO.php?Code_Option=" . $row['Code_Option'] . "'>Edit</a>
                        |
                        <a href='DeleteO.php?Code_Option=" . $row['Code_Option'] . "'>Delete</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune option trouvée.";
    }
} catch (Exception $e) {
    echo "Erreur lors de la lecture des options : " . $e->getMessage();
}
?>
