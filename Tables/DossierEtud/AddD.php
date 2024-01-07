<?php

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


    // Préparez la requête SQL
    $sql = "INSERT INTO DossierEtud (Ndossier, Motif, MatEtud, TypePiece, DatePiece, Session, nomfichierpiece)
            VALUES (:Ndossier, :Motif, :MatEtud, :TypePiece, :DatePiece, :Session, :nomfichierpiece)";

    $stmt = $pdo->prepare($sql);

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
        die("Erreur d'insertion dans la base de données: " . $e->getMessage());
    }
//       // Récupérer les options pour MatEtud depuis la table etudiant
//       $etudiantOptions = [];
//       $queryEtudiant = "SELECT NCIN, Nom, Prenom FROM etudiant";
//       $stmtEtudiant = $pdo->prepare($queryEtudiant);
//       $stmtEtudiant->execute();
  
//       while ($row = $stmtEtudiant->fetch(PDO::FETCH_ASSOC)) {
//           $etudiantOptions[$row['NCIN']] = $row['Nom'] . ' ' . $row['Prenom'];
//       }
 }

// Le reste du code HTML pour le formulaire d'ajout
?>

<!-- add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add DossierEtud</title>
</head>
<body>
    <h2>Add DossierEtud</h2>

    <form method="post" action="AddD.php" enctype="multipart/form-data">
        <!-- Other input fields for DossierEtud table -->
        <label for="Ndossier">Ndossier:</label>
        <input type="text" name="Ndossier" required>
        <br>

        <label for="Motif">Motif:</label>
        <input type="text" name="Motif">        <br>

        <label for="MatEtud">MatEtud:</label>
        <select name="MatEtud" required>
            <?php
            // Récupérez les NCIN de la table "etudiant"
            $etudiantQuery = "SELECT NCIN FROM etudiant";
            $etudiantStmt = $pdo->query($etudiantQuery);

            // Affichez chaque NCIN comme une option dans la liste déroulante
            while ($row = $etudiantStmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['NCIN'] . "'>" . $row['NCIN'] . "</option>";
            }
            ?>
        </select>
        <br>

        <label for="TypePiece">TypePiece:</label>
        <input type="text" name="TypePiece">
        <br>

        <label for="DatePiece">DatePiece:</label>
        <input type="datetime-local" name="DatePiece">
        <br>

        <label for="Session">Session:</label>
        <input type="text" name="Session">
        <br>

        <label for="nomfichierpiece">Nom Fichier Piece:</label>
        <input type="text" name="nomfichierpiece">
        <br>

        <input type="submit" name="submit" value="Add DossierEtud">
    </form>
</body>
</html>
