<?php

ob_start();
require SERVER_DIR . 'tpl/widgets/home.view.php';
$view = ob_get_clean();

ob_start();
require SERVER_DIR . 'tpl/layouts/main.render.php';
$render = ob_get_clean();
exit($render);
