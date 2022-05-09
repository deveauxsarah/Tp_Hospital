<?php include './utils/db_connect.php'; ?>
<?php include './partials/header.php'; ?>
<?php
$pdostmnt = $bdd->prepare("SELECT * FROM patients");
$pdostmnt->execute();
$patients = $pdostmnt->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <?php include './utils/alert.php' ?>
    <h1 class="text-center m-4">Prise de Rendez-vous</h1>

    <section class="d-flex justify-content-center">
        <form action="./process/process_ajout_rdv_patient.php" method="post" class="w-50">

            <select name="Patient" class="form-select mb-3" aria-label="Default select example">
                <option selected value="">Identification du Patient</option>
                <?php foreach ($patients as $patient) {
                ?>
                    <option value="<?= $patient['id'] ?>"><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></option>
                <?php
                }
                ?>
            </select>

            <div class="input-group mb-3">
                Date <input type="datetime-local" name="dateHour" class="form-control">

            </div>

            <!--<label for="" class="form-label">Date du RDV</label>
                <input type="datetime-local" class="form-control" name="dateHour">
            </div>-->

            <div class="input-group mb-3">
                <span class="input-group-text">Motifs du RDV</span>
                <textarea class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Ajouter le Rendez-vous</button>



        </form>
    </section>
</main>

<?php include './partials/footer.php'; ?>