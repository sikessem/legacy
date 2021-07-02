<?php

use SIKessEm\Organizer\SystemInterface as System;

function main(System $sys) {
    $settings = $sys->import('cfg.program');
    extract($settings);
    $content = $sys->save('doc.home', $settings);
    echo $content;
    exit;
}
