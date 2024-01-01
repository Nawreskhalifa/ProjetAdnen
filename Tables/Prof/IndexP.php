<?php
include '../Etudiant/config.php';

// Retrieve data from the "prof" table
$query = "SELECT * FROM prof";
$result = $connection->query($query);
?>

<!-- HTML to display the list of professors -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des professeurs</title>
</head>
<body>
    <h2>Liste des professeurs</h2>
    <table border="1">
        <tr>
            <th>Matricule Prof</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>CIN ou Passeport</th>
            <th>Identifiant CNRPS</th>
            <th>Date de naissance</th>
            <th>Nationalité</th>
            <th>Sexe (M/F)</th>
            <th>Date Ent Adm</th>
            <th>Date Ent Etbs</th>
            <th>Diplôme</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code postal</th>
            <th>N° Téléphone</th>
            <th>Grade</th>
            <th>Date de nomination dans le grade</th>
            <th>Date de titularisation</th>
            <th>N° Poste</th>
            <th>Département</th>
            <th>Situation</th>
            <th>Spécialité</th>
            <th>N° de Compte</th>
            <th>Banque</th>
            <th>Agence</th>
            <th>Adr pendant les vacances</th>
            <th>Tél pendant les vacances</th>
            <th>Lieu de naissance</th>
            <th>Début du Contrat</th>
            <th>Fin du Contrat</th>
            <th>Type de Contrat</th>
            <th>NB contrat ISETSOUSSE</th>
            <th>NB contrat Autre Etb</th>
            <th>Bureau</th>
            <th>Email</th>
            <th>Email Interne</th>
            <th>NomArabe</th>
            <th>PrenomArabe</th>
            <th>LieuNaisArabe</th>
            <th>AdresseArabe</th>
            <th>VilleArabe</th>
            <th>Disponible</th>
            <th>SousSP</th>
            <th>EtbOrigine</th>
            <th>TypeEnsg</th>
            <th>ControlAcces</th>

        </tr>
        <?php
        // Display each row in the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['MatProf'] . "</td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['Prénom'] . "</td>";
            echo "<td>" . $row['CIN_ou_Passeport'] . "</td>";
            echo "<td>" . $row['Identifiant_CNRPS'] . "</td>";
            echo "<td>" . $row['Date_de_naissance'] . "</td>";
            echo "<td>" . $row['Nationalité'] . "</td>";
            echo "<td>" . $row['Sexe'] . "</td>";
            echo "<td>" . $row['Date_Ent_Adm'] . "</td>";
            echo "<td>" . $row['Date_Ent_Etbs'] . "</td>";
            echo "<td>" . $row['Diplôme'] . "</td>";
            echo "<td>" . $row['Adresse'] . "</td>";
            echo "<td>" . $row['Ville'] . "</td>";
            echo "<td>" . $row['Code_postal'] . "</td>";
            echo "<td>" . $row['N_Téléphone'] . "</td>";
            echo "<td>" . $row['Grade'] . "</td>";
            echo "<td>" . $row['Date_de_nomination_dans_le_grade'] . "</td>";
            echo "<td>" . $row['Date_de_titularisation'] . "</td>";
            echo "<td>" . $row['N_Poste'] . "</td>";
            echo "<td>" . $row['Département'] . "</td>";
            echo "<td>" . $row['Situation'] . "</td>";
            echo "<td>" . $row['Spécialité'] . "</td>";
            echo "<td>" . $row['N_de_Compte'] . "</td>";
            echo "<td>" . $row['Banque'] . "</td>";
            echo "<td>" . $row['Agence'] . "</td>";
            echo "<td>" . $row['Adr_pendant_les_vacances'] . "</td>";
            echo "<td>" . $row['Tél_pendant_les_vacances'] . "</td>";
            echo "<td>" . $row['Lieu_de_naissance'] . "</td>";
            echo "<td>" . $row['Début_du_Contrat'] . "</td>";
            echo "<td>" . $row['Fin_du_Contrat'] . "</td>";
            echo "<td>" . $row['Type_de_Contrat'] . "</td>";
            echo "<td>" . $row['NB_contrat_ISETSOUSSE'] . "</td>";
            echo "<td>" . $row['NB_contrat_Autre_Etb'] . "</td>";
            echo "<td>" . $row['Bureau'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Email_Interne'] . "</td>";
            echo "<td>" . $row['NomArabe'] . "</td>";
            echo "<td>" . $row['PrenomArabe'] . "</td>";
            echo "<td>" . $row['LieuNaisArabe'] . "</td>";
            echo "<td>" . $row['AdresseArabe'] . "</td>";
            echo "<td>" . $row['VilleArabe'] . "</td>";
            echo "<td>" . $row['Disponible'] . "</td>";
            echo "<td>" . $row['SousSP'] . "</td>";
            echo "<td>" . $row['EtbOrigine'] . "</td>";
            echo "<td>" . $row['TypeEnsg'] . "</td>";
            echo "<td>" . $row['ControlAcces'] . "</td>";
            echo "<td>";
            echo "<a href='EditP.php?MatProf=" . $row['MatProf'] . "'>Modifier</a> | ";
            echo "<a href='DeleteP.php?MatProf=" . $row['MatProf'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet enregistrement ?\")'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
