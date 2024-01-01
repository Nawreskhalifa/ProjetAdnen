<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "scolarite";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}
?>
