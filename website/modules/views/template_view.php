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
     * @param string $css_path [Facultatif] Lien vers les styles CSS.
     * @return void
     */
    public static function html_begin(string $title, string $description, array $css_names = []): void {
        // $css_element = ($css_path !== '') ? "\n\t<link rel='stylesheet' type='text/css' href='$css_path'>" : '';

        // Début, jusqu'aux CSS
        echo <<< HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>$title</title>
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
     * Contient l'en-tête du de la page avec notamment
     * le menu de navigation, le logo, etc.
     *
     * @param string $current_page Nom de la page actuelle (utilisé dans le navbar pour distinguer la page actuelle)
     *
     * @return void
     */
    public static function page_header(string $current_page=''): void {
        // Liste des liens du navbar
        $navmenu_links = array(
            'Home' => '',
            'Login' => 'login',
            'About' => 'about',
        );

        // Logo svg de amU IUT
        $amu_iut_src = \assets\includes\init::getImagesDir() . '/header/amu_iut.svg';

        // Affichage du HTML
        echo <<< HTML
    <header>
        <nav class="navmenu">
            <a class="navmenu__title" href="/">Cyber Cigales</a>
            <ul class="navmenu__links">
HTML;
        // Insertion des liens
        foreach ($navmenu_links as $label => $href) {
            echo "\n\t\t\t\t";
            echo sprintf(
                '<li><a class="navmenu__link%s" href="/%s">%s</a></li>',
                ($href === $current_page) ? ' navmenu__link--current' : '',
                $href,
                $label
            );
        }
        echo <<< HTML

            </ul>
            <a href="https://iut.univ-amu.fr/"><img alt="amU IUT" src="$amu_iut_src" loading="lazy"></a>
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
        echo <<< HTML
    <footer>
    </footer>

HTML;
    }
}