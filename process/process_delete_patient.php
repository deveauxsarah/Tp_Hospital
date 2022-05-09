<?php
 //connexion bdd 
 include '../utils/db_connect.php';

if (isset($_GET['patient_id']) && !empty($_GET['patient_id'])) {
   
    $id = $_GET['patient_id'];
    // faire la requete
    $pdostmnt = $bdd->prepare('DELETE FROM patients WHERE id = ?');
    
    $isSuccess = $pdostmnt->execute([
        $id
    ]);

    if ($isSuccess) {
        header("Location: ../liste-patients.php?success=La supression à bien été effectuée !");
    }else{
        header("Location: ../liste-patients.php?patient_id=".$id."&error=Echec lors de la supression");
    } 

} else {
    header('Location: ../liste-patients.php?error=Je ne sais pas qui supprimer');

}