<?php

namespace modules\controllers;

class home_controller {
    public function execute() {
        (new \modules\views\home_view())->show();
    }
}