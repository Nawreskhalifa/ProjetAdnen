<!-- edit.php -->

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
        header('Location: IndexG.php');
        exit();
    } catch (PDOException $e) {
        // Handle query execution errors
        die("Erreur de mise à jour dans la base de données: " . $e->getMessage());
    }
} else {
    // If not a POST request, check if NGmodif is provided in the URL
    if (isset($_GET['NGmodif'])) {
        $NGmodif = $_GET['NGmodif'];

        // Fetch the record based on NGmodif
        $query = "SELECT * FROM modifgrade WHERE NGmodif = :NGmodif";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':NGmodif', $NGmodif, PDO::PARAM_INT);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fetch available grades for the selection dropdown
        $gradeQuery = "SELECT * FROM grades";
        $gradeResult = $pdo->query($gradeQuery);

        // Fetch available professors for the selection dropdown
        $profQuery = "SELECT * FROM prof";
        $profResult = $pdo->query($profQuery);
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Modification Grade</title>
        </head>

        <body>
            <h2>Edit Modification Grade</h2>

            <form method="post" action="EditG.php">
                <input type="hidden" name="NGmodif" value="<?php echo $record['NGmodif']; ?>">

                <label for="Grade">Grade:</label>
                <select name="Grade" required>
                    <?php
                    while ($gradeRow = $gradeResult->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($gradeRow['Grade'] == $record['Grade']) ? 'selected' : '';
                        echo "<option value='" . $gradeRow['Grade'] . "' $selected>" . $gradeRow['Grade'] . "</option>";
                    }
                    ?>
                </select>
                <br>

                <label for="DateNomin">DateNomin:</label>
                <input type="datetime-local" name="DateNomin" value="<?php echo date('Y-m-d\TH:i', strtotime($record['DateNomin'])); ?>" required>
                <br>

                <label for="MatProf">MatProf:</label>
                <select name="MatProf" required>
                    <?php
                    while ($profRow = $profResult->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($profRow['MatProf'] == $record['MatProf']) ? 'selected' : '';
                        echo "<option value='" . $profRow['MatProf'] . "' $selected>" . $profRow['MatProf'] . "</option>";
                    }
                    ?>
                </select>
                <br>

                <input type="submit" value="Update">
            </form>
        </body>

        </html>

        <?php
    } else {
        // Redirect to the index page if NGmodif is not provided in the URL
        header('Location: IndexG.php');
        exit();
    }
}
?>
