<?php

namespace modules\views;

require 'assets/includes/utils.inc.php';

class home_view {
    public function show(): void {
        html_start('Cyber Cigales', 'Un Escape Game numérique pour apprendre à protéger tes données');
        \modules\views\template_view::page_header();
        echo <<< HTML
    <main>
        <h1>Cyber Cigales</h1>
    </main>

HTML;
        \modules\views\template_view::page_footer();
        html_end();
    }
}