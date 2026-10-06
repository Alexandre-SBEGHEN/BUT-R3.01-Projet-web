<?php

namespace modules\controllers;

class about_controller {
    public function execute() {
        (new \modules\views\about_view())->show();
    }
}