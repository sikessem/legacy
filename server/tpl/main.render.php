<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  attribute,
  className
};

echo '<!DOCTYPE html>' .
element('html', ['lang' => 'en', 'id' => 'ske', className('no-js doc')], [
  element('head',
    content: [
      element('meta', attribute('charset', 'UTF-8')),
      element('base', attribute('href', '/')),
      element('meta', ['http-equiv' => 'X-UA-Compatible', 'content' => 'ie=edge']),
      element('meta', ['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1.0']),
      element('title', content: $doc_title),
      element('meta', ['name' => 'description', 'content' => $doc_description]),
      element('link', ['rel' => 'fluid-icon', 'href' => 'icon.png', 'title' => $app_name]),
      element('link', ['rel' => 'mask-icon', 'href' => 'logo.svg']),
      element('link', ['rel' => 'alternate icon', 'type' => 'image/png', 'href' => 'favicon.png']),
      element('link', ['rel' => 'shortcut icon', 'type' => 'image/png', 'href' => 'favicon.png']),
      element('link', ['rel' => 'icon', 'type' => 'image/x-icon', 'href' => 'favicon.ico']),
      element('link', ['rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'boot.css']),
    ]
  ),
  element('body', [className('view'), 'onLoad' => 'main();'],
  content: [
    element('noscript', content: "Javascript is required at $app_name. Please activate it to continue."),
    element('div', attribute('id', 'MainWrapper'),
      element('div', className('main content centered'), [
        element('div', className('main-header'), require 'main.header.php'),
        element('div', className('main-view box centered'), $view),
        element('div', className('main-footer'), require 'main.footer.php'),
      ])
    ),
    element('script', ['type' => 'application/javascript', 'src' => 'boot.js', 'language' => 'javascript']),
  ])
]);