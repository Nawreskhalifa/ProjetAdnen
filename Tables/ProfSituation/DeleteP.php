<?php
include '../Etudiant/config.php';

// Check if the CodeProf is provided in the URL
if (isset($_GET['codeProf'])) {
    $codeProf = $_GET['codeProf'];

    // Delete the record based on CodeProf
    $sql = "DELETE FROM profsituation WHERE CodeProf = '$codeProf'";
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "CodeProf not provided in the URL.";
}

// Redirect to the view page after deleting
header("Location: IndexP.php");
exit();
?>
