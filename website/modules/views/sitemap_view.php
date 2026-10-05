<?php

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
    <h1>Plan du site</h1>
HTML;

        template_view::page_footer();
        template_view::html_end();
    }
}