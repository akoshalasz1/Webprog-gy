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
            <h1>Vaszilij EDC </h1>
        </div>
    </header>

    <main>
        
<section id="">
  <h2>Legújabb cikkek</h2>
  <div class="-cards">
    <div class="card">
      <img src="https://images.pexels.com/photos/65128/pexels-photo-65128.jpeg" alt="Múlt, jelen, jövő">
      <h3>Múlt, jelen, jövő</h3>
      <p>Visszatekintés a Vaszilij EDC történetére és jövőbeli terveire.</p>
      <a href="https://vaszilijedc.hu/mult-jelen-jovo/" target="_blank">Tovább olvasom</a>
    </div>
    <div class="card">
      <img src="https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg" alt="Kések és edukáció">
      <h3>Kések és edukáció</h3>
      <p>Az edukáció szerepe a késkultúrában és a mindennapi hordásban.</p>
      <a href="https://vaszilijedc.hu/kesek-es-edukacio/" target="_blank">Tovább olvasom</a>
    </div>
    <div class="card">
      <img src="https://images.pexels.com/photos/3408744/pexels-photo-3408744.jpeg" alt="Karácsonyi ajánló 2022">
      <h3>Karácsonyi ajánló 2022</h3>
      <p>Ajándékötletek a késrajongóknak az ünnepekre.</p>
      <a href="https://vaszilijedc.hu/karacsonyi-ajanlo-2022/" target="_blank">Tovább olvasom</a>
    </div>
  </div>
</section>

    </main>

    <footer>
        <p>&copy; 2025 Vaszilij EDC |  oldal.</p>
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