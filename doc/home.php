<?php
$app_name = 'SIKessEm';
$app_owner = 'SIGUI Kessé Emmanuel';
$app_author = $app_name.' ('. $app_owner . ')';
?>
<!DOCTYPE html>
<html lang="en" id="ske" class="no-js doc">
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
    <link rel="stylesheet" href="boot.css" type="text/css"/>
  </head>
  <body class="view" onLoad="main();">
    <noscript>Javascript is required at <?= $app_name ?>. Please activate it to continue.</noscript>
    <div id="MainWrapper" class="box centered">
      <div class="main content centered">
        <div class="heading">
          <header>
            <h1><a href="https://omninf.com/SIKessEm/" class="logo" title="<?= $app_name ?> home"><?= $app_name ?></a></h1>
          </header>
        </div>
        <div class="container">
          <main class="home">
            <div class="heading">
              <h1>Get your appliance cheaply and on time</h1>
            </div>
            <div class="content">
              <div class="subtitle">
                <p><?= $app_author ?> is a self-taught developer of websites, smartphone apps and cross-plateform software.</p>
              </div>
              <div class="items">
                <ul class="buttons list w box centered sa">
                  <li class="item"><a href="https://omninf.com/SIKessEm/profile/" class="button dark" title="All about <?= $app_owner?>">All about <?= $app_name?></a></li>
                  <li class="item"><a href="https://omninf.com/SIKessEm/contact/" class="button light" title="Contact <?= $app_owner?>">Contact <?= $app_name?></a></li>
                </ul>
              </div>
            </div>
          </main>
        </div>
        <div class="footing">
          <footer>
            <nav class="items">
              <ul class="links list centered sb">
                <li class="item"><a href="https://omninf.com/SIKessEm/spaces/" class="link" title="Go to <?= $app_name ?> spaces"><?= $app_name ?> spaces</a></li>
                <li class="item"><a href="https://omninf.com/SIKessEm/places/" class="link" title="Go to <?= $app_name ?> places"><?= $app_name ?> places</a></li>
              </ul>
            </nav>
          </footer>
        </div>
      </div>
    </div>
    <script type="application/javascript" src="boot.js" language="javascript"></script>
  </body>
</html>
