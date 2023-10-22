<?php
// Paramètres de connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'flash';

// Créer une connexion à la base de données
$mysqli = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}
?>