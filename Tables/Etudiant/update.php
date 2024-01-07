<?php
include 'config.php';

    $NCIN = $_POST['NCIN'];
    $Nom = $_POST['Nom'];
    $DateNais = $_POST['DateNais'];
    $NCE = $_POST['NCE'];
    $TypBac = $_POST['TypBac'];
    $Prénom = $_POST['Prénom'];
    $Sexe = $_POST['Sexe'];
    $LieuNais = $_POST['LieuNais'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodPostal=$_POST['CodPostal'];  
    $N_Tel = $_POST['N_Tel'];
    $CodClasse = $_POST['CodClasse'];
    $DecisionConseil = $_POST['DecisionConseil'];
    $AnneeUniversitaire = $_POST['AnneeUniversitaire'];
    $Semestre = $_POST['Semestre'];
    $Dispenser = $_POST['Dispenser'];
    $AnneesOpt = $_POST['AnneesOpt'];
    $DatePremiereInscp = $_POST['DatePremiereInscp'];
    $Gouvernorat = $_POST['Gouvernorat'];
    $MentionBac = $_POST['MentionBac'];
    $Nationalite = $_POST['Nationalite'];
    $CodeCNSS = $_POST['CodeCNSS'];
    $NomArabe = $_POST['NomArabe'];
    $PrenomArabe = $_POST['PrenomArabe'];
    $LieuNaisArabe = $_POST['LieuNaisArabe'];
    $AdresseArabe = $_POST['AdresseArabe'];
    $VilleArabe = $_POST['VilleArabe'];
    $GouvernoratArabe = $_POST['GouvernoratArabe'];
    $TypeBacAB = $_POST['TypeBacAB'];
    $Origine = $_POST['Origine'];
    $SituationDpart = $_POST['SituationDpart'];
    $NBAC = $_POST['NBAC'];
    $Redaut = $_POST['Redaut'];
$Photo = htmlspecialchars(basename($_FILES["Photo"]["name"]));
$id = $_POST["NCIN"];

$updateQuery = "UPDATE etudiant SET 
    `Nom` = '$Nom',
    `NCIN` = '$NCIN',
    `DateNais` = '$DateNais',
    NCE = '$NCE',
    TypBac = '$TypBac',
    Prénom = '$Prénom',
    Sexe = '$Sexe',
    LieuNais = '$LieuNais',
    Adresse = '$Adresse',
    Ville = '$Ville',
CodePostal = '$CodPostal',
    N_Tel = '$N_Tel',
    CodClasse = '$CodClasse',
    DecisionConseil = '$DecisionConseil',
    AnneeUniversitaire = '$AnneeUniversitaire',
    Semestre = '$Semestre',
    Dispenser = '$Dispenser',
    AnneesOpt = '$AnneesOpt',
    DatePremiereInscp = '$DatePremiereInscp',
    Gouvernorat = '$Gouvernorat',
    MentionBac = '$MentionBac',
    Nationalite = '$Nationalite',
    CodeCNSS = '$CodeCNSS',
    NomArabe = '$NomArabe',
    PrenomArabe = '$PrenomArabe',
    LieuNaisArabe = '$LieuNaisArabe',
    AdresseArabe = '$AdresseArabe',
    VilleArabe = '$VilleArabe',
    GouvernoratArabe = '$GouvernoratArabe',
    TypeBacAB = '$TypeBacAB',
    Origine = '$Origine',
    SituationDpart = '$SituationDpart',
    NBAC = '$NBAC',
    Redaut = '$Redaut',
    Photo = '$Photo'
    WHERE NCIN = '$id'";



    if ($connection->query($updateQuery) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }

    // Redirect to the index page or any other page after the update
    header("Location: IndexE.php");
    exit();

?>
