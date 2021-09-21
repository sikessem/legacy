<?php
use function SIKessEm\Net\Web\HTML\{
  element,
  attribute,
  className
};

return element('footer', className('footer'), [
  element('p', className('content centered'),
    element('a', attribute('href', 'home'),
      element('img', ['src' => 'icon.png', 'alt' => 'icon', 'width' => '48px', 'height' => '48px', 'style' => 'padding:4px;border-radius:50%;object-fit:cover;']),
    )
  ),
  element('nav', className('items'), [
    element('dl', className('list box'),
      element('div', className('column'),
        element('dt', content: [
          'About Me',
          element('span', className('underline'))
        ]),
        element('dd', className('about'), [
          element('p', content: "$author_fullname is a self-taught developer of websites, smartphone apps and cross-plateform software."),
          element('p', content: element('a', attribute('href', 'about'), "All about $author_shortname"))
        ])
      ),
      element('div', className('column'), [
        element('dt', content: [
          'Follow Me',
          element('span', className('underline'))
        ]),
        element('dd', content: [
          element('ul', className('list'), [
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_github], 'Github')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_packagist], 'Packagist')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_npmjs], 'NPM')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_linkedin], 'LinkedIn')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_twitter], 'Twitter')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_whatsapp], 'WhatsApp')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_youtube], 'Youtube')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_facebook], 'Facebook')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_instagram], 'Instagram')),
            element('li', className('item'), element('a', ['class' => 'link', 'href' => $author_pinterest], 'Pinterest')),
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
            element('textarea', [className('entry'), 'name' => 'compose', 'placeholder' => 'Compose email&hellip;', 'required' => 'required']),
            element('button', [className('button'), 'name' => 'send', 'type' => 'button', 'value' => 'ok'], 'Send mail'),
          ])
        ])
      ])
    )
  ]),
  element('p', className('copyright content centered'), [
    element('a', [className('link'), 'title' => 'Copyright', 'href' => 'copyright'], $app_name . ' &copy; ' . (date('Y') > 2021 ? 2021 . ' - ' . date('Y') : 2021)),
    ' &mdash; All right reserved',
  ]),
]);