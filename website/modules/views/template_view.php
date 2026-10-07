<?php
/**
 * template_view.php
 *
 * Template pour les pages du site web.
 *
 * Inclue notamment le header avec le menu de navigation,
 * ainsi que le footer avec les mentions légales et les autres
 * informations obligatoires.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\views;

use assets\includes\init;

class template_view {
    /**
     * Ouverture d'une page HTML
     *
     * L'insertion s'arrête après la balise <code>body</code>.
     *
     * @param string $title Titre de la page.
     * @param string $description Meta-description de la page.
     * @param array $css_names [Facultatif] Lien vers les styles CSS.
     * @return void
     */
    public static function html_begin(string $title, string $description, array $css_names = []): void {
        // Début, jusqu'aux CSS
        echo <<< HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>$title</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$description">
HTML;
        // Insertion des CSS
        if (count($css_names) > 0) {
            foreach ($css_names as $css_name) {
                echo "\n\t";
                echo '<link rel="stylesheet" href="' . init::getCSSDir() . '/' . $css_name . '">';
            }
        }
        // Fin
        echo <<< HTML

</head>
<body>

HTML;
    }

    /**
     * Fermeture d'une page HTML.
     *
     * Insère les balises de fermeture de <code>body</code> et <code>html</code>.
     *
     * @return void
     *
     * @see html_begin()
     */
    public static function html_end(): void {
        echo <<< HTML
</body>
</html>
HTML;
    }

    /**
     * Insère un header dans la page.
     *
     * Contient l'en-tête de la page avec notamment
     * le menu de navigation, le logo, etc.
     *
     * @param string $current_page Nom de la page actuelle (utilisé dans le navbar pour distinguer la page actuelle)
     *
     * @return void
     */
    public static function page_header(string $current_page = ''): void {
        // Liste des liens du navbar
        $navmenu_links = array(
            'Accueil' => '',
        );

        // Affichage dynamique Connexion / Déconnexion selon la session
        if (isset($_SESSION['user_id'])) {
            $navmenu_links['Déconnexion'] = 'logout';
        } else {
            $navmenu_links['Connexion'] = 'login';
        }

        $navmenu_links['A propos'] = 'about';

        // Logo svg de amU IUT
        $amu_iut_src = \assets\includes\init::getImagesDir() . '/header/amu_iut_blue_dark.svg';

        // Affichage du HTML
        echo <<< HTML
    <header>
        <nav class="navmenu">
            <a class="navmenu__title" href="/">CYBER<br>CIGALES</a>
            <ul class="navmenu__links">
HTML;
        // Insertion des liens
        foreach ($navmenu_links as $label => $href) {
            echo "\n\t\t\t\t";
            echo sprintf(
                '<li><a class="navmenu__link%s" href="%s">%s</a></li>',
                ($href === $current_page) ? ' navmenu__link--current' : '',
                ($href !== $current_page) ? '/' . $href : '#',
                $label
            );
        }
        echo <<< HTML

            </ul>
            <a href="https://iut.univ-amu.fr/" target="_blank" rel="noopener noreferrer"><img alt="amU IUT" src="$amu_iut_src" width="258" height="48" loading="lazy"></a>
        </nav>
    </header>

HTML;
    }

    /**
     * Insère un footer dans la page.
     *
     * Contient le bas de page avec notamment
     * les mentions légales.
     *
     * @return void
     */
    public static function page_footer(): void {
        // Liste des liens à insérer
        $footer_links = array(
            'Accueil' => '/',
            'Plan du site' => '/sitemap',
            'Mentions légales' => '/legal-notice',
            'Contact' => 'mailto:cyber-cigales@alwaysdata.net',
        );

        // Logo svg de amU IUT
        $cyber_cigales_src = \assets\includes\init::getImagesDir() . '/footer/cyber_cigales_black.svg';
        $amu_iut_src = \assets\includes\init::getImagesDir() . '/header/amu_iut_black.svg';

        echo <<< HTML
    <footer>
        <div class="footer">
            <div class="footer__strip"></div>
            <ul class="footer__logos">
                <li class="footer__logo"><a href="/"><img alt="Cyber Cigales" src="$cyber_cigales_src" width="205" height="128" loading="lazy"></a></li>
                <li class="footer__logo"><a href="https://github.com/Alexandre-SBEGHEN/BUT-R3.01-Projet-web" target="_blank" rel="noopener noreferrer"><img alt="GitHub Repo" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/github/github-original.svg" width="48" height="48" loading="lazy"></a></li>
                <li class="footer__logo"><a href="https://iut.univ-amu.fr/" target="_blank" rel="noopener noreferrer"><img alt="amU IUT" src="$amu_iut_src" width="258" height="48" loading="lazy"></a></li>
            </ul>
            <ul class="footer__links">
HTML;
        // Insertion des liens
        foreach ($footer_links as $label => $href) {
            echo "\n\t\t\t\t";
            echo sprintf(
                '<li class="footer__item"><a class="footer__link footer__text" href="%s">%s</a></li>',
                $href,
                $label
            );
        }
        echo <<< HTML

            </ul>
            <p class="footer__text">©2026 - Cyber Cigales</p>
        </div>
    </footer>

HTML;
    }
}