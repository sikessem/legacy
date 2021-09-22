<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  create,
  className
};

echo element('main', className('home'), [
  element('div', className('heading'), element('h1', content: 'Get your appliance cheaply and on time')),
  element('div', className('content'), [
    element('div', className('subtitle'), element('p', content: "$app_author is a self-taught developer of websites, smartphone apps and cross-plateform software.")),
    element('div', className('items'), [
      element('ul', className('buttons list w box centered sa'),
        create(2, 'li',
        with: className('item'),
        contents:
          create(2, 'a', 
          attributes: [
            ['href' => 'https://omninf.com/SIKessEm/profile/', className('button dark'), 'title' => "All about $author_fullname"],
            ['href' => 'https://omninf.com/SIKessEm/contact/', className('button light'), 'title' => "Contact $author_fullname"],
          ],
          contents: [
            "All about $app_name",
            "Contact $app_name",
          ]),
        )
      )
    ])
  ])
]);