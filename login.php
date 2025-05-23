<?php session_start(); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'usersdb';
$user = 'usersdb';
$pass = '20031015YD7XS4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['message'] = 'Sikeres bejelentkezés';
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Hibás felhasználónév vagy jelszó';
            header('Location: login.php');
            exit();
        }
    }
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button id="darkModeToggle">🌞</button>
    
<header>
    <nav class="navbar">
        <div class="nav-left">
            <a href="index.php">Főoldal</a>
            <a href="blog.php">Blog</a>
            <a href="gallery.php">Galéria</a>
            <a href="kapcsolat.php">Kapcsolat</a>
            <?php if (isset($_SESSION['username'])): ?>
<a href="admin.php">Admin</a>
<?php endif; ?>
        </div>
        <div class="nav-right">
            <?php if(isset($_SESSION['username'])): ?>
                <span class="username">👤 <?php echo $_SESSION['username']; ?></span>
                <a href="logout.php" class="btn">Kijelentkezés</a>
            <?php else: ?>
                <a href="login.php" class="btn">Bejelentkezés</a>
                <a href="register.php" class="btn">Regisztráció</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main>
    <?php if (isset($_SESSION['message'])) { echo "<p class='message'>" . $_SESSION['message'] . "</p>"; unset($_SESSION['message']); } ?>
    <h2>Bejelentkezés</h2>
    <div class=\"form-card\"><form method="POST" action="login.php">
        <label>Felhasználónév:</label><br>
        <input type="text" name="username" required><br>
        <label>Jelszó:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Bejelentkezés">
    </form></div>
</main>

<footer><p>&copy; 2025 Vaszilij EDC | Minden jog fenntartva.</p></footer>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    function updateButton() {
        darkModeToggle.textContent = document.documentElement.classList.contains('dark-mode') ? '🌙' : '🌞';
    }

    if (isDarkMode) {
        document.documentElement.classList.add('dark-mode');
    }
    updateButton();

    darkModeToggle.addEventListener('click', function() {
        document.documentElement.classList.toggle('dark-mode');
        const darkModeEnabled = document.documentElement.classList.contains('dark-mode');
        localStorage.setItem('darkMode', darkModeEnabled);
        updateButton();
    });
});
</script>
</body>
</html>