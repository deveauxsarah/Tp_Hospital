<?php
//connexion à ma bdd 

// ajout du rdv en bdd 

if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour']) &&
    isset($_POST['Patient']) && !empty($_POST['Patient'])
) {

    include '../utils/db_connect.php';
    $pdostmnt = $bdd->prepare("INSERT INTO appointments (dateHour,idPatients) VALUES (?,?)");
    $isSuccess = $pdostmnt->execute([
        $_POST['dateHour'],
        $_POST['Patient']

    ]);


    if ($isSuccess) {
        header('Location: ../liste-rdv.php?success=Le Rendez-vous a bien été enregistré !');
    } else {
        header('Location: ../ajout_rdv_patients.php?error=erreur lors de l\'enregistrement du Rendez-vous !');
    }
} else {
    header('Location: ../ajout_rdv_patients.php?error=Le formulaire n\'est pas valide !');
}
