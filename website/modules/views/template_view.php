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
    public static function html_begin(string $title, string $description, string $css_path = ''): void {
        $css_element = ($css_path !== '') ? "\n\t<link rel='stylesheet' type='text/css' href='$css_path'>" : '';

        echo <<< HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>$title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$description">$css_element
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
     * @return void
     */
    public static function page_header(): void {
        echo <<< HTML
    <header>
        bonjour
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