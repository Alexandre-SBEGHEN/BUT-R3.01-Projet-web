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