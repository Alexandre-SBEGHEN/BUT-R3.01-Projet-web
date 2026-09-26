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
        template_view::html_begin('Cyber Cigales', 'Un Escape Game numérique pour apprendre à protéger tes données');
        template_view::page_header();
        echo <<< HTML
    <main>
        <p>main</p>
    </main>

HTML;
        template_view::page_footer();
        template_view::html_end();
    }
}