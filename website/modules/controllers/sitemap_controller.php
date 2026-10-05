<?php
/**
 * sitemap_controller.php
 *
 * Contrôleur de la page Plan du site.
 *
 * @author Alexandre SBEGHEN
 */

namespace modules\controllers;

class sitemap_controller {
    public function execute(): void {
        (new \modules\views\sitemap_view())->show();
    }
}