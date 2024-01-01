<?php
include '../Etudiant/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeMatiere = $_POST['codeMatiere'];
    $nomMatiere = $_POST['nomMatiere'];
    $coefMatiere = $_POST['coefMatiere'];
    $departement = $_POST['codeDep'];
    $semestre = $_POST['semestre'];
    $option = $_POST['codeOption'];
    $nbHeureCI = $_POST["nbHeureCI"];
    $nbHeureTP = $_POST["nbHeureTP"];
    $typeLabo = $_POST["typeLabo"];
    $bonus = $_POST["bonus"];
    $categories = $_POST["categories"];
    $sousCategories = $_POST["sousCategories"];
    $dateDeb = $_POST["dateDeb"];
    $dateFin = $_POST["dateFin"];
   
    $query = "UPDATE matieres 
              SET `Nom Matière` = '$nomMatiere', 
                  `Coef Matière` = '$coefMatiere', 
                  `Département` = '$departement', 
                  `Semestre` = '$semestre', 
                  `Code_Option` = '$option', 
                  `Nb Heure CI` = '$nbHeureCI', 
                  `Nb Heure TP` = '$nbHeureTP', 
                  `TypeLabo` = '$typeLabo', 
                  `Bonus` = '$bonus', 
                  `Catègories` = '$categories', 
                  `SousCatégories` = '$sousCategories', 
                  `DateDeb` = '$dateDeb', 
                  `DateFin` = '$dateFin'
              WHERE `Code Matière` = '$codeMatiere'";

    if ($connection->query($query) === TRUE) {
        echo "Matière mise à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de la matière : " . $connection->error;
    }
} else {
    echo "Mauvaise méthode de requête.";
}
?>
