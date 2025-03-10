<?php
include 'config.php';

$result = $conn->query("SELECT * FROM documents");

echo "<h2>Liste des Documents</h2>";
echo "<a href='ajouter.php'>Ajouter un Document</a><br><br>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Titre</th><th>Fichier</th><th>Date d'Upload</th><th>Actions</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>" . (!empty($row['titre']) ? $row['titre'] : "Non défini") . "</td>
        <td>" . (!empty($row['fichier']) ? "<a href='uploads/{$row['fichier']}'>{$row['fichier']}</a>" : "Non défini") . "</td>
        <td>" . (!empty($row['date_upload']) ? $row['date_upload'] : "Non défini") . "</td>
        <td><a href='supprimer.php?id={$row['id']}' onclick=\"return confirm('Supprimer ce document ?');\">Supprimer</a></td>
    </tr>";
}
echo "</table>";
?>
