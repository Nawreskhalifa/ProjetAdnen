<?php
include 'config.php';

if (isset($_GET['NCIN'])) {
    $NCIN = $_GET['NCIN'];

    $query = "SELECT * FROM etudiant WHERE NCIN = '$NCIN'";

    $result = $connection->query($query);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
?>
            <html>

            <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>

            <body>
            <div class="form">
            <a href="IndexE.php" class="back_btn"> Retour</a>
      
            <p class="erreur_message">
                <?php
                if (!empty($message)) {
                    echo $message;
                }
                ?>
            </p>
                <h2>Modifier Étudiant</h2>
<form method="post" action="update.php" enctype="multipart/form-data">
        <a href="IndexE.php" class="back_btn"> Retour</a>

                    <label for="Nom">Nom:</label>
                    <input type="text" name="Nom" value="<?php echo $row['Nom']; ?>" required><br>

                    <label for="DateNais">Date de Naissance:</label>
                    <input type='date' name='DateNais' value='<?php echo date('Y-m-d', strtotime($row["DateNais"])); ?>' required><br>
                    <label for="NCIN">NCIN:</label>
    <input type="text" name="NCIN" value="<?php echo $row['NCIN']; ?>" required><br>

    <label for="NCE">NCE:</label>
    <input type="text" name="NCE" value="<?php echo $row['NCE']; ?>" required><br>

                    <label for="TypBac">Type du Bac:</label>
                    <input type="text" name="TypBac" value="<?php echo $row['TypBac']; ?>" required><br>

                    <label for="Prénom">Prénom:</label>
                    <input type="text" name="Prénom" value="<?php echo $row['Prénom']; ?>" required><br>


                    <label for="Sexe">Sexe:</label>
                    <input type="text" name="Sexe" value="<?php echo $row['Sexe']; ?>" required><br>

                    <label for="LieuNais">Lieu de Naissance:</label>
                    <input type="text" name="LieuNais" value="<?php echo $row['LieuNais']; ?>" required><br>

                    <label for="Adresse">Adresse:</label>
                    <input type="text" name="Adresse" value="<?php echo $row['Adresse']; ?>" required><br>

                    <label for="Ville">Ville:</label>
                    <input type="text" name="Ville" value="<?php echo $row['Ville']; ?>" required><br>
<label for="CodPostal">Code Postal:</label>
<select name="CodPostal" required>
    <?php 
        $sql_codpostals = "SELECT DISTINCT codpostal FROM gouvernorats";
        $result_codpostals = $connection->query($sql_codpostals);

        if ($result_codpostals) {
            while ($codpostal = mysqli_fetch_array($result_codpostals, MYSQLI_ASSOC)) {
                $selected = ($codpostal["codpostal"] == $row["codpostal"]) ? 'selected' : '';
                echo "<option value='{$codpostal["codpostal"]}' $selected>{$codpostal["codpostal"]}</option>";
            }
        }
    ?>
</select><br>



                    <label for="N_Tel">N°Tél:</label>
                    <input type="text" name="N_Tel" value="<?php echo $row['N_Tel']; ?>" required><br>

                <label for="CodClasse">Code de Classe:</label>
                    <select name="CodClasse" required>
                        <?php 
                            $sql_classes = "SELECT CodClasse, CodClasse FROM Classe";
                            $result_classes = $connection->query($sql_classes);

                            if ($result_classes) {
                                while ($class = mysqli_fetch_array($result_classes, MYSQLI_ASSOC)) {
                                    $selected = ($class["CodClasse"] == $row["CodClasse"]) ? 'selected' : '';
                                    echo "<option value='{$class["CodClasse"]}' $selected>{$class["CodClasse"]}</option>";
                                }
                            }
                        ?>
                    </select><br>

                    <label for="DecisionConseil">Décision du Conseil:</label>
                    <input type="text" name="DecisionConseil" value="<?php echo $row['DecisionConseil']; ?>" required><br>

                    <label for="AnneeUniversitaire">Année Universitaire:</label>
                    <input type="text" name="AnneeUniversitaire" value="<?php echo $row['AnneeUniversitaire']; ?>" required><br>

                    <label for="Semestre">Semestre:</label>
                    <input type="text" name="Semestre" value="<?php echo $row['Semestre']; ?>" required><br>

                    <label for="Dispenser">Dispenser:</label>
                    <input type="text" name="Dispenser" value="<?php echo $row['Dispenser']; ?>" required><br>

                    <label for="AnneesOpt">Années Opt:</label>
                    <input type="text" name="AnneesOpt" value="<?php echo $row['AnneesOpt']; ?>" required><br>

                    <label for="DatePremiereInscp">Première Inscription:</label>
                    <input type="text" name="DatePremiereInscp" value="<?php echo $row['DatePremiereInscp']; ?>" required><br>

                <label for="Gouvernorat">Gouvernorat:</label>
                        <select name="Gouvernorat" required>
                            <?php 
                                $sql_gouvernorats = "SELECT Gouvernorat, codpostal FROM gouvernorats";
                                $result_gouvernorats = $connection->query($sql_gouvernorats);

                                if ($result_gouvernorats) {
                                    while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                                        $selected = ($gouvernorat["Gouvernorat"] == $row["Gouvernorat"]) ? 'selected' : '';
                                        echo "<option value='{$gouvernorat["Gouvernorat"]}' $selected> {$gouvernorat["Gouvernorat"]}</option>";
                                    }
                                }
                            ?>
                        </select><br>
                    <label for="MentionBac">Mention du Bac:</label>
                    <input type="text" name="MentionBac" value="<?php echo $row['MentionBac']; ?>" required><br>

                    <label for="Nationalite">Nationalité:</label>
                    <input type="text" name="Nationalite" value="<?php echo $row['Nationalite']; ?>" required><br>

                    <label for="CodeCNSS">Code CNSS:</label>
                    <input type="text" name="CodeCNSS" value="<?php echo $row['CodeCNSS']; ?>" required><br>

                    <label for="NomArabe">Nom Arabe:</label>
                    <input type="text" name="NomArabe" value="<?php echo $row['NomArabe']; ?>" required><br>

                    <label for="PrenomArabe">Prénom Arabe:</label>
                    <input type="text" name="PrenomArabe" value="<?php echo $row['PrenomArabe']; ?>" required><br>

                    <label for="LieuNaisArabe">Lieu de Naissance Arabe:</label>
                    <input type="text" name="LieuNaisArabe" value="<?php echo $row['LieuNaisArabe']; ?>" required><br>

                    <label for="AdresseArabe">Adresse Arabe:</label>
                    <input type="text" name="AdresseArabe" value="<?php echo $row['AdresseArabe']; ?>" required><br>

                    <label for="VilleArabe">Ville Arabe:</label>
                    <input type="text" name="VilleArabe" value="<?php echo $row['VilleArabe']; ?>" required><br>

                    <?php
                        $gouvMappingArabe = array(
                        'Ariana' => 'أريانة',
                        'Beja' => 'باجة',
                        'Ben Arous' => 'بن عروس',
                        'Bizerte' => 'بنزرت',
                        'Gabes' => 'قابس',
                        'Gafsa' => 'قفصة',
                        'Jendouba' => 'جندوبة',
                        'Kairouan' => 'القيروان',
                        'Kasserine' => 'القصرين',
                        'Kebili' => 'قبلي',
                        'Kef' => 'الكاف',
                        'Mahdia' => 'المهدية',
                        'Manouba' => 'منوبة',
                        'Medenine' => 'مدنين',
                        'Monastir' => 'المنستير',
                        'Nabeul' => 'نابل',
                        'Sfax' => 'صفاقس',
                        'Sidi Bouzid' => 'سيدي بوزيد',
                        'Siliana' => 'سليانة',
                        'Sousse' => 'سوسة',
                        'Tataouine' => 'تطاوين',
                        'Tozeur' => 'توزر',
                        'Tunis' => 'تونس',
                        'Zaghouan' => 'زغوان',
                        );
                        ?>

                        <label for="GouvernoratArabe">Gouvernorat Arabe:</label>
                        <select name="GouvernoratArabe" required>
                            <?php 
                                $sql_gouvernorats = "SELECT Gouvernorat, codpostal FROM gouvernorats";
                                $result_gouvernorats = $connection->query($sql_gouvernorats);

                                if ($result_gouvernorats) {
                                    while ($gouvernorat = mysqli_fetch_array($result_gouvernorats, MYSQLI_ASSOC)) {
                                        $gouvArabe = isset($gouvMappingArabe[$gouvernorat["Gouvernorat"]]) ? $gouvMappingArabe[$gouvernorat["Gouvernorat"]] : 'N/A';
                                        $selected = ($gouvArabe == $row["GouvernoratArabe"]) ? 'selected' : '';
                                        echo "<option value='{$gouvArabe}' $selected>{$gouvArabe}</option>";
                                    }
                                }
                            ?>
                        </select><br>

                    <label for="TypeBacAB">Type de Bac (Arabe):</label><label for="TypeBacAB">Type de Bac (Arabe):</label>
                    <input type="text" name="TypeBacAB" value="<?php echo $row['TypeBacAB']; ?>" required><br>

                    <label for="Origine">Origine:</label>
                    <input type="text" name="Origine" value="<?php echo $row['Origine']; ?>" required><br>

                    <label for="SituationDpart">Situation de Départ:</label>
                    <input type="text" name="SituationDpart" value="<?php echo $row['SituationDpart']; ?>" required><br>
                            <label for="SituationDpart">photo:</label>
                    <img src='./photos/<?php echo $row["Photo"]; ?>' alt='Current Photo' width='100' height='100'>
                    <input type="file" name="Photo"><br>

                    <label for="NBAC">NBAC:</label>
                    <input type="text" name="NBAC" value="<?php echo $row['NBAC']; ?>" required><br>

                    <label for="Redaut">Redoublement Autre:</label>
                    <input type="text" name="Redaut" value="<?php echo $row['Redaut']; ?>" required><br>


                    <input type="submit" name="update_etudiant" value="Mettre à jour">
</form>
            </div>
</body>

</html>
<?php
    } else {
        echo "Aucun étudiant trouvé avec ce NCIN.";
    }
} else {
    echo "Erreur dans la requête : " . $connection->error;;
}
}
?>