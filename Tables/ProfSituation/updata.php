<?php
include '../Etudiant/config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codeProf = $_POST['codeProf'];
    $session = $_POST['session'];
    $situation = $_POST['situation'];
    $grade = $_POST['grade'];

    // Update the record in the database
    $sql = "UPDATE profsituation SET Sess = '$session', Situation = '$situation', Grade = '$grade' WHERE CodeProf = '$codeProf'";

    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $connection->error;
    }
} else {
    echo "Invalid request method.";
}

$connection->close();
?>
