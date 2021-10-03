<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  className
};

return element('header',
  className('header'),
  element('h1', content: element('a', ['href' => 'https://omninf.com/SIKessEm/', className('logo'), 'title' => $app_name . ' home'], $app_name))
);