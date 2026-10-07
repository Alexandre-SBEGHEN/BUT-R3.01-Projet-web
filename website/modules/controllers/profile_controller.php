<?php

namespace modules\controllers;

class profile_controller {

    public function execute() {
        if(!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        (new \modules\views\profile_view())->show($_SESSION['user']);
    }
}