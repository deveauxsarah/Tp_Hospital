<?php include './partials/header.php'; ?>
<?php require_once './utils/db_connect.php' ?>
<?php
$pdostmnt = $bdd->prepare("SELECT * FROM patients WHERE id = ?");
$pdostmnt->execute([$_GET['patient_id']]);
$patient = $pdostmnt->fetch(PDO::FETCH_ASSOC);

?>
<main>
    <?php include './utils/alert.php' ?>

    <h1>Profil patient</h1>
    <div class="" style="width: 25rem;">
        <div class="card-body">
            <h4 class="card-title"><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></h4>
            <p class="card-text"><?= $patient['mail'] ?> </p>
            <p class="card-text"><?= $patient['phone'] ?></p>
            <p class="card-text"><?= $patient['birthdate'] ?></p>
            <a href="./modif-patient.php?patient_id=<?= $patient['id'] ?>" class="btn btn-warning text-white">Modifier</a>
            <a href="./process/process_delete_patient.php?patient_id=<?= $patient['id'] ?>" class="btn btn-danger">Supprimer</a>
        </div>
    </div>

</main>

<?php include './partials/footer.php'; ?>