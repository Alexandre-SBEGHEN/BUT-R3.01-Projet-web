<?php

namespace modules\views;

require 'assets/utils/utils.inc.php';

class home_view {
    public function show(): void {
        page_start('Cyber Cigales', 'Description');
        echo <<< HTML
    <h1>Cyber Cigales</h1>

HTML;
        page_end();
    }
}