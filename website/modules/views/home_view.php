<?php

namespace modules\views;

require 'assets/includes/utils.inc.php';

class home_view {
    public function show(): void {
        template_view::html_begin('Cyber Cigales', 'Un Escape Game numérique pour apprendre à protéger tes données');
        template_view::page_header();
        echo <<< HTML
    <main>
        <h1>Cyber Cigales</h1>
    </main>

HTML;
        template_view::page_footer();
        template_view::html_end();
    }
}