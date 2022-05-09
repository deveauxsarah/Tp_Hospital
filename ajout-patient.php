<?php include './partials/header.php'; ?>
<?php include './utils/alert.php' ?>


<main>
    <h1 class="text-center m-4">Ajouter un patient</h1>

    <section class="d-flex justify-content-center">
        <form action="./process/process_ajout_patient.php" method="post" class="w-50">

            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" name="mail">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="tel" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="birthdate">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un patient</button>

        </form>
    </section>
</main>

<?php include './partials/footer.php'; ?>