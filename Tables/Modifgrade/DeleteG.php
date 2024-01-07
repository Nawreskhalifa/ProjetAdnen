<!-- delete.php -->

<?php
include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['NGmodif'])) {
    // Retrieve NGmodif from the URL
    $NGmodif = $_GET['NGmodif'];

    // Prepare SQL query for deletion
    $sql = "DELETE FROM modifgrade WHERE NGmodif = :NGmodif";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':NGmodif', $NGmodif, PDO::PARAM_INT);

    // Execute the query
    try {
        $stmt->execute();
        header('Location: IndexG.php');
        exit();
    } catch (PDOException $e) {
        // Handle query execution errors
        die("Erreur de suppression dans la base de données: " . $e->getMessage());
    }
} else {
    // If NGmodif is not provided in the URL, redirect to the index page
    header('Location: IndexG.php');
    exit();
}
?>
