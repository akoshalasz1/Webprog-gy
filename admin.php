<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Vaszilij EDC </title>
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



<header>
    <div class="container">
        <h1>Vaszilij EDC</h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href=".php"></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['username'])): ?>
                    <li style="float:right;">Bejelentkezve: <?php echo $_SESSION['username']; ?> | <a href="logout.php">Kijelentkezés</a></li>
                <?php else: ?>
                    <li style="float:right;"><a href="login.php">Bejelentkezés</a> | <a href="register.php">Regisztráció</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

    <header>
        <div class="container">
            <h1> felület</h1>

        </div>
    </header>

    <main>
        <section id="">
            <h2>Beállítások</h2>
            <form>
                <label for="title">Weboldal címe:</label>
                <input type="text" id="title" name="title">

                <label for="content"> üzenet:</label>
                <textarea id="content" name="content"></textarea>

                <button type="submit">Mentés</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Vaszilij EDC |  felület.</p>
    </footer>






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