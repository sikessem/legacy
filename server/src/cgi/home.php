<?php
$doc_title = $app_author;
$doc_description = $app_author . 'develops full-time cross-platform programs and releases them using Git. '. $app_name .' repositories are available on Github. Discover them on its website.';

ob_start();
require SERVER_DIR . 'tpl/widgets/home.view.php';
$view = ob_get_clean();

ob_start();
require SERVER_DIR . 'tpl/layouts/main.render.php';
$render = ob_get_clean();
exit($render);
