<?php
//connexion à ma bdd 
include '../utils/db_connect.php';
// ajout du patient en bdd 
if (
    isset($_POST['lastname']) && !empty($_POST['lastname']) &&
    isset($_POST['firstname']) && !empty($_POST['firstname']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['birthdate']) && !empty($_POST['birthdate']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_GET['patient_id']) && !empty($_GET['patient_id'])
) {
    $pdostmnt = $bdd->prepare("UPDATE patients SET lastname=?, firstname=?, birthdate=?, phone=?, mail=? WHERE id= ?");
    $isSuccess = $pdostmnt->execute([
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail'],
        $_GET['patient_id']
    ]);
    if ($isSuccess) {
        header('Location: ../profil-patient.php?success=Le patient a bien été modifié !&patient_id=' . $_GET['patient_id']);
    } else {
        header('Location: ../modif-patient.php?error=erreur lors de l\'enregistrement du patient !&patient_id=' . $_GET['patient_id']);
    }
} else {
    header('Location: ../modif-patient.php?error=Le formulaire n\'est pas valide !&patient_id=' . $_GET['patient_id']);
}
