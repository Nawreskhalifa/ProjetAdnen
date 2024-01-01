<?php
include '../Etudiant/config.php';// Include your database connection file

if(isset($_POST['valider']))
{
    // Retrieve form data
    $Grade = $_POST['Grade'];
    $ChargeTP = $_POST['ChargeTP'];
    $ChargeC = $_POST['ChargeC'];
    $ChargeTD = $_POST['ChargeTD'];
    $GradeArab = $_POST['GradeArab'];
    $ChargeCI = $_POST['ChargeCI'];
    $ChargeTotal = $_POST['ChargeTotal'];

    // SQL query to insert data into the Grades table
    $req = "INSERT INTO Grades (Grade, ChargeTP, ChargeC, ChargeTD, GradeArab, ChargeCI, ChargeTotal) 
            VALUES ('$Grade', '$ChargeTP', '$ChargeC', '$ChargeTD', '$GradeArab', '$ChargeCI', '$ChargeTotal')";
    
    // Execute the query
    $res = mysqli_query($connection, $req);

    if($res) {
        // Data successfully inserted, redirect to the listing page
        header("location: IndexG.php");
        exit();
    } else {
        // Error occurred during insertion
        echo "Error: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grade</title>
    <!-- Include Bootstrap CSS here -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add Grade</h2>
    <form method="POST" action="AddG.php">
    <!-- Your form fields go here -->
    <div class="mb-3">
        <label for="Grade" class="form-label">Grade:</label>
        <input type="text" class="form-control" name="Grade" required>
    </div>
    <div class="mb-3">
        <label for="ChargeTP" class="form-label">ChargeTP:</label>
        <input type="number" class="form-control" name="ChargeTP" required>
    </div>
    <div class="mb-3">
        <label for="ChargeC" class="form-label">ChargeC:</label>
        <input type="number" class="form-control" name="ChargeC" required>
    </div>
    <div class="mb-3">
        <label for="ChargeTD" class="form-label">ChargeTD:</label>
        <input type="number" class="form-control" name="ChargeTD" required>
    </div>
    <div class="mb-3">
        <label for="GradeArab" class="form-label">GradeArab:</label>
        <input type="text" class="form-control" name="GradeArab">
    </div>
    <div class="mb-3">
        <label for="ChargeCI" class="form-label">ChargeCI:</label>
        <input type="number" class="form-control" name="ChargeCI" required>
    </div>
    <div class="mb-3">
        <label for="ChargeTotal" class="form-label">ChargeTotal:</label>
        <input type="number" class="form-control" name="ChargeTotal" required>
    </div>

    <button type="submit" class="btn btn-primary" name="valider">Submit</button>
</form>
</div>

<!-- Include Bootstrap JS and any additional scripts here -->
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
