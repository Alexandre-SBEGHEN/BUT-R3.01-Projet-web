<?php
/**
 * sitemap_view.php
 *
 * Vue de la page Plan du site.
 *
 * Affiche sous forme de liste non hiérarchisée l'ensemble des
 * pages du site web, afin de permettre aux utilisateurs d'accéder
 * rapidement à n'importe quelle page sans passer par le menu
 * de navigation.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\views;

class sitemap_view {
    public function show(): void {
        template_view::html_begin(
            'Plan du site',
            'Toutes les pages du site non hiérarchisées',
            ['reset.css', 'fonts.css', 'header.css', 'footer.css']
        );
        template_view::page_header('sitemap');

        echo <<< HTML
    <main class="sitemap">
        <h1 class="sitemap__title">Plan du site</h1>
        <ul class="sitemap__links">
HTML;
        // Liens
        $links = array(
            'Accueil' => '',
            'Connexion' => 'login',
            'A propos' => 'about',
            'Mentions légales' => 'legal-notice',
            'Données personnelles' => 'personal-data',
            'Plan du site' => 'sitemap',
        );
        foreach ($links as $label => $href) {
            echo "\n\t\t\t";
            echo sprintf(
                '<li class="sitemap__link"><a class="sitemap_text" href="/%s">%s</a></li>',
                $href,
                $label
            );
        }

        echo <<< HTML

        </ul>
    </main>

HTML;

        template_view::page_footer();
        template_view::html_end();
    }
}