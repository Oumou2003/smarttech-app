<?php
include('config.php');


$result = $conn->query("SELECT * FROM clients");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Liste des Clients</h2>
    <a href="ajouter.php" class="btn btn-success mb-3">Ajouter un Client</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Entreprise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['company'] ?></td>
                <td>
                    <a href="modifier.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="supprimer.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
