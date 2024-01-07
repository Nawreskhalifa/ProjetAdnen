<?php
include '../Etudiant/config.php'; // Include your database connection file

// Initialize variables
$searchAttribute = isset($_POST['searchAttribute']) ? $_POST['searchAttribute'] : '';
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

// Fetch grades from the database based on search criteria
$query = "SELECT * FROM Grades";

// Check if search criteria is provided
if (!empty($searchTerm) && !empty($searchAttribute)) {
    $query .= " WHERE $searchAttribute LIKE '%$searchTerm%'";
}

$result = mysqli_query($connection, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo '<form method="post" action="">
            <label for="searchAttribute">Search by:</label>
            <select name="searchAttribute">
                <option value="Grade">Grade</option>
                <option value="ChargeTP">ChargeTP</option>
                <option value="ChargeC">ChargeC</option>
                <option value="ChargeTD">ChargeTD</option>
                <option value="GradeArab">GradeArab</option>
                <option value="ChargeCI">ChargeCI</option>
                <option value="ChargeTotal">ChargeTotal</option>
            </select>
            <input type="text" name="searchTerm" placeholder="Search term">
            <input type="submit" value="Search">
        </form>';

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
    while ($row = mysqli_fetch_assoc($result)) {
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
