<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil — Mon Site</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <header class="site-header">
    <p class="logo">Mon Site</p>
    <nav>
      <a href="index.html" class="active">Accueil</a>
      <a href="page2.html">À propos</a>
    </nav>
  </header>

  <main>
    <section class="hero">
      <h1>Bienvenue</h1>
      <p>Voici un site très basique avec deux pages, une feuille de style compilée depuis Sass, et un peu de JavaScript.</p>
      <button id="action-btn">Clique-moi</button>
      <p id="click-count"></p>
    </section>
  </main>

  <footer>
    <p>&copy; <span id="year"></span> — Mon Site</p>
  </footer>

  <script src="scripts/script.js"></script>
</body>
</html>
