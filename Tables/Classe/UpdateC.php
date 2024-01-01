<?php
include '../Etudiant/config.php';

if (isset($_POST['UpdateC'])) {
    $CodClasse = $_POST['CodClasse'];
    $IntClasse = $_POST['IntClasse'];
    $Departement = $_POST['Departement'];
    $Optionn = $_POST['Optionn'];
    $Niveau = $_POST['Niveau'];
    $IntCalsseArabB = $_POST['IntCalsseArabB'];
    $OptionAaraB = $_POST['OptionAaraB'];
    $DepartementAaraB = $_POST['DepartementAaraB'];
    $NiveauAaraB = $_POST['NiveauAaraB'];
    $CodeEtape = $_POST['CodeEtape'];
    $CodeSalima = $_POST['CodeSalima'];

    $query = "UPDATE classe 
              SET IntClasse = ?, Departement = ?, Optionn = ?, Niveau = ?, IntCalsseArabB = ?, 
                  OptionAaraB = ?, DepartementAaraB = ?, NiveauAaraB = ?, CodeEtape = ?, CodeSalima = ?
              WHERE CodClasse = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param(
        'sssssssssss',
        $IntClasse,
        $Departement,
        $Optionn,
        $Niveau,
        $IntCalsseArabB,
        $OptionAaraB,
        $DepartementAaraB,
        $NiveauAaraB,
        $CodeEtape,
        $CodeSalima,
        $CodClasse
    );

    if ($stmt->execute()) {
        echo "La classe a été mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la classe : " . $stmt->error;
    }

    $stmt->close();
} else {
    // Handle error or redirect if the form is not submitted properly
    header("Location: IndexC.php");
    exit();
}
?>
