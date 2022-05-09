<?php include './partials/header.php'; ?>
<?php require_once './utils/db_connect.php' ?>

<?php
$pdostmnt = $bdd->prepare("SELECT * FROM patients");
$pdostmnt->execute();
$patients = $pdostmnt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <?php include "./utils/alert.php" ?>
    <h1 class="text-center">Liste des patients</h1>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">email</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient) { ?>
                    <tr>
                        <th scope="row"><?= $patient['id'] ?></th>
                        <td><?= $patient['firstname'] ?></td>
                        <td><?= $patient['lastname'] ?></td>
                        <td><?= $patient['mail'] ?></td>
                        <td><?= $patient['birthdate'] ?></td>
                        <td><?= $patient['phone'] ?></td>
                        <td>
                            <a class="btn btn-info text-white" href="./profil-patient.php?patient_id=<?= $patient['id'] ?>">Voir</a>
                            <a class="btn btn-warning text-white" href="./profil-patient.php?patient_id=<?= $patient['id'] ?>">Modifier</a>
                            <a class="btn btn-danger" href="./process/process_delete_patient.php?patient_id=<?= $patient['id'] ?>">Supprimer</a>
                            <a class="btn btn-primary " href="./ajout-rdv-patients.php?patient_id=<?= $patient['id'] ?>">Ajouter RDV</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
</main>

<?php include './partials/footer.php'; ?>