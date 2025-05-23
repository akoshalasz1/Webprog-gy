<?php
session_start();

// Szerveroldali ellenőrzés
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $errors = [];

    if (empty($name)) $errors[] = "A név megadása kötelező.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Érvénytelen email cím.";
    if (empty($message)) $errors[] = "Az üzenet nem lehet üres.";

    if (count($errors) === 0) {
        // Adatbázis kapcsolat (Nethely konfigurációval példa)
        $host = 'localhost';
        $db = 'usersdb';
        $user = 'usersdb'; // Írd be a saját felhasználóneved
        $pass = '20031015YD7XS4';           // Írd be a saját jelszavad

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $subject, $message]);
        } catch (PDOException $e) {
            die("Adatbázis hiba: " . $e->getMessage());
        }
    }
} else {
    header("Location: kapcsolat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kapcsolat – Üzenet elküldve</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h1>Köszönjük a megkeresést!</h1>
        <?php if (!empty($errors)): ?>
            <div class="form-card">
                <h2>Hibák:</h2>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="kapcsolat.php">Vissza az űrlaphoz</a>
            </div>
        <?php else: ?>
            <div class="form-card">
                <p><strong>Név:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                <p><strong>Tárgy:</strong> <?= htmlspecialchars($subject) ?></p>
                <p><strong>Üzenet:</strong> <?= nl2br(htmlspecialchars($message)) ?></p>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
