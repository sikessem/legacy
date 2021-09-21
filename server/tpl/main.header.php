<?php
use function SIKessEm\Net\Web\HTML\{
  attributes,
  className
};
?>
<header <?= className('header')?>>
  <h1><a <?= attributes(['href' => 'https://omninf.com/SIKessEm/', 'class' => 'logo', 'title' => $app_name . 'home']) ?>><?= $app_name ?></a></h1>
</header>
