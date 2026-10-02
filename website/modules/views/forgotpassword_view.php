<?php

namespace modules\views;

class forgotpassword_view {
    public function show(): void {
        template_view::html_begin(
            title: 'Mot de passe oublié',
            description: 'Page du mdp oublié',
            css_names: ['reset.css', 'header.css', 'footer.css']
        );
        template_view::page_header('forgotpassword');

        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }

        echo <<< HTML
<div class="container">
    <h1>Mot de passe oublié</h1>
    <form action="forgotpassword" method="POST">
        <input type="email" name="mail" placeholder="email" required>
        <br>
        <button type="submit" name="submit">lien de réinitialisation </button>
    </form>
</div>
HTML;

        template_view::page_footer();
        template_view::html_end();
    }
}