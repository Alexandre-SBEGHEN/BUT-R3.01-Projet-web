<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required >
        <br>
        <input type="email" name="mail" placeholder="email" required>
        <br>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <br>
        <button type="submit" name="login">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="">Inscription</a></p>
</div>
</body>
</html>
