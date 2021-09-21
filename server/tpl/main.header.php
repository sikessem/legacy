<?php

use function SIKessEm\Net\Web\HTML\className;
use function SIKessEm\Net\Web\HTML\element;
echo element('header', className('header'),
  (string) element('h1',
    content:(string) element('a', ['href' => 'https://omninf.com/SIKessEm/', 'class' => 'logo', 'title' => $app_name . ' home'], $app_name))
);