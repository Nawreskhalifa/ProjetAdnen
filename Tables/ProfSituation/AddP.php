<?php
include '../Etudiant/config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codeProf = $_POST['codeProf'];
    $sess = $_POST['sess'];
    $situation = $_POST['situation'];
    $grade = $_POST['grade'];

    $insertQuery = "INSERT INTO profsituation (CodeProf, Sess, Situation, Grade) 
                    VALUES ('$codeProf', '$sess', '$situation', '$grade')";

    if ($connection->query($insertQuery) === TRUE) {
        echo "Situation du professeur ajoutée avec succès!";
    } else {
        echo "Erreur: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prof Situation</title>
</head>

<body>
    <h2>Add Prof Situation</h2>

    <form method="post" action="AddP.php">
        <label for="codeProf">Code Prof:</label>
        <input type="text" name="codeProf" required>
        <br>

        <label for="sess">Session:</label>
        <select name="sess" required>
            <?php
            $sessionQuery = "SELECT * FROM session";
            $sessionResult = $connection->query($sessionQuery);

            while ($rowSession = $sessionResult->fetch_assoc()) {
                echo "<option value='" . $rowSession['Numero'] . "'>" . $rowSession['Numero'] . "</option>";
            }
            ?>
        </select>
        <br>

        <label for="situation">Situation:</label>
        <input type="text" name="situation" required>
        <br>

        <label for="grade">Grade:</label>
        <select name="grade" required>
            <?php
            $gradeQuery = "SELECT * FROM grades";
            $gradeResult = $connection->query($gradeQuery);

            while ($rowGrade = $gradeResult->fetch_assoc()) {
                echo "<option value='" . $rowGrade['Grade'] . "'>" . $rowGrade['Grade'] . "</option>";
            }
            ?>
        </select>
        <br>

        <input type="submit" value="Add Prof Situation">
    </form>
</body>

</html>
