<?php
$host = "localhost"; // Ou l'IP du serveur MySQL
$user = "root";      // Remplace par ton utilisateur MySQL
$pass = "passer";          // Ton mot de passe MySQL
$dbname = "smarttech_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>