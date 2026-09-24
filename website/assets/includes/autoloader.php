<?php


function autoload(string $class): void {
    $root = dirname(__DIR__, 2);
    $path = $root . '/' . str_replace('\\', '/', $class) . '.php';

    if (is_file($path)) {
        require $path;
    }
}

spl_autoload_register('autoload');