<?php
include '../Etudiant/config.php'; // Include your database connection file

// Fetch grades from the database
$query = "SELECT * FROM Grades";
$result = mysqli_query($connection, $query);

// Check if there are any results
if(mysqli_num_rows($result) > 0) {
    echo '<table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>ChargeTP</th>
                    <th>ChargeC</th>
                    <th>ChargeTD</th>
                    <th>GradeArab</th>
                    <th>ChargeCI</th>
                    <th>ChargeTotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

    // Output data from each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$row['Grade'].'</td>
                <td>'.$row['ChargeTP'].'</td>
                <td>'.$row['ChargeC'].'</td>
                <td>'.$row['ChargeTD'].'</td>
                <td>'.$row['GradeArab'].'</td>
                <td>'.$row['ChargeCI'].'</td>
                <td>'.$row['ChargeTotal'].'</td>
                <td>
                <a href="EditG.php?grade='.$row['Grade'].'" class="btn btn-primary btn-sm">Modifier</a>
                <a href="DeleteG.php?grade='.$row['Grade'].'" class="btn btn-danger btn-sm">Supprimer</a>
            </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo 'No grades found.';
}

// Close the database connection
mysqli_close($connection);
?>
