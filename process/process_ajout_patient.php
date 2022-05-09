<?php
//connexion à ma bdd 
include '../utils/db_connect.php';
if (
isset($_POST['lastname']) && !empty($_POST['lastname'])&&
isset($_POST['firstname']) && !empty($_POST['firstname'])&&
isset($_POST['mail']) && !empty($_POST['mail'])&&
isset($_POST['birthdate']) && !empty($_POST['birthdate'])&&
isset($_POST['phone']) && !empty($_POST['phone'])

// ajout du patient en bdd 
 
    

) {
    $pdostmnt = $bdd->prepare("INSERT INTO patients (lastname, firstname, mail, birthdate, phone) VALUES (?,?,?,?,?)");
    $isSuccess = $pdostmnt->execute([
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['mail'],
        $_POST['birthdate'],
        $_POST['phone']
    ]);
    if ($isSuccess) {
        header('Location: ../liste-patients.php?success=Le patient a bien été ajouté !');
    } else {
        header('Location: ../ajout-patient.php?error=erreur lors de l\'enregistrement du patient !');
    }
} else {
    header('Location: ../ajout-patient.php?error=Le formulaire n\'est pas valide !');
}
