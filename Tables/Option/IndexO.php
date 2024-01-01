<?php
include '../Etudiant/config.php';

$query = "SELECT * FROM options";

try {
    $result = $connection->query($query);

    if ($result) {
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
