<?php
/**
 * home_view.php
 *
 * Page d'accueil du site web.
 *
 * Sert de vitre et de point d'orientation
 * pour les utilisateurs arrivant dans le site.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\views;

class home_view {
    /**
     * Afficher la page d'accueil en HTML.
     *
     * @return void
     */
    public function show(): void {
        template_view::html_begin(
            'Cyber Cigales',
            'Un Escape Game numérique pour apprendre à protéger tes données',
            ['reset.css', 'fonts.css', 'header.css', 'home.css', 'footer.css'],
        );
        template_view::page_header();
        echo <<< HTML
    <main class="home">
        <section class="home__intro">
            <h1>Bienvenue sur Cyber Cigales</h1>
            <p>Un escape game numérique pour apprendre à protéger tes données.</p>
            <a class="home__button" href="/login">Jouer</a>
        </section>

        <section class="home__principe">
            <h2>Le principe</h2>
            <ul class="home__etapes">
                <li class="home__etape">
                    <h3>1. Connecte-toi</h3>
                    <p>Crée ton compte pour sauvegarder ta progression.</p>
                </li>
                <li class="home__etape">
                    <h3>2. Résous les énigmes</h3>
                    <p>Chaque énigme parle d'un risque en particulier !</p>
                </li>
                <li class="home__etape">
                    <h3>3. Réussis à t'échapper</h3>
                    <p>Termine le jeu et retiens les bonnes méthode !.</p>
                </li>
            </ul>
        </section>
    </main>

HTML;
        template_view::page_footer();
        template_view::html_end();
    }
}