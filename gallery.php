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
            <h1></h1>
        </div>
    </header>

    <main>
        
<section id="gallery">
    <h2></h2>
    

<div class="gallery">
    <img class="gallery-image" src="https://images.pexels.com/photos/65128/pexels-photo-65128.jpeg" alt="Múlt, jelen, jövő">
    <img class="gallery-image" src="https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg" alt="Kések és edukáció">
    <img class="gallery-image" src="https://images.pexels.com/photos/3408744/pexels-photo-3408744.jpeg" alt="Karácsonyi ajánló 2022">
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

<div id="lightboxModal" class="lightbox-modal" style="display:none;">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <span class="lightbox-prev" onclick="prevImage()">&#10094;</span>
    <div class="lightbox-wrapper">
        <img class="lightbox-content" id="lightboxContent" src="" alt="">
    </div>
    <span class="lightbox-next" onclick="nextImage()">&#10095;</span>
</div>

<script>
let currentIndex = 0;
let images = [];

document.addEventListener('DOMContentLoaded', () => {
    images = Array.from(document.querySelectorAll('.gallery-image'));
    images.forEach((img, index) => {
        img.style.cursor = 'pointer';
        img.addEventListener('click', (e) => {
            e.preventDefault();
            openLightbox(index);
        });
    });
});

function openLightbox(index) {
    currentIndex = index;
    const modal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxContent');
    const targetImg = images[currentIndex];

    if (targetImg.hasAttribute('data-large')) {
        lightboxImg.src = targetImg.getAttribute('data-large');
    } else {
        lightboxImg.src = targetImg.src;
    }

    modal.style.display = 'flex';
}

function closeLightbox() {
    document.getElementById('lightboxModal').style.display = 'none';
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    openLightbox(currentIndex);
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    openLightbox(currentIndex);
}
</script>

</body>
</html>