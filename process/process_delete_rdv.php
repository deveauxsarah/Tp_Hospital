<?php
//connexion à ma bdd 
include '../utils/db_connect.php';
// vérifier id-rdv existe et n'est pas vide  
if (isset($_GET['id_rdv']) && !empty($_GET['id_rdv'])) {

    // transforme $_GET['id_rdv'] en une variable $id
    $id = $_GET['id_rdv'];


    // demande a la base de donné de sup. les données de la table appointment
    // en fonction de son id 
    $pdostmnt = $bdd->prepare("DELETE FROM appointments WHERE id = ?");

    // la bdd suprime 
    $isSuccess = $pdostmnt->execute([
        $id
    ]);


    if ($isSuccess) {
        header('Location: ../liste-rdv.php?success=Le RDV a bien été supprimé !&patient_id=' . $_GET['id_rdv']);
    } else {
        header('Location: ../liste-rdv.php?error=La supression n\'a pas été prise en compte !&patient_id=' . $_GET['id_rdv']);
    }
} else {
    header('Location: ../liste-rdv.php?error= je n\'ai pas reconnue l\'id !&patient_id=' . $_GET['id_rdv']);
}
