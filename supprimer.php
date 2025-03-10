<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $res = $conn->query("SELECT fichier FROM documents WHERE id=$id");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $file_path = "uploads/" . $row['fichier'];

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $sql = "DELETE FROM documents WHERE id=$id";
        if ($conn->query($sql)) {
            echo "Document supprimé.";
        } else {
            echo "Erreur SQL : " . $conn->error;
        }
    } else {
        echo "Document introuvable.";
    }
}
?>
<a href="read_documents.php">Retour</a>
