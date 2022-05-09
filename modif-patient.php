<?php include './partials/header.php'; ?>

<?php require_once './utils/db_connect.php' ?>
<?php
$pdostmnt = $bdd->prepare("SELECT * FROM patients WHERE id = ?");
$pdostmnt->execute([$_GET['patient_id']]);
$patient = $pdostmnt->fetch(PDO::FETCH_ASSOC);

?>
<main>
    <?php include './utils/alert.php' ?>

    <h1 class="text-center">Modifier le patient numéro <?= $patient['id'] ?></h1>
    <section class="d-flex justify-content-center">
        <form action="./process/process_modif_patient.php?patient_id=<?= $patient['id'] ?>" method="post" class="w-50">
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" value="<?= $patient['lastname'] ?>" name="lastname">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" value="<?= $patient['firstname'] ?>" name="firstname">
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" value="<?= $patient['mail'] ?>" name="mail">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="tel" class="form-control" value="<?= $patient['phone'] ?>" name="phone">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" value="<?= $patient['birthdate'] ?>" name="birthdate">
            </div>

            <button type="submit" class="btn btn-warning">Modifier un patient</button>
        </form>
    </section>

</main>

<?php include './partials/footer.php'; ?>