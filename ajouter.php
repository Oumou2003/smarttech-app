<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];

    $stmt = $conn->prepare("INSERT INTO clients (name, email, company) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $company);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Ajouter un Client</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Entreprise</label>
            <input type="text" name="company" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>
