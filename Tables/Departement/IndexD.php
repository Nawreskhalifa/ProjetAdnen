<?php
include '../Etudiant/config.php';

$query = "SELECT * FROM departements";

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
        echo "Aucun département trouvé.";
    }
} catch (Exception $e) {
    echo "Erreur lors de la lecture des départements : " . $e->getMessage();
}
?>
