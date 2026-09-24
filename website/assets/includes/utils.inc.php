<?php

function html_start(string $title, string $description, string $css_path = ''): void {
    $css_element = ($css_path !== '') ? "\n\t<link rel='stylesheet' type='text/css' href='$css_path'>" : '';

    echo <<< HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>$title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="$description">$css_element
</head>
<body>

HTML;
}

function html_end(): void {
    echo <<< HTML
</body>
</html>
HTML;
}