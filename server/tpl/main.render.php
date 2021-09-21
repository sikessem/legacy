<?php
use function SIKessEm\Net\Web\HTML\{
  attributes,
  attribute,
  className
};
?>
<!DOCTYPE html>
<html <?= attributes(['lang' => 'en', 'id' => 'ske', 'class' => 'no-js doc']) ?>>
  <head>
    <meta <?= attribute('charset', 'UTF-8') ?>/>
    <base <?= attribute('href', '/') ?>/>
    <meta <?= attributes(['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1.0']) ?>/>
    <meta <?= attributes(['http-equiv' => 'X-UA-Compatible', 'content' => 'ie=edge']) ?>/>
    <title><?= $doc_title ?></title>
    <meta <?= attributes(['name' => 'description', 'content' => $doc_description]) ?>/>
    <link <?= attributes(['rel' => 'fluid-icon', 'href' => 'icon.png', 'title' => $app_name]) ?>/>
    <link <?= attributes(['rel' => 'mask-icon', 'href' => 'logo.svg']) ?>/>
    <link <?= attributes(['rel' => 'alternate icon', 'type' => 'image/png', 'href' => 'favicon.png']) ?>/>
    <link <?= attributes(['rel' => 'shortcut icon', 'type' => 'image/png', 'href' => 'favicon.png']) ?>/>
    <link <?= attributes(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => 'favicon.ico']) ?>/>
    <link <?= attributes(['rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'boot.css']) ?>/>
  </head>
  <body <?= attributes(['class' => 'view', 'onLoad' => 'main();']) ?>>
    <noscript>Javascript is required at <?= $app_name ?>. Please activate it to continue.</noscript>
    <div <?= attribute('id', 'MainWrapper')?>>
      <div <?= className('main content centered') ?>>
        <div <?= className('main-header') ?>><?php require 'main.header.php' ?></div>
        <div <?= className('main-view box centered') ?>><?= $view ?></div>
        <div <?= className('main-footer') ?>><?php require 'main.footer.php' ?></div>
      </div>
    </div>
    <script <?= attributes(['type' => 'application/javascript', 'src' => 'boot.js', 'language' => 'javascript']) ?>></script>
  </body>
</html>
