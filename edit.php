<?php
include('config.php');

$client = null; // Déclare la variable pour éviter l'erreur

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM clients WHERE id = $id");

    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
    } else {
        echo "Client non trouvé.";
        exit(); // Arrête l'exécution si l'ID est invalide
    }
} else {
    echo "ID non fourni.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];

    $stmt = $conn->prepare("UPDATE clients SET name=?, email=?, company=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $company, $id);

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
    <title>Modifier un Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Modifier un Client</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']) ?>">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($client['name'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Entreprise</label>
            <input type="text" name="company" class="form-control" value="<?= htmlspecialchars($client['company'] ?? '') ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>
