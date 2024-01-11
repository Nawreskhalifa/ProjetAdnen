<?php
include '../Etudiant/config.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $MatProf = $_POST['MatProf'];
    // Récupérez d'autres champs du formulaire ici

  
    $updateQuery = "UPDATE prof SET ";
    $updateQuery .= "Nom = '" . $_POST['Nom'] . "', ";
    $updateQuery .= "Prénom = '" . $_POST['Prenom'] . "', ";
    $updateQuery .= "CIN_ou_Passeport = '" . $_POST['CIN_ou_Passeport'] . "', ";
    $updateQuery .= "Identifiant_CNRPS = '" . $_POST['identifiantCNRPS'] . "', ";
    $updateQuery .= "Date_de_naissance = '" . $_POST['dateNaissance'] . "', ";
    $updateQuery .= "Nationalité = '" . ($_POST['nationalite'] ?? '') . "', ";
    $updateQuery .= "Sexe = '" . ($_POST['sexe'] ?? '') . "', ";
    $updateQuery .= "Date_Ent_Adm = '" . ($_POST['dateEntAdm'] ?? '') . "', ";
    $updateQuery .= "Date_Ent_Etbs = '" . ($_POST['dateEntEtbs'] ?? '') . "', ";
    $updateQuery .= "Diplôme = '" . ($_POST['diplome'] ?? '') . "', ";
    $updateQuery .= "Adresse = '" . ($_POST['adresse'] ?? '') . "', ";
    $updateQuery .= "Ville = '" . ($_POST['ville'] ?? '') . "', ";
    $updateQuery .= "Code_postal = '" . ($_POST['codePostal'] ?? '') . "', ";
    $updateQuery .= "N_Téléphone = '" . ($_POST['telephone'] ?? '') . "', ";
    $updateQuery .= "Grade = '" . ($_POST['grade'] ?? '') . "', ";
    $updateQuery .= "Date_de_nomination_dans_le_grade = '" . ($_POST['dateNominationGrade'] ?? '') . "', ";
    $updateQuery .= "Situation = '" . ($_POST['situation'] ?? '') . "', ";
$updateQuery .= "Spécialité = '" . ($_POST['specialite'] ?? '') . "', ";
$updateQuery .= "N_de_Compte = '" . ($_POST['nCompte'] ?? '') . "', ";
$updateQuery .= "Banque = '" . ($_POST['banque'] ?? '') . "', ";
$updateQuery .= "Agence = '" . ($_POST['agence'] ?? '') . "', ";
$updateQuery .= "Adr_pendant_les_vacances = '" . ($_POST['adrVacances'] ?? '') . "', ";
$updateQuery .= "Tél_pendant_les_vacances = '" . ($_POST['telVacances'] ?? '') . "', ";
$updateQuery .= "Lieu_de_naissance = '" . ($_POST['lieuNaissance'] ?? '') . "', ";
$updateQuery .= "Début_du_Contrat = '" . ($_POST['debutContrat'] ?? '') . "', ";
$updateQuery .= "Fin_du_Contrat = '" . ($_POST['finContrat'] ?? '') . "', ";
$updateQuery .= "Type_de_Contrat = '" . ($_POST['typeContrat'] ?? '') . "', ";
$updateQuery .= "NB_contrat_ISETSOUSSE = '" . ($_POST['nbContratISETSOUSSE'] ?? '') . "', ";
$updateQuery .= "NB_contrat_Autre_Etb = '" . ($_POST['nbContratAutreEtb'] ?? '') . "', ";
$updateQuery .= "Bureau = '" . ($_POST['bureau'] ?? '') . "', ";
$updateQuery .= "Email = '" . ($_POST['email'] ?? '') . "', ";
$updateQuery .= "Email_Interne = '" . ($_POST['emailInterne'] ?? '') . "', ";
$updateQuery .= "NomArabe = '" . ($_POST['nomArabe'] ?? '') . "', ";
$updateQuery .= "PrenomArabe = '" . ($_POST['prenomArabe'] ?? '') . "', ";
$updateQuery .= "LieuNaisArabe = '" . ($_POST['lieuNaisArabe'] ?? '') . "', ";
$updateQuery .= "AdresseArabe = '" . ($_POST['adresseArabe'] ?? '') . "', ";
$updateQuery .= "VilleArabe = '" . ($_POST['villeArabe'] ?? '') . "', ";
$updateQuery .= "Disponible = '" . ($_POST['disponible'] ?? '') . "', ";
$updateQuery .= "SousSP = '" . ($_POST['sousSP'] ?? '') . "', ";
$updateQuery .= "EtbOrigine = '" . ($_POST['etbOrigine'] ?? '') . "', ";
$updateQuery .= "TypeEnsg = '" . ($_POST['typeEnsg'] ?? '') . "', ";
$updateQuery .= "ControlAcces = '" . ($_POST['controlAcces'] ?? '') . "'";


    $updateQuery .= " WHERE MatProf = '$MatProf'";

    if ($connection->query($updateQuery) === TRUE) {
        echo "Enregistrement mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }
} else {
    echo "Le formulaire de mise à jour n'a pas été soumis.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
