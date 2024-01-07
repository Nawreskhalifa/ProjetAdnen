<?php
// edit.php

include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les valeurs du formulaire
    $Ndossier = $_POST['Ndossier'];
    $Motif = $_POST['Motif'];
    $MatEtud = $_POST['MatEtud'];
    $TypePiece = $_POST['TypePiece'];
    $DatePiece = $_POST['DatePiece'];
    $Session = $_POST['Session'];
    $nomfichierpiece = $_POST['nomfichierpiece'];

    // Préparez la requête SQL pour la mise à jour
    $sql = "UPDATE DossierEtud
            SET Motif = :Motif,
                MatEtud = :MatEtud,
                TypePiece = :TypePiece,
                DatePiece = :DatePiece,
                Session = :Session,
                nomfichierpiece = :nomfichierpiece
            WHERE Ndossier = :Ndossier";

    $stmt = $pdo->prepare($sql);

    // Liez les paramètres
    $stmt->bindParam(':Ndossier', $Ndossier, PDO::PARAM_INT);
    $stmt->bindParam(':Motif', $Motif, PDO::PARAM_STR);
    $stmt->bindParam(':MatEtud', $MatEtud, PDO::PARAM_STR);
    $stmt->bindParam(':TypePiece', $TypePiece, PDO::PARAM_INT);
    $stmt->bindParam(':DatePiece', $DatePiece, PDO::PARAM_STR);
    $stmt->bindParam(':Session', $Session, PDO::PARAM_INT);
    $stmt->bindParam(':nomfichierpiece', $nomfichierpiece, PDO::PARAM_STR);

    // Exécutez la requête
    try {
        $stmt->execute();
        header('Location: IndexD.php');
        exit();
    } catch (PDOException $e) {
        // Gestion des erreurs d'exécution de la requête
        die("Erreur de mise à jour dans la base de données: " . $e->getMessage());
    }
} else {
    // Si la méthode HTTP n'est pas POST, récupérez l'identifiant du dossier à partir de l'URL
    if (isset($_GET['Ndossier'])) {
        $Ndossier = $_GET['Ndossier'];

        // Récupérez les données actuelles du dossier à partir de la base de données
        $query = "SELECT * FROM DossierEtud WHERE Ndossier = :Ndossier";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':Ndossier', $Ndossier, PDO::PARAM_INT);
        $stmt->execute();
        $dossier = $stmt->fetch(PDO::FETCH_ASSOC);

        // Affichez le formulaire pré-rempli avec les données actuelles du dossier
        // ...
    } else {
        // Redirigez vers la page d'index si l'identifiant du dossier n'est pas spécifié
        header('Location: IndexD.php');
        exit();
    }
}
?>

<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit DossierEtud</title>
</head>
<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit DossierEtud</title>
</head>
<body>
    <h2>Edit DossierEtud</h2>

    <form method="post" action="EditD.php">
        <!-- Other input fields for DossierEtud table -->
        <label for="Ndossier">Ndossier:</label>
        <input type="text" name="Ndossier" value="<?php echo $dossier['Ndossier']; ?>" readonly>

        <label for="Motif">Motif:</label>
        <input type="text" name="Motif" value="<?php echo $dossier['Motif']; ?>">

        <label for="MatEtud">MatEtud:</label>
        <select name="MatEtud" required>
            <?php
            // Fetch available options for MatEtud from the "etudiant" table
            $etudiantQuery = "SELECT NCIN FROM etudiant";
            $etudiantStmt = $pdo->query($etudiantQuery);

            // Display each option in the dropdown
            while ($etudiantRow = $etudiantStmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = ($etudiantRow['NCIN'] == $dossier['MatEtud']) ? 'selected' : '';
                echo "<option value='" . $etudiantRow['NCIN'] . "' $selected>" .  $etudiantRow['NCIN'] . "</option>";
            }
            ?>
        </select>

        <label for="TypePiece">TypePiece:</label>
        <input type="text" name="TypePiece" value="<?php echo $dossier['TypePiece']; ?>">

        <label for="DatePiece">DatePiece:</label>
        <input type="datetime-local" name="DatePiece" value="<?php echo date('Y-m-d\TH:i', strtotime($dossier['DatePiece'])); ?>">

        <label for="Session">Session:</label>
        <select name="Session" required>
            <?php
            // Fetch available options for Session from the "session" table
            $sessionQuery = "SELECT Numero FROM session";
            $sessionStmt = $pdo->query($sessionQuery);

            // Display each option in the dropdown
            while ($sessionRow = $sessionStmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = ($sessionRow['Numero'] == $dossier['Session']) ? 'selected' : '';
                echo "<option value='" . $sessionRow['Numero'] . "' $selected>" . $sessionRow['Numero'] . "</option>";
            }
            ?>
        </select>

        <label for="nomfichierpiece">Nom Fichier Piece:</label>
        <input type="text" name="nomfichierpiece" value="<?php echo $dossier['nomfichierpiece']; ?>">

        <input type="submit" name="submit" value="Edit DossierEtud">
    </form>
</body>
</html>
