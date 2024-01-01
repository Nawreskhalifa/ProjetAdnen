<?php
include('config.php');
$sql = "SELECT CodClasse, CodClasse FROM Classe";
$result = $connection->query($sql);
if ($result) {
   $all_classes = $result;
}
// Récupérer les données des gouvernorats pour la liste déroulante
$gouvernoratsQuery = "SELECT Gouvernorat, codpostal FROM gouvernorats";
$resultGouvernorats = $connection->query($gouvernoratsQuery);

if (!$resultGouvernorats) {
    die("Erreur lors de la récupération des gouvernorats: " . $connection->error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prénom'];
    $dateNais = $_POST['DateNais'];
    $ncin = $_POST['NCIN'];
    $nce = $_POST['NCE'];
    $typBac = $_POST['TypBac'];
    $sexe = $_POST['Sexe'];
    $lieuNais = $_POST['LieuNais'];
    $adresse = $_POST['Adresse'];
    $ville = $_POST['Ville'];
    $codePostal = $_POST['CodePostal'];
    $nTel = $_POST['N_Tel'];
    $decisionConseil = $_POST['DecisionConseil'];
    $anneeUniversitaire = $_POST['AnneeUniversitaire'];
    $semestre = $_POST['Semestre'];
    $dispenser = isset($_POST['Dispenser']) ? 1 : 0;
    $anneesOpt = $_POST['AnneesOpt'];
    $datePremiereInscp = $_POST['DatePremiereInscp'];
    $gouvernorat = $_POST['Gouvernorat'];
    $mentionBac = $_POST['MentionBac'];
    $nationalite = $_POST['Nationalite'];
    $codeCNSS = $_POST['CodeCNSS'];
    $nomArabe = $_POST['NomArabe'];
    $prenomArabe = $_POST['PrenomArabe'];
    $lieuNaisArabe = $_POST['LieuNaisArabe'];
    $adresseArabe = $_POST['AdresseArabe'];
    $villeArabe = $_POST['VilleArabe'];
    $gouvernoratArabe = $_POST['GouvernoratArabe'];
    $typeBacAB = $_POST['TypeBacAB'];
    $photo = $_POST['Photo'];
    $origine = $_POST['Origine'];
    $situationDpart = $_POST['SituationDpart'];
    $nBAC = $_POST['NBAC'];
    $redaut = $_POST['Redaut'];
    $codClasse = $_POST['CodClasse'];

    // Insérer les données dans la base de données
    $query = "INSERT INTO etudiant (Nom, Prénom, DateNais, NCIN, NCE, TypBac, Sexe, LieuNais, Adresse, 
    Ville, CodePostal, N_Tel, DecisionConseil, AnneeUniversitaire, Semestre, Dispenser, AnneesOpt,
     DatePremiereInscp, Gouvernorat, MentionBac, Nationalite, CodeCNSS, NomArabe, PrenomArabe, 
     LieuNaisArabe, AdresseArabe, VilleArabe, GouvernoratArabe, TypeBacAB, Photo, Origine, SituationDpart, NBAC, Redaut, CodClasse) 
              VALUES ('$nom', '$prenom', '$dateNais', '$ncin', '$nce', '$typBac', '$sexe', '$lieuNais',
               '$adresse', '$ville', '$codePostal', '$nTel', '$decisionConseil', '$anneeUniversitaire', 
               '$semestre', '$dispenser', '$anneesOpt', '$datePremiereInscp', '$gouvernorat', 
               '$mentionBac', '$nationalite', '$codeCNSS', '$nomArabe', '$prenomArabe', 
               '$lieuNaisArabe', '$adresseArabe', '$villeArabe', '$gouvernoratArabe', 
              '$typeBacAB', '$photo', '$origine', '$situationDpart', '$nBAC', '$redaut', '$codClasse')";

    if (mysqli_query($connection, $query)) {
        header("Location: IndexE.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'étudiant : " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
</head>
<body>

<h2>Ajouter un étudiant</h2>
<p class="erreur_message">
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

        </p>

<form method="post" action="AddE.php">
    <!-- Ajoutez les champs du formulaire ici -->
    <label for="Nom">Nom:</label>
    <input type="text" name="Nom" required>
    <br>
    <label for="Prénom">Prénom:</label>
    <input type="text" name="Prénom" required>
    <br>
    <label for="DateNais">Date de Naissance:</label>
    <input type="datetime-local" name="DateNais" required>
    <br>
    <label for="NCIN">NCIN:</label>
    <input type="text" name="NCIN" required>
    <br>
    <label for="NCE">NCE:</label>
    <input type="text" name="NCE" required>
    <br>
    <label for="TypBac">Type de Bac:</label>
    <input type="text" name="TypBac">
    <br>
    <label for="Sexe">Sexe (0 pour Femme, 1 pour Homme):</label>
    <input type="number" name="Sexe" min="0" max="1">
    <br>
    <label for="LieuNais">Lieu de Naissance:</label>
    <input type="text" name="LieuNais">
    <br>
    <label for="Adresse">Adresse:</label>
    <input type="text" name="Adresse">
    <br>
    <label for="Ville">Ville:</label>
    <input type="text" name="Ville">
    <br>
    <label for="CodePostal">Code Postal:</label>
    <input type="text" name="CodePostal">
    <br>
    <label for="N_Tel">Numéro de Téléphone:</label>
    <input type="text" name="N_Tel">
    <br>
    <label for="DecisionConseil">Décision du Conseil:</label>
    <input type="text" name="DecisionConseil">
    <br>
    <label for="AnneeUniversitaire">Année Universitaire:</label>
    <input type="text" name="AnneeUniversitaire">
    <br>
    <label for="Semestre">Semestre:</label>
    <input type="number" name="Semestre" min="1" max="2">
    <br>
    <label for="Dispenser">Dispensé (1 pour Oui, 0 pour Non):</label>
    <input type="number" name="Dispenser" min="0" max="1">
    <br>
    <label for="AnneesOpt">Années d'Optimisation:</label>
    <input type="datetime-local" name="AnneesOpt">
    <br>
    <label for="DatePremiereInscp">Date de Première Inscription:</label>
    <input type="datetime-local" name="DatePremiereInscp">
    <br>
    <<label for="Gouvernorat">Gouvernorat:</label>
<select name="Gouvernorat">
    <?php 
        $gouvernoratsQuery = "SELECT Gouvernorat, codpostal FROM gouvernorats";
        $resultGouvernorats = $connection->query($gouvernoratsQuery);

        while ($row = $resultGouvernorats->fetch_assoc()) {
            echo "<option value='{$row["Gouvernorat"]}'>{$row["Gouvernorat"]} - {$row["codpostal"]}</option>";
        }

        $resultGouvernorats->free_result();
    ?>
</select>
    <br>
    <label for="MentionBac">Mention au Bac:</label>
    <input type="text" name="MentionBac">
    <br>
    <label for="Nationalite">Nationalité:</label>
    <input type="text" name="Nationalite">
    <br>
    <label for="CodeCNSS">Code CNSS:</label>
    <input type="text" name="CodeCNSS">
    <br>
    <label for="NomArabe">Nom en Arabe:</label>
    <input type="text" name="NomArabe">
    <br>
    <label for="PrenomArabe">Prénom en Arabe:</label>
    <input type="text" name="PrenomArabe">
    <br>
    <label for="LieuNaisArabe">Lieu de Naissance en Arabe:</label>
    <input type="text" name="LieuNaisArabe">
    <br>
    <label for="AdresseArabe">Adresse en Arabe:</label>
    <input type="text" name="AdresseArabe">
    <br>
    <label for="VilleArabe">Ville en Arabe:</label>
    <input type="text" name="VilleArabe">
    <br>
    <label for="GouvernoratArabe">Gouvernorat en Arabe:</label>
    <input type="text" name="GouvernoratArabe">
    <br>
    <label for="TypeBacAB">Type de Bac AB:</label>
    <input type="text" name="TypeBacAB">
    <br>
    <label for="Photo">Photo:</label>
    <input type="text" name="Photo">
    <br>
    <label for="Origine">Origine:</label>
    <input type="text" name="Origine">
    <br>
    <label for="SituationDpart">Situation Départ:</label>
    <input type="text" name="SituationDpart">
    <br>
    <label for="NBAC">Numéro du Bac:</label>
    <input type="text" name="NBAC">
    <br>
    <label for="Redaut">Réduit:</label>
    <input type="number" name="Redaut" min="0" max="1">
    <br>
    <label for="CodClasse">Code de la Classe:</label>
<select name="CodClasse">
    <?php 
        while ($classe = mysqli_fetch_array($all_classes, MYSQLI_ASSOC)) {
            echo "<option value='{$classe["CodClasse"]}'>{$classe["CodClasse"]}</option>";
        }
    ?>
</select>

    <br>
    <input type="submit" value="Ajouter">
</form>



<a href="IndexC.php">Retour à la liste des étudiants</a>

</body>
</html>
