<?php
use function SIKessEm\Net\Web\HTML\{
  attributes,
  className
};
?>
<main <?= className('home') ?>>
  <div <?= className('heading') ?>>
    <h1>Get your appliance cheaply and on time</h1>
  </div>
  <div <?= className('content') ?>>
    <div <?= className('subtitle') ?>>
      <p><?= $app_author ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
    </div>
    <div <?= className('items') ?>>
      <ul <?= className('buttons list w box centered sa') ?>>
        <li <?= className('item') ?>><a <?= attributes(['href' => 'https://omninf.com/SIKessEm/profile/', 'class' => 'button dark', 'title' => "All about $author_fullname"]) ?>>All about <?= $app_name?></a></li>
        <li <?= className('item') ?>><a <?= attributes(['href' => 'https://omninf.com/SIKessEm/contact/', 'class' => 'button light', 'title' => "Contact $author_fullname"]) ?>>Contact <?= $app_name?></a></li>
      </ul>
    </div>
  </div>
</main>
