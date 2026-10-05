<?php

namespace modules\controllers;

class sitemap_controller {
    public function execute(): void {
        (new \modules\views\sitemap_view())->show();
    }
}