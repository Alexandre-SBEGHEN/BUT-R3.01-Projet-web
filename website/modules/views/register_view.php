<?php

namespace modules\views;

class register_view {
    public function show(): void {
        template_view::html_begin(
            title: 'Inscription',
            description: "Page d'inscription à Cyber Cigales",
            css_names: ['reset.css', 'fonts.css', 'header.css', 'footer.css']
        );
        template_view::page_header('register');

        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }

        echo <<< HTML
<div class="container">
    <h1>Inscription</h1>
    <form action="register" method="POST">
        <input type="text" name="prenom" placeholder="prenom" required>
        <br>
        <input type="text" name="nom" placeholder="nom" required>
        <br>
        <input type="email" name="email" placeholder="mail" required>
        <br>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <br>
        <button type="submit" name="register">S'inscrire</button>
        <p>Déjà un compte ? <a href="login">Se connecter</a></p>.
    </form>
</div>
HTML;

        template_view::page_footer();
        template_view::html_end();
    }
}