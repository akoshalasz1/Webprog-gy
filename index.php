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

        <!-- VIDEÓK -->
        <section class="video-section">
            <h2>Videók</h2>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/0VRhcXBykbs?si=wL22guTfGoHB5xrx" title="YouTube video player" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/UU_LxMNSBVk?si=c88lRYh4qXpIjdMw" title="YouTube video player" allowfullscreen></iframe>
            </div>
        </section>

        <!-- TÉRKÉP -->
        <section class="map-section">
            <h2>Hol találsz meg minket?</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.597935270483!2d19.13153787622275!3d47.47826397117836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c38e0a3ad247%3A0x9c3a38ff79366027!2sBudapest%2C%20Cserkesz%20u.%2032%2C%201105!5e0!3m2!1shu!2shu!4v1747837858748!5m2!1shu!2shu" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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