<?php include './partials/header.php'; ?>
<?php require_once './utils/db_connect.php' ?>

<?php
$pdostmnt = $bdd->prepare("SELECT patients.lastname, patients.firstname, appointments.dateHour ,appointments.id, appointments.idPatients
                            FROM patients 
                            JOIN appointments 
                            ON patients.id=appointments.idPatients");
$pdostmnt->execute();
$rdvs = $pdostmnt->fetchAll();

?>


<main>
    <?php include "./utils/alert.php" ?>
    <h1 class="text-center">Liste des Rendez-vous</h1>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Rendez-vous</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rdvs as $rdv) { ?>
                    <tr>
                        <th scope="row"><?= $rdv['id'] ?></th>
                        <td><?= $rdv['firstname'] ?></td>
                        <td><?= $rdv['lastname'] ?></td>
                        <td><?= $rdv['dateHour'] ?> </td>
                        <td>
                            <a class="btn btn-info text-white" href="./profil-patient.php?patient_id=<?= $rdv['idPatients'] ?>">Voir</a>
                            <a class="btn btn-warning text-white" href="./profil-patient.php?patient_id=<?= $rdv['idPatients'] ?>">Modifier</a>
                            <a class="btn btn-danger" href="./process/process_delete_rdv.php?id_rdv=<?= $rdv['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
</main>

<?php include './partials/footer.php'; ?>