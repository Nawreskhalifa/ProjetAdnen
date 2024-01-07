<!-- update.php -->

<?php
include '../Etudiant/config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $NGmodif = $_POST['NGmodif'];
    $Grade = $_POST['Grade'];
    $DateNomin = $_POST['DateNomin'];
    $MatProf = $_POST['MatProf'];

    // Prepare SQL query for update
    $sql = "UPDATE modifgrade
            SET Grade = :Grade,
                DateNomin = :DateNomin,
                MatProf = :MatProf
            WHERE NGmodif = :NGmodif";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':NGmodif', $NGmodif, PDO::PARAM_INT);
    $stmt->bindParam(':Grade', $Grade, PDO::PARAM_STR);
    $stmt->bindParam(':DateNomin', $DateNomin, PDO::PARAM_STR);
    $stmt->bindParam(':MatProf', $MatProf, PDO::PARAM_STR);

    // Execute the query
    try {
        $stmt->execute();
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        // Handle query execution errors
        die("Erreur de mise à jour dans la base de données: " . $e->getMessage());
    }
} else {
    // If not a POST request, redirect to the index page
    header('Location: index.php');
    exit();
}
?>
