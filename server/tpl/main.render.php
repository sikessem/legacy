<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  create,
  className
};

echo '<!DOCTYPE html>' .
element('html', ['lang' => 'en', 'id' => 'ske', className('no-js doc')], [
  element('head',
    content: [
      create(4, 'meta', [
        ['charset' => 'UTF-8'],
        ['http-equiv' => 'X-UA-Compatible', 'content' => 'ie=edge'],
        ['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1.0'],
        ['name' => 'description', 'content' => $doc_description],
      ]),
      element('base', ['href' => '/']),
      element('title', content: $doc_title),
      create(6, 'link', [
        ['rel' => 'fluid-icon', 'href' => 'icon.png', 'title' => $app_name],
        ['rel' => 'mask-icon', 'href' => 'logo.svg'],
        ['rel' => 'alternate icon', 'type' => 'image/png', 'href' => 'favicon.png'],
        ['rel' => 'shortcut icon', 'type' => 'image/png', 'href' => 'favicon.png'],
        ['rel' => 'icon', 'type' => 'image/x-icon', 'href' => 'favicon.ico'],
        ['rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'boot.css'],
      ]),
    ]
  ),
  element('body', [className('view'), 'onLoad' => 'main();'],
  content: [
    element('noscript', content: "Javascript is required at $app_name. Please activate it to continue."),
    element('div', ['id' => 'MainWrapper'],
      element('div', className('main content centered'), [
        create(3, 'div', [
          className('main-header'),
          className('main-view box centered'),
          className('main-footer'),
        ], [
          require 'main.header.php',
          $view,
          require 'main.footer.php',
        ]),
      ])
    ),
    element('script', ['type' => 'application/javascript', 'src' => 'boot.js', 'language' => 'javascript'], ''),
  ])
]);