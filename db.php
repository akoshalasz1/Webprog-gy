<?php
$host = 'localhost';
$db = 'vaszilij';
$user = 'root'; // vagy saját MySQL felhasználónév
//$pass = '';     // ha van jelszó, írd be

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kapcsolódási hiba: " . $e->getMessage());
}
?>
