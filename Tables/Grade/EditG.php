<?php
include '../Etudiant/config.php';// Include your database connection file

if(isset($_GET['grade'])) {
    $gradeToUpdate = $_GET['grade'];

    // Fetch the details of the grade to be updated
    $query = "SELECT * FROM Grades WHERE Grade = '$gradeToUpdate'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Update form submission
        if(isset($_POST['modifier'])) {
            $newGrade = $_POST['Grade'];
            $newChargeTP = $_POST['ChargeTP'];
            $newChargeC = $_POST['ChargeC'];
            $newChargeTD = $_POST['ChargeTD'];
            $newGradeArab = $_POST['GradeArab'];
            $newChargeCI = $_POST['ChargeCI'];
            $newChargeTotal = $_POST['ChargeTotal'];

            // SQL query to update the grade
            $updateQuery = "UPDATE Grades 
                            SET Grade = '$newGrade', ChargeTP = '$newChargeTP', ChargeC = '$newChargeC', 
                                ChargeTD = '$newChargeTD', GradeArab = '$newGradeArab', ChargeCI = '$newChargeCI', 
                                ChargeTotal = '$newChargeTotal' 
                            WHERE Grade = '$gradeToUpdate'";
            
            // Execute the query
            $updateResult = mysqli_query($connection, $updateQuery);

            if($updateResult) {
                echo '<p class="text-success">Grade updated successfully!</p>';
            } else {
                echo '<p class="text-danger">Error updating grade: ' . mysqli_error($connection) . '</p>';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Grade</title>
    <!-- Include Bootstrap CSS here -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <h2>Modifier Grade - <?php echo $row['Grade']; ?></h2>
    <form method="POST" action="EditG.php?grade=<?php echo $gradeToUpdate; ?>">
        <div class="mb-3">
            <label for="Grade" class="form-label">Grade:</label>
            <input type="text" class="form-control" name="Grade" value="<?php echo $row['Grade']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTP" class="form-label">ChargeTP:</label>
            <input type="number" class="form-control" name="ChargeTP" value="<?php echo $row['ChargeTP']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeC" class="form-label">ChargeC:</label>
            <input type="number" class="form-control" name="ChargeC" value="<?php echo $row['ChargeC']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTD" class="form-label">ChargeTD:</label>
            <input type="number" class="form-control" name="ChargeTD" value="<?php echo $row['ChargeTD']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="GradeArab" class="form-label">GradeArab:</label>
            <input type="text" class="form-control" name="GradeArab" value="<?php echo $row['GradeArab']; ?>">
        </div>
        <div class="mb-3">
            <label for="ChargeCI" class="form-label">ChargeCI:</label>
            <input type="number" class="form-control" name="ChargeCI" value="<?php echo $row['ChargeCI']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ChargeTotal" class="form-label">ChargeTotal:</label>
            <input type="number" class="form-control" name="ChargeTotal" value="<?php echo $row['ChargeTotal']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="modifier">Submit Changes</button>
    </form>
</div>

<!-- Include Bootstrap JS and any additional scripts here -->
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
<?php
    } else {
        echo '<p class="text-danger">Error: Grade not found!</p>';
    }
} else {
    echo '<p class="text-danger">Error: Grade not specified!</p>';
}

// Close the database connection
mysqli_close($connection);
?>
