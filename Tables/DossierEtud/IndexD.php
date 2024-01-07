<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire de recherche -->
    <form method="post" action="IndexD.php">
      

        <label for="searchAttribute">Chercher dans :</label>
        <select name="searchAttribute" id="searchAttribute">
        <option value="Ndossier">Ndossier</option>
        <option value="Motif">Motif</option>
        <option value="MatEtud">MatEtud</option>
        <option value="TypePiece">TypePiece</option>
        <option value="DatePiece">DatePiece</option>
        <option value="Session">Session</option>
        <option value="nomfichierpiece">Nom Fichier Piece</option>
    </select>
        </select>
        <label for="searchTerm">Rechercher :</label>
        <input type="text" name="searchTerm" id="searchTerm" required>
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>
<?php
include '../Etudiant/config.php';

$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/// Retrieve data from DossierEtud table
$query = "SELECT * FROM DossierEtud";
$searchAttribute = isset($_POST['searchAttribute']) ? $_POST['searchAttribute'] : '';
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

if (!empty($searchTerm) && !empty($searchAttribute)) {
    $query .= " WHERE $searchAttribute LIKE :searchTerm";
}

$stmt = $pdo->prepare($query);

if (!empty($searchTerm) && !empty($searchAttribute)) {
    // Use bindValue instead of bindParam
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
}
$stmt->execute();
$dossierEtuds = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DossierEtud List</title>
</head>
<body>
    <h2>DossierEtud List</h2>

    <table>
        <tr>
            <th>Ndossier</th>
            <th>Motif</th>
            <th>MatEtud</th>
            <th>TypePiece</th>
            <th>DatePiece</th>
            <th>Session</th>
            <th>Nom Fichier Piece</th>
            <th>Action</th>
        </tr>

        <?php foreach ($dossierEtuds as $dossierEtud): ?>
            <tr>
                <td><?php echo $dossierEtud['Ndossier']; ?></td>
                <td><?php echo $dossierEtud['Motif']; ?></td>
                <td><?php echo $dossierEtud['MatEtud']; ?></td>
                <td><?php echo $dossierEtud['TypePiece']; ?></td>
                <td><?php echo $dossierEtud['DatePiece']; ?></td>
                <td><?php echo $dossierEtud['Session']; ?></td>
                <td><?php echo $dossierEtud['nomfichierpiece']; ?></td>
                <td><a href="EditD.php?Ndossier=<?php echo $dossierEtud['Ndossier']; ?>">Edit</a></td>
                <td><a href="DeleteD.php?Ndossier=<?php echo $dossierEtud['Ndossier']; ?>">DELETE</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
