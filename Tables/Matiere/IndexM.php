<?php
include '../Etudiant/config.php';

$query = "SELECT * FROM matieres";

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
                    <td>" . $row['Code Matière'] . "</td>
                    <td>" . $row['Nom Matière'] . "</td>
                    <td>" . $row['Coef Matière'] . "</td>
                    <td>" . $row['Département'] . "</td>
                    <td>" . $row['Semestre'] . "</td>
                    <td>" . $row['Option'] . "</td>
                    <td>" . $row['Nb Heure CI'] . "</td>
                    <td>" . $row['Nb Heure TP'] . "</td>
                    <td>" . $row['TypeLabo'] . "</td>
                    <td>" . $row['Bonus'] . "</td>
                    <td>" . $row['Catègories'] . "</td>
                    <td>" . $row['SousCatégories'] . "</td>
                    <td>" . $row['DateDeb'] . "</td>
                    <td>" . $row['DateFin'] . "</td>
                    <td>
                        <a href='EditM.php?Code_Matiere=" . $row['Code Matière'] . "'>Edit</a>
                        |
                        <a href='DeleteM.php?Code_Matiere=" . $row['Code Matière'] . "'>Delete</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune matière trouvée.";
    }
} catch (Exception $e) {
    echo "Erreur lors de la lecture des matières : " . $e->getMessage();
}
?>
