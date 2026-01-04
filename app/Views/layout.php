<?php
// app/Views/layout.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Gestion de tâches</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-tasks"></i>
                    <h1>TaskFlow</h1>
                </div>
                <nav class="main-nav">
                    <a href="/" class="btn btn-outline">
                        <i class="fas fa-home"></i>
                        Accueil
                    </a>
                    <a href="/add" class="btn">
                        <i class="fas fa-plus"></i>
                        Nouvelle tâche
                    </a>
                    <a href="/stats" class="btn btn-outline">
                        <i class="fas fa-chart-bar"></i>
                        Statistiques
                    </a>
                </nav>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="container">
            <?php if (isset($_SESSION['flash_message'])): ?>
                <div class="flash-message">
                    <?php echo $_SESSION['flash_message']; unset($_SESSION['flash_message']); ?>
                </div>
            <?php endif; ?>
            
            <?php echo $content; ?>
        </div>
    </main>
    
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; <?php echo date('Y'); ?> TaskFlow - Application de gestion de tâches</p>
                <div class="footer-links">
                    <a href="/about">À propos</a> |
                    <a href="/contact">Contact</a> |
                    <a href="/privacy">Confidentialité</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="/public/js/app.js"></script>
</body>
</html>