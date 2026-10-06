<?php

namespace modules\controllers;

class legal_notice_controller {
    public function execute() {
        (new \modules\views\legal_notice_view())->show();
    }
}