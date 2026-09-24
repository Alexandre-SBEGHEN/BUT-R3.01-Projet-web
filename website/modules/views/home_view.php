<?php

namespace modules\views;

require 'assets/includes/utils.inc.php';

class home_view {
    public function show(): void {
        html_start('Cyber Cigales', 'Description');
        echo <<< HTML
    <h1>Cyber Cigales</h1>

HTML;
        html_end();
    }
}