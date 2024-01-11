<?php
// Include the database connection file
include '../Etudiant/config.php'; 

// Récupérer la liste des départements pour le champ de sélection
$departementsQuery = "SELECT CodeDep, Departement FROM departements";
$departementsResult = $connection->query($departementsQuery);
$gradesQuery = "SELECT * FROM grades";
$gradesResult = $connection->query($gradesQuery);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $MatProf = $_POST['MatProf'];
    $Nom = $_POST['Nom'];
    $Prénom = $_POST['Prenom'];
    $CIN_ou_Passeport = $_POST['CIN_ou_Passeport'];
    $identifiantCNRPS = $_POST['identifiantCNRPS'];
    $dateNaissance = $_POST['dateNaissance'];
    $nationalite = $_POST['nationalite'];
    $sexe = $_POST['sexe'];
    $dateEntAdm = $_POST['dateEntAdm'];
    $dateEntEtbs = $_POST['dateEntEtbs'];
    $diplome = $_POST['diplome'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];
    $telephone = $_POST['telephone'];
    $grade = $_POST['grade'];
    $dateNominationGrade = $_POST['dateNominationGrade'];
    $dateTitularisation = $_POST['dateTitularisation'];
    $nPoste = $_POST['nPoste'];
    $departement = $_POST['codeDep'];
    $situation = $_POST['situation'];
    $specialite = $_POST['specialite'];
    $nCompte = $_POST['nCompte'];
    $banque = $_POST['banque'];
    $agence = $_POST['agence'];
    $adrVacances = $_POST['adrVacances'];
    $telVacances = $_POST['telVacances'];
    $lieuNaissance = $_POST['lieuNaissance'];
    $debutContrat = $_POST['debutContrat'];
    $finContrat = $_POST['finContrat'];
    $typeContrat = $_POST['typeContrat'];
    $nbContratISETSOUSSE = $_POST['nbContratISETSOUSSE'];
    $nbContratAutreEtb = $_POST['nbContratAutreEtb'];
    $bureau = $_POST['bureau'];
    $email = $_POST['email'];
    $emailInterne = $_POST['emailInterne'];
    $nomArabe = $_POST['nomArabe'];
    $prenomArabe = $_POST['prenomArabe'];
    $lieuNaisArabe = isset($_POST['lieuNaisArabe']) ? $_POST['lieuNaisArabe'] : '';
    $adresseArabe = isset($_POST['adresseArabe']) ? $_POST['adresseArabe'] : '';
    $villeArabe = isset($_POST['villeArabe']) ? $_POST['villeArabe'] : '';
    $disponible = isset($_POST['disponible']) ? $_POST['disponible'] : '';
    $sousSP = isset($_POST['sousSP']) ? $_POST['sousSP'] : '';
    $etbOrigine = isset($_POST['etbOrigine']) ? $_POST['etbOrigine'] : '';
    $typeEnsg = isset($_POST['typeEnsg']) ? $_POST['typeEnsg'] : '';
    $controlAcces = isset($_POST['controlAcces']) ? $_POST['controlAcces'] : '';
     
    // Prepare and execute the SQL query
    $sql = "INSERT INTO prof (
    MatProf, Nom, Prénom, CIN_ou_Passeport, Identifiant_CNRPS, 
        Date_de_naissance, Nationalité, Sexe, Date_Ent_Adm, Date_Ent_Etbs,
        Diplôme, Adresse, Ville, Code_postal, N_Téléphone, Grade,
        Date_de_nomination_dans_le_grade, Date_de_titularisation, N_Poste,
        Département, Situation, Spécialité, N_de_Compte, Banque, Agence,
        Adr_pendant_les_vacances, Tél_pendant_les_vacances, Lieu_de_naissance,
        Début_du_Contrat, Fin_du_Contrat, Type_de_Contrat, NB_contrat_ISETSOUSSE,
        NB_contrat_Autre_Etb, Bureau, Email, Email_Interne, NomArabe, PrenomArabe,
        LieuNaisArabe, AdresseArabe, VilleArabe, Disponible, SousSP, EtbOrigine,
        TypeEnsg, ControlAcces
    ) VALUES (
        '$MatProf', '$Nom', '$Prénom', '$CIN_ou_Passeport', '$identifiantCNRPS', 
        '$dateNaissance', '$nationalite', '$sexe', '$dateEntAdm', '$dateEntEtbs',
        '$diplome', '$adresse', '$ville', '$codePostal', '$telephone', '$grade',
        '$dateNominationGrade', '$dateTitularisation', '$nPoste', '$departement',
        '$situation', '$specialite', '$nCompte', '$banque', '$agence',
        '$adrVacances', '$telVacances', '$lieuNaissance', '$debutContrat',
        '$finContrat', '$typeContrat', '$nbContratISETSOUSSE', '$nbContratAutreEtb',
        '$bureau', '$email', '$emailInterne', '$nomArabe', '$prenomArabe',
        '$lieuNaisArabe', '$adresseArabe', '$villeArabe', '$disponible', '$sousSP',
        '$etbOrigine', '$typeEnsg', '$controlAcces'
    )";

    
    if ($connection->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Professeur</title>
</head>
<body>
    <h1>Ajout d'un Professeur</h1>
    <form action="" method="post">
        <label for="MatProf">Matricule Prof :</label>
        <input type="text" name="MatProf" required><br>
    
        <label for="Nom">Nom :</label>
        <input type="text" name="Nom" required><br>
    
        <label for="Prenom">Prénom :</label>
        <input type="text" name="Prenom" required><br>
    
        <label for="CIN_ou_Passeport">CIN ou Passeport :</label>
        <input type="text" name="CIN_ou_Passeport"><br>
    
        <label for="identifiantCNRPS">Identifiant CNRPS :</label>
        <input type="text" name="identifiantCNRPS"><br>
    
        <label for="dateNaissance">Date de naissance :</label>
        <input type="date" name="dateNaissance"><br>
    
        <label for="nationalite">Nationalité :</label>
        <input type="text" name="nationalite"><br>
    
        <label for="sexe">Sexe :</label>
        <input type="text" name="sexe"><br>
    
        <label for="dateEntAdm">Date d'entrée administrative :</label>
        <input type="date" name="dateEntAdm"><br>
    
        <label for="dateEntEtbs">Date d'entrée à l'établissement :</label>
        <input type="date" name="dateEntEtbs"><br>
    
        <label for="diplome">Diplôme :</label>
        <input type="text" name="diplome"><br>
    
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse"><br>
    
        <label for="ville">Ville :</label>
        <input type="text" name="ville"><br>
    
        <label for="codePostal">Code postal :</label>
        <input type="text" name="codePostal"><br>
    
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone"><br>
    
        <label for="grade">Grade :</label>
        <select name="grade">
            <?php


            // Afficher les options du champ de sélection
            while ($row = $gradesResult->fetch_assoc()) {
                echo "<option value='" . $row['Grade'] . "'>" . $row['Grade'] . "</option>";
            }
            ?>
        </select><br>
    
        <label for="dateNominationGrade">Date de nomination dans le grade :</label>
        <input type="date" name="dateNominationGrade"><br>
    
        <label for="dateTitularisation">Date de titularisation :</label>
        <input type="date" name="dateTitularisation"><br>
    
        <label for="nPoste">Numéro de poste :</label>
        <input type="text" name="nPoste"><br>

        <label for="departement">Département :</label>
        <select name="codeDep">
            <?php
            // Afficher la liste des départements
            while ($row = $departementsResult->fetch_assoc()) {
                echo "<option value='" . $row['CodeDep'] . "'>" . $row['Departement'] . "</option>";
            }
            ?>
        </select><br>
        

        <label for="situation">Situation :</label>
        <input type="text" name="situation"><br>
    
        <label for="specialite">Spécialité :</label>
        <input type="text" name="specialite"><br>
    
        <label for="nCompte">Numéro de Compte :</label>
        <input type="text" name="nCompte"><br>
    
        <label for="banque">Banque :</label>
        <input type="text" name="banque"><br>
    
        <label for="agence">Agence :</label>
        <input type="text" name="agence"><br>
    
        <label for="adrVacances">Adresse pendant les vacances :</label>
        <input type="text" name="adrVacances"><br>
    
        <label for="telVacances">Téléphone pendant les vacances :</label>
        <input type="text" name="telVacances"><br>
    
        <label for="lieuNaissance">Lieu de naissance :</label>
        <input type="text" name="lieuNaissance"><br>
    
        <label for="debutContrat">Début du Contrat :</label>
        <input type="date" name="debutContrat"><br>
    
        <label for="finContrat">Fin du Contrat :</label>
        <input type="date" name="finContrat"><br>
    
        <label for="typeContrat">Type de Contrat :</label>
        <input type="text" name="typeContrat"><br>
    
        <label for="nbContratISETSOUSSE">Nombre de Contrats à l'ISET SOUSSE :</label>
        <input type="number" name="nbContratISETSOUSSE"><br>
    
        <label for="nbContratAutreEtb">Nombre de Contrats dans un autre établissement :</label>
        <input type="text" name="nbContratAutreEtb"><br>
    
        <label for="bureau">Bureau :</label>
        <input type="text" name="bureau"><br>
    
        <label for="email">Email :</label>
        <input type="email" name="email"><br>
    
        <label for="emailInterne">Email Interne :</label>
        <input type="email" name="emailInterne"><br>
    
        <label for="nomArabe">Nom en Arabe :</label>
        <input type="text" name="nomArabe"><br>
    
        <label for="prenomArabe">Prénom en Arabe :</label>
        <input type="text" name="prenomArabe"><br>
        <label for="adresseArabe">Adresse en Arabe:</label>
    <input type="text" id="adresseArabe" name="adresseArabe" />

    <label for="villeArabe">Ville en Arabe:</label>
    <input type="text" id="villeArabe" name="villeArabe"/>

    <label for="disponible">Disponible:</label>
    <input type="text" id="disponible" name="disponible" />

    <label for="sousSP">Sous SP:</label>
    <input type="text" id="sousSP" name="sousSP"  />

    <label for="etbOrigine">Établissement d'Origine:</label>
    <input type="text" id="etbOrigine" name="etbOrigine" />

    <label for="controlAcces">Contrôle d'Accès:</label>
    <input type="text" id="controlAcces" name="controlAcces"/>

    <label for="lieuNaisArabe">Lieu de Naissance en Arabe:</label>
    <input type="text" id="lieuNaisArabe" name="lieuNaisArabe"  />

    
        <label for="typeEnsg">Type d'Enseignement :</label>
        <input type="text" name="typeEnsg"><br>
    
        <input type="submit" value="Ajouter Professeur">
    </form>
    
    
</body>
</html>
