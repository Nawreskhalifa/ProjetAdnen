
<?php


ini_set("display_errors", "1");
error_reporting(E_ALL);

include "config.php";

//$sql = "SELECT * FROM inscriptions";


// if (isset($_GET['searchCodeClasse']) || isset($_GET['searchMatEtud'])) {
//     $sql .= " WHERE";

//     // Add conditions based on the provided search criteria
//     if (isset($_GET['searchCodeClasse'])) {
//         $searchCodeClasse = $_GET['searchCodeClasse'];
//         $sql .= " CodeClasse LIKE '%$searchCodeClasse%' AND";
//     }

//     if (isset($_GET['searchMatEtud'])) {
//         $searchMatEtud = $_GET['searchMatEtud'];
//         $sql .= " MatEtud LIKE '%$searchMatEtud%' AND";
//     }

//     if (isset($_GET['searchSession'])) {
//         $searchSession = $_GET['searchSession'];
//         $sql .= " Session LIKE '%$searchSession%' AND";
//     }

   // $sql = rtrim($sql, ' AND');
//}
   // Modify SQL query based on selected search attribute
   if (isset($_GET['searchAttribute']) && isset($_GET['searchTerm'])) {
    $searchAttribute = $_GET['searchAttribute'];
    $searchTerm = $_GET['searchTerm'];
    $sql = "SELECT * FROM inscriptions WHERE $searchAttribute LIKE '%$searchTerm%'";
} else {
    $sql = "SELECT * FROM inscriptions";
}

$result = $conn->query($sql);


?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
<form method="get" action="view.php">
        <label for="searchAttribute">Rechercher par :</label>
        <select name="searchAttribute" id="searchAttribute">
            <option value="CodClasse">Code de Classe</option>
            <option value="MatEtud">Matricule Etudiant</option>
            <option value="Session">Session Etudiant</option>
            <option value="NumIns">Num Ins</option>
            <option value="StOuv">StOuv</option>
        </select>
        <br>
        <label for="searchTerm">Terme de recherche :</label>
        <input type="text" name="searchTerm" value="<?php echo isset($_GET['searchTerm']) ? $_GET['searchTerm'] : ''; ?>">
        <br>
        <input type="submit" value="Rechercher">
    </form>


    <div class="container">

        <h2>Inscriptions</h2>

        <table class="table">

            <thead>

                <tr>

                    <th>CodeClasse</th>
                    <th>MatEtud </th>
                    <th>Session</th>
                    <th>DateInscription</th>
                    <th>DecisionConseil</th>
                    <th>Rachat</th>
                    <th>MoyGen</th>
                    <th>Dispense</th>
                    <th>TauxAbsences</th>
                    <th>Redouble</th>
                    <th>StOuv</th>
                    <th>StTech</th>
                    <th>TypeInscrip</th>
                    <th>MontantIns</th>
                    <th>NumIns</th>
                    <th>Remarque</th>
                    <th>Sitfin</th>
                    <th>Montant</th>
                    <th>NoteSO</th>
                    <th>NoteST</th>
                    <th>Actions</th>





                </tr>

            </thead>

            <tbody>

                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                ?>

                        <tr>

                            <td><?php echo $row['CodClasse']; ?></td>

                            <td><?php echo $row['MatEtud']; ?></td>

                            <td><?php echo $row['Session']; ?></td>

                            <td><?php echo $row['DateInscription']; ?></td>

                            <td><?php echo $row['DecisionConseil']; ?></td>
                            <td><?php echo $row['Rachat']; ?></td>

                            <td><?php echo $row['MoyGen']; ?></td>

                            <td><?php echo $row['Dispense']; ?></td>

                            <td><?php echo $row['Redouble']; ?></td>

                            <td><?php echo $row['StOuv']; ?></td>

                            <td><?php echo $row['StTech']; ?></td>

                            <td><?php echo $row['TypeInscrip']; ?></td>

                            <td><?php echo $row['MontantIns']; ?></td>

                            <td><?php echo $row['NumIns']; ?></td>

                            <td><?php echo $row['Remarque']; ?></td>
                            <td><?php echo $row['Sitfin']; ?></td>
                            <td><?php echo $row['Montant']; ?></td>
                            <td><?php echo $row['NoteSO']; ?></td>
                            <td><?php echo $row['NoteST']; ?></td>



                            <td><a class="btn btn-info" href="update.php?NumIns=<?php echo $row['NumIns']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?NumIns=<?php echo $row['NumIns']; ?>">Delete</a>
                            </td>

                        </tr>

                <?php       }
                }

                ?>

            </tbody>

        </table>

    </div>
    <a class="btn btn-danger" href="create.php">add inscription</a>
</body>

</html>