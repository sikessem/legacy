<?php

return function ($client): callable {
  return function ($server, $options) {

    extract($options, EXTR_PREFIX_IF_EXISTS, '_');

    $options['doc_title'] = $app_author;
    $options['doc_description'] = $app_author . ' develops full-time cross-platform programs and releases them using Git. ' . $app_name . ' repositories are available on Github. Discover them on its website.';

    $options['view'] = $server->getTemplateRender('home.view', $options);
    $render = $server->getTemplateRender('main.render', $options);
    exit($render);
  };
};