<?php
include '../Etudiant/config.php'; 

// Check if the CodeProf is provided in the URL
if (isset($_GET['codeProf'])) {
    $codeProf = $_GET['codeProf'];

    // Fetch the record based on CodeProf
    $sql = "SELECT * FROM profsituation WHERE CodeProf = '$codeProf'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Fetch available grades for the selection dropdown
        $gradeQuery = "SELECT * FROM grades"; // Replace with your actual grade table name
        $gradeResult = $connection->query($gradeQuery);

          // Fetch available sessions for the session selection dropdown
          $sessionQuery = "SELECT * FROM session"; // Replace with your actual session table name
          $sessionResult = $connection->query($sessionQuery);
  
        // Display the edit form
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Prof Situation</title>
        </head>

        <body>
            <h2>Edit Prof Situation</h2>

            <form method="post" action="updata.php">
                <input type="hidden" name="codeProf" value="<?php echo $row['CodeProf']; ?>">

                <label for="session">Session:</label>
                <select name="session" required>
                    <?php
                    while ($sessionRow = $sessionResult->fetch_assoc()) {
                        $selectedSession = ($sessionRow['Numero'] == $row['Sess']) ? 'selected' : '';
                        echo "<option value='" . $sessionRow['Numero'] . "' $selectedSession>" . $sessionRow['Numero'] . "</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="situation">Situation:</label>
                <input type="text" name="situation" value="<?php echo $row['Situation']; ?>" required>
                <br>

                <label for="grade">Grade:</label>
                <select name="grade" required>
                    <?php
                    while ($gradeRow = $gradeResult->fetch_assoc()) {
                        $selected = ($gradeRow['Grade'] == $row['Grade']) ? 'selected' : '';
                        echo "<option value='" . $gradeRow['Grade'] . "' $selected>" . $gradeRow['Grade'] . "</option>";
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
        echo "Record not found.";
    }
} else {
    echo "CodeProf not provided in the URL.";
}
?>
