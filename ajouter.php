<?php
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $title = $_POST['title'];
    $upload_dir = "../uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $file_path = $upload_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $file_path);

    $sql = "INSERT INTO documents (title, file_path) VALUES ('$title', '$file_path')";
    if ($conn->query($sql)) {
        echo "Document ajouté.";
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Titre du document" required>
    <input type="file" name="file" required>
    <button type="submit">Uploader</button>
</form>
