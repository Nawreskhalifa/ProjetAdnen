<?php
include '../Etudiant/config.php';// Assurez-vous que ce fichier pointe vers le bon emplacement de votre fichier de configuration.

// Sélectionnez tous les gouvernorats depuis la table
$query = "SELECT * FROM gouvernorats";
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
