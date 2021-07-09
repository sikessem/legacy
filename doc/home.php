<?php
$app_name = 'SIKessEm';
$app_owner = 'SIGUI Kessé Emmanuel';
$app_author = $app_name.' ('. $app_owner . ')';
?>
<!DOCTYPE html>
<html lang="en" id="ske" class="nojs doc">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $app_author ?></title>
    <meta name="description" content="<?= $app_author ?>) develops full-time cross-platform programs and releases them using Git. <?= $app_name ?> repositories are available on Github. Discover them on its website."/>
    <link rel="fluid-icon" href="icon.png" title="<?= $app_name ?>"/>
    <link rel="mask-icon" href="logo.svg"/>
    <link rel="alternate icon" type="image/png" href="favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" href="visual.css" type="text/css"/>
  </head>
  <body>
    <noscript>Javascript is required at <?= $app_name ?>. Please activate it to continue.</noscript>
    <div id="MainWrapper">
      <div class="main layout">
        <div class="heading">
          <header class="box">
            <h1><a href="home" class="logo" title="<?= $app_name ?> home"><?= $app_name ?></a></h1>
            <p><a href="menu" class="icon" title="<?= $app_name ?> menu">Menu</a></p>
          </header>
        </div>
        <div class="content">
          <main class="home box">
            <div class="heading">
              <h1 class="heading">Get your application cheaply on time</h1>
            </div>
            <div class="content">
              <div class="subtitle">
                <p><?= $app_author ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
              </div>
              <div class="items">
                <ul class="buttons list">
                  <li class="item"><a href="about" class="button" title="All about <?= $app_owner?>">All about <?= $app_name?></a></li>
                  <li class="item"><a href="about" class="button" title="Contact <?= $app_owner?>">Contact <?= $app_name?></a></li>
                </ul>
              </div>
            </div>
          </main>
        </div>
        <div class="footing">
          <footer>
            <nav class="items">
              <ul class="links list">
                <li class="item"><a href="space" class="link" title="Go to <?= $app_name ?> spaces"><?= $app_name ?> spaces</a></li>
                <li class="item"><a href="space" class="link" title="Go to <?= $app_name ?> places"><?= $app_name ?> places</a></li>
              </ul>
            </nav>
          </footer>
        </div>
      </div>
    </div>
    <script type="applcation/javascript" src="responsive.js" language="javascript"></script>
  </body>
</html>
