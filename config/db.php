<?php
// db.php
$host = 'localhost'; // Adres hosta
$db = 'ecommerce'; // Nazwa bazy danych
$user = 'root'; // Nazwa użytkownika (domyślnie 'root' dla XAMPP)
$pass = ''; // Hasło (domyślnie puste dla XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
