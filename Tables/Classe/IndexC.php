<?php
include '../Etudiant/config.php';

$query = "SELECT * FROM classe";

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
