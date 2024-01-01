<?php
include '../Etudiant/config.php'; // Include your database connection file

if(isset($_GET['grade'])) {
    $gradeToDelete = $_GET['grade'];

    // Check if the grade exists
    $checkQuery = "SELECT * FROM Grades WHERE Grade = '$gradeToDelete'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if(mysqli_num_rows($checkResult) == 1) {
        // Grade exists, proceed with deletion
        $deleteQuery = "DELETE FROM Grades WHERE Grade = '$gradeToDelete'";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if($deleteResult) {
            echo '<p class="text-success">Grade deleted successfully!</p>';
        } else {
            echo '<p class="text-danger">Error deleting grade: ' . mysqli_error($connection) . '</p>';
        }
    } else {
        // Grade does not exist
        echo '<p class="text-danger">Error: Grade not found!</p>';
    }
} else {
    // Grade parameter not specified
    echo '<p class="text-danger">Error: Grade not specified!</p>';
}

// Close the database connection
mysqli_close($connection);
?>
