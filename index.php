<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Vaszilij EDC</title>
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
<main>
    <?php if (isset($_SESSION['message'])) { echo "<p class='message'>" . $_SESSION['message'] . "</p>"; unset($_SESSION['message']); } ?>
    <section id="home">
        <h2>Üdvözöllek!</h2>
        <p>Ez a Vaszilij EDC – egy magyar every day carry közösség ja. Kések, felszerelések, tesztek és élmények!</p>
    </section>

    <section id="">
        <h2>bejegyzések</h2>
        <article><h3>Ganzo G704 bemutató</h3><p>Részletes elemzés egy költséghatékony és megbízható folder késről.</p></article>
        <article><h3>Outdoor felszerelések 2025</h3><p>Milyen eszközökre számíthatunk idén? Megnéztük a legjobbakat.</p></article>
        <article><h3>EDC elrendezés tippek</h3><p>Hogyan rendszerezzük az EDC felszerelésünket hatékonyan?</p></article>
    </section>

    <section id="contact">
        <h2>Kapcsolat</h2>
        <form>
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="subject">Tárgy:</label>
            <input type="text" id="subject" name="subject">
            <label for="message">Üzenet:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Küldés</button>
        </form>
    </section>
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