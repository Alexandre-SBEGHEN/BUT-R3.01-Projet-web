<?php

namespace modules\controllers;

class login_controller {
    public function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new authentication_controller())->execute();
        }
    }
}
