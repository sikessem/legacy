<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  create,
  className
};

return element('footer', className('footer'), [
  element('p', className('content centered'),
    element('a', ['href' => 'home'],
      element('img', ['src' => 'icon.png', 'alt' => 'icon', 'width' => '48px', 'height' => '48px', 'style' => 'padding:4px;border-radius:50%;object-fit:cover;']),
    )
  ),
  element('nav', className('items'), [
    element('dl', className('list box'), [
      element('div', className('column'), [
        element('dt', content: [
          'About Me',
          element('span', className('underline'))
        ]),
        element('dd', className('about'), [
          create(2, 'p', contents: [
            "$author_fullname is a self-taught developer of websites, smartphone apps and cross-plateform software.",
            element('a', ['href' => 'about'], "All about $author_shortname")
          ]),
        ])
      ]
      ),
      element('div', className('column'), [
        element('dt', content: [
          'Follow Me',
          element('span', className('underline'))
        ]),
        element('dd', content: [
          element('ul', className('list'), [
            create(10, 'li',
              with: className('item'),
              contents: create(10, 'a', 
                with: className('link'),
                attributes: [
                  'href' => $author_github,
                  'href' => $author_packagist,
                  'href' => $author_npmjs,
                  'href' => $author_linkedin,
                  'href' => $author_twitter,
                  'href' => $author_whatsapp,
                  'href' => $author_youtube,
                  'href' => $author_facebook,
                  'href' => $author_instagram,
                  'href' => $author_pinterest,
                ],
                contents: [
                  'Github',
                  'Packagist',
                  'NPM',
                  'LinkedIn',
                  'Twitter',
                  'WhatsApp',
                  'Youtube',
                  'Facebook',
                  'Instagram',
                  'Pinterest',
                ]
              )
            ),
          ])
        ])
      ]),
      element('div', className('column'), [
        element('dt', content: [
          'Contact Me',
          element('span', className('underline'))
        ]),
        element('dd', content: [
          element('form', ['action' => 'contact', 'method' => 'POST'], [
            element('input', [className('entry'), 'type' => 'email', 'name' => 'address', 'placeholder' => 'Type your address', 'required' => 'required']),
            element('input', [className('entry'), 'type' => 'text', 'name' => 'subject', 'placeholder' => 'Type your subject', 'required' => 'required']),
            element('textarea', [className('entry'), 'name' => 'compose', 'placeholder' => 'Compose email&hellip;', 'required' => 'required'], ''),
            element('button', [className('button'), 'name' => 'send', 'type' => 'button', 'value' => 'ok'], 'Send mail'),
          ])
        ])
      ])
    ])
  ]),
  element('p', className('copyright content centered'), [
    element('a', [className('link'), 'title' => 'Copyright', 'href' => 'copyright'], $app_name . ' &copy; ' . (date('Y') > 2021 ? 2021 . ' - ' . date('Y') : 2021)),
    ' &mdash; All right reserved',
  ]),
]);