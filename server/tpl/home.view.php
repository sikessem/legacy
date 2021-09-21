<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  className
};
echo element('main', className('home'), [
  element('div', className('heading'), element('h1', content: 'Get your appliance cheaply and on time')),
  element('div', className('content'), [
    element('div', className('subtitle'), element('p', content: "$app_author is a self-taught developer of websites, smartphone apps and cross-plateform software.")),
    element('div', className('items'), [
      element('ul', className('buttons list w box centered sa'), [
        element('li', className('item'), element('a', ['href' => 'https://omninf.com/SIKessEm/profile/', 'class' => 'button dark', 'title' => "All about $author_fullname"], "All about $app_name")),
        element('li', className('item'), element('a', ['href' => 'https://omninf.com/SIKessEm/contact/', 'class' => 'button light', 'title' => "Contact $author_fullname"], "Contact $app_name")),
      ])
    ])
  ])
]);