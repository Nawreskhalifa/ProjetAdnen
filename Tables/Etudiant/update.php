<?php
include 'config.php';

$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['update_etudiant'])) {
    $NCIN = $_POST['NCIN'];

    $query = "UPDATE etudiant SET
    Nom = :Nom,
    DateNais = :DateNais,
    NCE = :NCE,
    TypBac = :TypBac,
    `Prénom` = :Prenom,  -- Assurez-vous d'avoir accent grave autour de Prénom
    Sexe = :Sexe,
    LieuNais = :LieuNais,
    Adresse = :Adresse,
    Ville = :Ville,
    CodePostal = :CodePostal,
    N_Tel = :N_Tel,
    CodClasse = :CodClasse,
    DecisionConseil = :DecisionConseil,
    AnneeUniversitaire = :AnneeUniversitaire,
    Semestre = :Semestre,
    Dispenser = :Dispenser,
    AnneesOpt = :AnneesOpt,
    DatePremiereInscp = :DatePremiereInscp,
    Gouvernorat = :Gouvernorat,
    MentionBac = :MentionBac,
    Nationalite = :Nationalite,
    CodeCNSS = :CodeCNSS,
    NomArabe = :NomArabe,
    PrenomArabe = :PrenomArabe,
    LieuNaisArabe = :LieuNaisArabe,
    AdresseArabe = :AdresseArabe,
    VilleArabe = :VilleArabe,
    GouvernoratArabe = :GouvernoratArabe,
    TypeBacAB = :TypeBacAB,
    Origine = :Origine,
    SituationDpart = :SituationDpart,
    NBAC = :NBAC,
    Redaut = :Redaut
    WHERE NCIN = :NCIN";

    try {
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':NCIN', $NCIN);
        $stmt->bindValue(':Nom', $_POST['Nom']);
        $stmt->bindValue(':DateNais', $_POST['DateNais']);
        $stmt->bindValue(':NCE', $_POST['NCE']);
        $stmt->bindValue(':TypBac', $_POST['TypBac']);
        $stmt->bindValue(':Prenom', $_POST['Prénom']);  
        $stmt->bindValue(':Sexe', $_POST['Sexe']);
        $stmt->bindValue(':LieuNais', $_POST['LieuNais']);
        $stmt->bindValue(':Adresse', $_POST['Adresse']);
        $stmt->bindValue(':Ville', $_POST['Ville']);
        $stmt->bindValue(':CodePostal', $_POST['CodePostal']);
        $stmt->bindValue(':N_Tel', $_POST['N_Tel']);
        $stmt->bindValue(':CodClasse', $_POST['CodClasse']);
        $stmt->bindValue(':DecisionConseil', $_POST['DecisionConseil']);
        $stmt->bindValue(':AnneeUniversitaire', $_POST['AnneeUniversitaire']);
        $stmt->bindValue(':Semestre', $_POST['Semestre']);
        $stmt->bindValue(':Dispenser', $_POST['Dispenser']);
        $stmt->bindValue(':AnneesOpt', $_POST['AnneesOpt']);
        $stmt->bindValue(':DatePremiereInscp', $_POST['DatePremiereInscp']);
        $stmt->bindValue(':Gouvernorat', $_POST['Gouvernorat']);
        $stmt->bindValue(':MentionBac', $_POST['MentionBac']);
        $stmt->bindValue(':Nationalite', $_POST['Nationalite']);
        $stmt->bindValue(':CodeCNSS', $_POST['CodeCNSS']);
        $stmt->bindValue(':NomArabe', $_POST['NomArabe']);
        $stmt->bindValue(':PrenomArabe', $_POST['PrenomArabe']);
        $stmt->bindValue(':LieuNaisArabe', $_POST['LieuNaisArabe']);
        $stmt->bindValue(':AdresseArabe', $_POST['AdresseArabe']);
        $stmt->bindValue(':VilleArabe', $_POST['VilleArabe']);
        $stmt->bindValue(':GouvernoratArabe', $_POST['GouvernoratArabe']);
        $stmt->bindValue(':TypeBacAB', $_POST['TypeBacAB']);
        $stmt->bindValue(':Origine', $_POST['Origine']);
        $stmt->bindValue(':SituationDpart', $_POST['SituationDpart']);
        $stmt->bindValue(':NBAC', $_POST['NBAC']);
        $stmt->bindValue(':Redaut', $_POST['Redaut']);

        $stmt->execute();
        echo "Les informations de l'étudiant ont été mises à jour avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour des informations de l'étudiant : " . $e->getMessage();
    }
} else {
    echo "Aucune donnée à mettre à jour.";
}
?>
