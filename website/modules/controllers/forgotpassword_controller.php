<?php

namespace modules\controllers;

class forgotpassword_controller {
    public function execute() {
        (new \modules\views\forgotpassword_view())->show();
    }
}
