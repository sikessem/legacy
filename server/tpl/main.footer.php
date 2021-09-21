<?php
use function SIKessEm\Net\Web\HTML\{
  attributes,
  attribute,
  className
};
?>
<footer <?= className('footer') ?>>
  <p <?= className('content centered') ?>><a <?= attribute('href', 'home') ?>><img <?= attributes(['src' => 'icon.png', 'alt' => 'icon', 'width' => '48px', 'height' => '48px', 'style' => 'padding:4px;border-radius:50%;object-fit:cover;']) ?>/></a></p>
  <nav <?= className('items') ?>>
    <dl <?= className('list box') ?>>
      <div <?= className('column') ?>>
        <dt>About Me<span <?= className('underline') ?>></span></dt>
        <dd <?= className('about') ?>>
          <p><?= $author_fullname ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
          <p><a <?= attribute('href', 'about') ?>>All about <?= $author_shortname ?></a></p>
        <dd>
      </div>
      <div <?= className('column') ?>>
        <dt>Follow Me<span <?= className('underline') ?>></span></dt>
        <dd>
          <ul <?= className('list') ?>>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_github]) ?>>Github</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_packagist]) ?>>Packagist</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_npmjs]) ?>>NPM</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_linkedin]) ?>>LinkedIn</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_twitter]) ?>>Twitter</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_whatsapp]) ?>>WhatsApp</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_youtube]) ?>>Youtube</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_facebook]) ?>>Facebook</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_instagram]) ?>>Instagram</a></li>
            <li <?= className('item') ?>><a <?= attributes(['class' => 'link', 'href' => $author_pinterest]) ?>>Pinterest</a></li>
          </ul>
        <dd>
      </div>
      <div <?= className('column') ?>>
        <dt>Contact Me<span <?= className('underline') ?>></span></dt>
        <dd>
          <form <?= attributes(['action' => 'contact', 'method' => 'POST']) ?>>
            <input <?= attributes(['class' => 'entry', 'type' => 'email', 'name' => 'address', 'placeholder' => 'Type your address', 'required' => 'required']) ?>/>
            <input <?= attributes(['class' => 'entry', 'type' => 'text', 'name' => 'subject', 'placeholder' => 'Type your subject', 'required' => 'required']) ?>/>
            <textarea <?= attributes(['class' => 'entry', 'name' => 'compose', 'placeholder' => 'Compose email&hellip;', 'required' => 'required']) ?>></textarea>
            <button <?= attributes(['class' => 'button', 'name' => 'send', 'type' => 'button', 'value' => 'ok']) ?>>Send mail</button>
          </form>
        <dd>
      </div>
    </dl>
  </nav>
  <p <?= className('copyright content centered') ?>><a <?= attributes(['class' => 'link', 'title' => 'Copyright', 'href' => 'copyright']) ?>><?= $app_name . ' &copy; ' . (date('Y') > 2021 ? 2021 . ' - ' . date('Y') : 2021) ?></a> <?= $author_fullname ?> &mdash; All right reserved</p>
</footer>
