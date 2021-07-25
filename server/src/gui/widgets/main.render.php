<!DOCTYPE html>
<html lang="en" id="ske" class="no-js doc">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $doc_title ?></title>
    <meta name="description" content="<?= $doc_description ?>"/>
    <link rel="fluid-icon" href="icon.png" title="<?= $app_name ?>"/>
    <link rel="mask-icon" href="logo.svg"/>
    <link rel="alternate icon" type="image/png" href="favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" href="boot.css" type="text/css"/>
  </head>
  <body class="view" onLoad="main();">
    <noscript>Javascript is required at <?= $app_name ?>. Please activate it to continue.</noscript>
    <div id="MainWrapper">
      <div class="main content centered">
        <div class="main-header"><?php require 'main.header.php' ?></div>
        <div class="main-view box centered"><?= $view ?></div>
        <div class="main-footer"><?php require 'main.footer.php' ?></div>
      </div>
    </div>
    <script type="application/javascript" src="boot.js" language="javascript"></script>
  </body>
</html>
