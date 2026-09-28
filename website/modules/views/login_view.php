<?php

namespace modules\views;

class login_view {
    public function show(): void {
        template_view::html_begin(
            title: 'Connexion',
            description: 'Page de connexion',
            css_names: ['reset.css', 'header.css', 'footer.css']
        );
        template_view::page_header('login');

        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }

        echo <<< HTML
<div class="container">
    <h1>Connexion</h1>
    <form action="login" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <br>
        <input type="email" name="mail" placeholder="email" required>
        <br>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <br>
        <button type="submit" name="login">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="">Inscription</a></p>
</div>
HTML;

        template_view::page_footer();
        template_view::html_end();
    }
}