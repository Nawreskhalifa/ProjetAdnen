<?php
include '../Etudiant/config.php';

if (isset($_GET['CodClasse'])) {
    $CodClasse = $_GET['CodClasse'];

    $query = "SELECT * FROM classe WHERE CodClasse = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $CodClasse);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modifier la Classe</title>
            </head>

            <body>
                <h2>Modifier la classe</h2>
                <form action="UpdateC.php" method="post">
                    <input type="hidden" name="CodClasse" value="<?php echo $row['CodClasse']; ?>">

                    <label for="IntClasse">Intitulé de la classe:</label>
                    <input type="text" name="IntClasse" value="<?php echo $row['IntClasse']; ?>" required><br>

                    <!-- Add other input fields for other columns -->
                    <label for="Departement">Département:</label>
                    <input type="text" name="Departement" value="<?php echo $row['Departement']; ?>" required><br>

                    <label for="Optionn">Option:</label>
                    <input type="text" name="Optionn" value="<?php echo $row['Optionn']; ?>" required><br>

                    <label for="Niveau">Niveau:</label>
                    <input type="text" name="Niveau" value="<?php echo $row['Niveau']; ?>" required><br>

                    <label for="IntCalsseArabB">IntCalsseArabB:</label>
                    <input type="text" name="IntCalsseArabB" value="<?php echo $row['IntCalsseArabB']; ?>" required><br>

                    <label for="OptionAaraB">OptionAaraB:</label>
                    <input type="text" name="OptionAaraB" value="<?php echo $row['OptionAaraB']; ?>" required><br>

                    <label for="DepartementAaraB">DepartementAaraB:</label>
                    <input type="text" name="DepartementAaraB" value="<?php echo $row['DepartementAaraB']; ?>" required><br>

                    <label for="NiveauAaraB">NiveauAaraB:</label>
                    <input type="text" name="NiveauAaraB" value="<?php echo $row['NiveauAaraB']; ?>" required><br>

                    <label for="CodeEtape">CodeEtape:</label>
                    <input type="text" name="CodeEtape" value="<?php echo $row['CodeEtape']; ?>" required><br>

                    <label for="CodeSalima">NiveauAaraB:</label>
                    <input type="text" name="CodeSalima" value="<?php echo $row['CodeSalima']; ?>" required><br>

                    <button type="submit" name="UpdateC">Mettre à jour la classe</button>
                </form>
            </body>

            </html>
<?php
        } else {
            echo "Aucune classe trouvée avec ce code.";
        }
    } else {
        echo "Erreur dans la requête : " . $connection->error;
    }
} else {
    // Handle error or redirect to a page where the class to update is selected
    header("Location: IndexC.php");
    exit();
}
?>
