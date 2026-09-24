<?php

function page_start(string $title, string $description, string $css_path = ''): void {?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description; ?>">
    <?php if (!empty($css_path)) { echo '<link rel="stylesheet" href="' . $css_path . '" >'; }  ?>
</head>
<body><?php
}

function page_end(): void {?>
</body>
</html><?php
}