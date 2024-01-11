<?php
include '../Etudiant/config.php';

// Vérifie si le paramètre MatProf est présent dans l'URL
if (isset($_GET['MatProf'])) {
    $matProfToEdit = $_GET['MatProf'];

    // Récupère les données de l'enregistrement à modifier
    $editQuery = "SELECT * FROM prof WHERE MatProf = '$matProfToEdit'";
    $result = $connection->query($editQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Affiche le formulaire de modification avec les données existantes
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Professeur</title>
        </head>
        <body>
            <h1>Modifier un Professeur</h1>
            <form action="UpdateP.php" method="post">
                <label for="MatProf">Matricule Prof :</label>
                <input type="text" name="MatProf" value="<?php echo $row['MatProf']; ?>" readonly><br>

                <label for="Nom">Nom :</label>
<input type="text" name="Nom" value="<?php echo $row['Nom']; ?>"><br>

<label for="Prenom">Prénom :</label>
<input type="text" name="Prenom" value="<?php echo $row['Prénom']; ?>"><br>

<label for="CIN_ou_Passeport">CIN ou Passeport :</label>
<input type="text" name="CIN_ou_Passeport" value="<?php echo $row['CIN_ou_Passeport']; ?>"><br>

<label for="identifiantCNRPS">Identifiant CNRPS :</label>
<input type="text" name="identifiantCNRPS" value="<?php echo $row['Identifiant_CNRPS']; ?>"><br>

<label for="dateNaissance">Date de naissance :</label>
<input type="date" name="dateNaissance" value="<?php echo $row['Date_de_naissance']; ?>"><br>

<label for="nationalite">Nationalité :</label>
<input type="text" name="nationalite" value="<?php echo $row['Nationalité']; ?>"><br>

<label for="sexe">Sexe (M/F) :</label>
<input type="text" name="sexe" value="<?php echo $row['Sexe']; ?>"><br>

<label for="dateEntAdm">Date d'entrée administrative :</label>
<input type="date" name="dateEntAdm" value="<?php echo $row['Date_Ent_Adm']; ?>"><br>

<label for="dateEntEtbs">Date d'entrée à l'établissement :</label>
<input type="date" name="dateEntEtbs" value="<?php echo $row['Date_Ent_Etbs']; ?>"><br>

<label for="diplome">Diplôme :</label>
<input type="text" name="diplome" value="<?php echo $row['Diplôme']; ?>"><br>

<label for="adresse">Adresse :</label>
<input type="text" name="adresse" value="<?php echo $row['Adresse']; ?>"><br>

<label for="ville">Ville :</label>
<input type="text" name="ville" value="<?php echo $row['Ville']; ?>"><br>

<label for="codePostal">Code postal :</label>
<input type="text" name="codePostal" value="<?php echo $row['Code_postal']; ?>"><br>

<label for="telephone">Téléphone :</label>
<input type="text" name="telephone" value="<?php echo $row['N_Téléphone']; ?>"><br>
<br>

<label for="dateNominationGrade">Date de nomination dans le grade :</label>
<input type="date" name="dateNominationGrade" value="<?php echo $row['Date_de_nomination_dans_le_grade']; ?>"><br>

<label for="dateTitularisation">Date de titularisation :</label>
<input type="date" name="dateTitularisation" value="<?php echo $row['Date_de_titularisation']; ?>"><br>

<label for="nPoste">Numéro de poste :</label>
<input type="text" name="nPoste" value="<?php echo $row['N_Poste']; ?>"><br>

<br>

<label for="situation">Situation :</label>
<input type="text" name="situation" value="<?php echo $row['Situation']; ?>"><br>

<label for="specialite">Spécialité :</label>
<input type="text" name="specialite" value="<?php echo $row['Spécialité']; ?>"><br>

<label for="nCompte">Numéro de Compte :</label>
<input type="text" name="nCompte" value="<?php echo $row['N_de_Compte']; ?>"><br>

<label for="banque">Banque :</label>
<input type="text" name="banque" value="<?php echo $row['Banque']; ?>"><br>

<label for="agence">Agence :</label>
<input type="text" name="agence" value="<?php echo $row['Agence']; ?>"><br>

<label for="adrVacances">Adresse pendant les vacances :</label>
<input type="text" name="adrVacances" value="<?php echo $row['Adr_pendant_les_vacances']; ?>"><br>

<label for="telVacances">Téléphone pendant les vacances :</label>
<input type="text" name="telVacances" value="<?php echo $row['Tél_pendant_les_vacances']; ?>"><br>

<label for="lieuNaissance">Lieu de naissance :</label>
<input type="text" name="lieuNaissance" value="<?php echo $row['Lieu_de_naissance']; ?>"><br>


<label for="debutContrat">Début du Contrat :</label>
<input type="date" name="debutContrat" value="<?php echo $row['Début_du_Contrat']; ?>"><br>

                <label for="finContrat">Fin du Contrat :</label>
                <input type="date" name="finContrat" value="<?php echo $row['Fin_du_Contrat']; ?>"><br>

                <label for="typeContrat">Type de Contrat :</label>
                <input type="text" name="typeContrat" value="<?php echo $row['Type_de_Contrat']; ?>"><br>

                <label for="nbContratISETSOUSSE">Nombre de Contrats à l'ISET SOUSSE :</label>
                <input type="number" name="nbContratISETSOUSSE" value="<?php echo $row['NB_contrat_ISETSOUSSE']; ?>"><br>

                <label for="nbContratAutreEtb">Nombre de Contrats dans un autre établissement :</label>
                <input type="text" name="nbContratAutreEtb" value="<?php echo $row['NB_contrat_Autre_Etb']; ?>"><br>

                <label for="bureau">Bureau :</label>
                <input type="text" name="bureau" value="<?php echo $row['Bureau']; ?>"><br>

                <label for="email">Email :</label>
                <input type="email" name="email" value="<?php echo $row['Email']; ?>"><br>

                <label for="emailInterne">Email Interne :</label>
                <input type="email" name="emailInterne" value="<?php echo $row['Email_Interne']; ?>"><br>

                <label for="nomArabe">Nom en Arabe :</label>
                <input type="text" name="nomArabe" value="<?php echo $row['NomArabe']; ?>"><br>

                <label for="prenomArabe">Prénom en Arabe :</label>
                <input type="text" name="prenomArabe" value="<?php echo $row['PrenomArabe']; ?>"><br>

<label for="lieuNaisArabe">Lieu de naissance en Arabe :</label>
<input type="text" name="lieuNaisArabe" value="<?php echo $row['LieuNaisArabe']; ?>"><br>

<label for="adresseArabe">Adresse en Arabe :</label>
<input type="text" name="adresseArabe" value="<?php echo $row['AdresseArabe']; ?>"><br>

<label for="villeArabe">Ville en Arabe :</label>
<input type="text" name="villeArabe" value="<?php echo $row['VilleArabe']; ?>"><br>

<label for="disponible">Disponible :</label>
<input type="text" name="disponible" value="<?php echo $row['Disponible']; ?>"><br>

<label for="sousSP">Sous-SP :</label>
<input type="text" name="sousSP" value="<?php echo $row['SousSP']; ?>"><br>

<label for="etbOrigine">Établissement d'origine :</label>
<input type="text" name="etbOrigine" value="<?php echo $row['EtbOrigine']; ?>"><br>

<label for="typeEnsg">Type d'enseignement :</label>
<input type="text" name="typeEnsg" value="<?php echo $row['TypeEnsg']; ?>"><br>

<label for="controlAcces">Contrôle d'accès :</label>
<input type="text" name="controlAcces" value="<?php echo $row['ControlAcces']; ?>"><br>

<label for="grade">Grade :</label>
<select name="grade">
    <?php
    // Récupérer la liste des grades depuis la base de données
    $gradesQuery = "SELECT * FROM grades";
    $gradesResult = $connection->query($gradesQuery);

    // Afficher chaque grade dans le champ de sélection
    while ($grade = $gradesResult->fetch_assoc()) {
        $selected = ($grade['Grade'] == $row['Grade']) ? 'selected' : '';
        echo "<option value='{$grade['Grade']}' $selected>{$grade['Grade']}</option>";
    }
    ?>
</select><br>
<label for="departement">Département :</label>
<select name="departement">
    <?php
    // Récupérer la liste des départements depuis la base de données
    $departementsQuery = "SELECT * FROM departements";
    $departementsResult = $connection->query($departementsQuery);

    // Afficher chaque département dans le champ de sélection
    while ($dept = $departementsResult->fetch_assoc()) {
        $selected = ($dept['CodeDep'] == $row['Département']) ? 'selected' : '';
        echo "<option value='{$dept['CodeDep']}' $selected>{$dept['Departement']}</option>";
    }
    ?>
</select><br>


                <input type="submit" value="Enregistrer les modifications">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun enregistrement trouvé avec le Matricule Prof : $matProfToEdit";
    }
} else {
    echo "Paramètre MatProf non spécifié.";
}

// Ferme la connexion à la base de données
$connection->close();
?>
