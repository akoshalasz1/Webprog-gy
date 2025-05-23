<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kapcsolat</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            const name = document.forms["contactForm"]["name"].value;
            const email = document.forms["contactForm"]["email"].value;
            const message = document.forms["contactForm"]["message"].value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (name === "" || email === "" || message === "") {
                alert("Minden mezőt ki kell tölteni!");
                return false;
            }
            if (!emailPattern.test(email)) {
                alert("Érvénytelen email cím!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
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
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="username">👤 <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="logout.php" class="btn">Kijelentkezés</a>
                <?php else: ?>
                    <a href="login.php" class="btn">Bejelentkezés</a>
                    <a href="register.php" class="btn">Regisztráció</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <h1 class="centered">Kapcsolatfelvétel</h1>
        <div class="form-card">
            <form name="contactForm" action="submit_contact.php" method="POST" onsubmit="return validateForm();">
                <label for="name">Név:</label>
                <input type="text" id="name" name="name">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="subject">Tárgy:</label>
                <input type="text" id="subject" name="subject">

                <label for="message">Üzenet:</label>
                <textarea id="message" name="message"></textarea>

                <button type="submit">Küldés</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Vaszilij EDC | Minden jog fenntartva.</p>
    </footer>

    <script>
        const toggleButton = document.createElement('button');
        toggleButton.id = 'darkModeToggle';
        toggleButton.textContent = localStorage.getItem('darkMode') === 'true' ? '☀️ Light Mode' : '🌙 Dark Mode';
        document.body.appendChild(toggleButton);

        function applyDarkMode(enabled) {
            if (enabled) {
                document.documentElement.classList.add('dark-mode');
                toggleButton.textContent = '☀️ Light Mode';
            } else {
                document.documentElement.classList.remove('dark-mode');
                toggleButton.textContent = '🌙 Dark Mode';
            }
        }

        let darkMode = localStorage.getItem('darkMode') === 'true';
        applyDarkMode(darkMode);

        toggleButton.addEventListener('click', () => {
            darkMode = !darkMode;
            localStorage.setItem('darkMode', darkMode);
            applyDarkMode(darkMode);
        });
    </script>
</body>
</html>