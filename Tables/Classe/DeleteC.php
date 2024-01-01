<?php
include '../Etudiant/config.php';

if (isset($_GET['CodClasse'])) {
    $CodClasse = $_GET['CodClasse'];

    // Supprimer les étudiants liés à la classe
    $deleteStudentsQuery = "DELETE FROM etudiant WHERE CodClasse = ?";
    $deleteClassQuery = "DELETE FROM classe WHERE CodClasse = ?";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->beginTransaction();

        $stmt = $pdo->prepare($deleteStudentsQuery);
        $stmt->execute([$CodClasse]);

        $stmt = $pdo->prepare($deleteClassQuery);
        $stmt->execute([$CodClasse]);

        $pdo->commit();

        header("Location: IndexC.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Erreur lors de la suppression de la classe : " . $e->getMessage();
        exit();
    }
} else {
    echo "Aucun identifiant de classe fourni.";
    exit();
}
?>
