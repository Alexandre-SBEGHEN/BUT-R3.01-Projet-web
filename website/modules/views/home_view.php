<?php

namespace modules\views;

require '_assets/utils/utils.inc.php';

class home_view {
    public function show(): void { page_start('Cyber Cigales', 'a'); ?>
<h1>Cyber Cigales</h1>
<?php page_end(); }
}