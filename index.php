<?php

const APP_NAME = 'SIKessEm';
const APP_DOMAIN = 'sikessem.com';
const APP_HOME = '/';
const APP_PORT = 80;
const APP_LANG = 'fr';

const DEV_NAME = 'SIGUI Kessé Emmanuel';
const DEV_EMAIL = 'developer@sikessem.com';
const DEV_HOME = 'https://sikessem.com';

function secure(): bool {
	return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
}

function scheme(): string {
	return secure() ? 'https' : 'http';
}

function host(): string {
	return $_SERVER['HTTP_HOST'] ?? APP_DOMAIN;
}

function port(): int {
	return $_SERVER['SERVER_PORT'] ?? APP_PORT;
}

function uri(): string {
	return $_SERVER['REQUEST_URI'] ?? APP_HOME;
}

function path(string $name = null): string {
	return scheme() . '://' . host() . (port() !== 80 ? ':' . port() : '') . ($name ? '/' . $name : '');
}
?>
<!DOCTYPE html>
<html lang="<?= APP_LANG ?>">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="<?= APP_LANG ?>"/>
		<meta name="author" content="<?= DEV_NAME ?>"/>
		<meta name="description" content="<?= DEV_NAME ?>"/>
		<meta name="keywords" content="<?= APP_NAME . ', ' . DEV_NAME ?>"/>
		<meta name="robots" content="index, follow"/>
		<meta name="revisit-after" content="1 days"/>
		<meta name="googlebot" content="index, follow"/>
		<meta name="googlebot-news" content="index, follow"/>
		<meta name="googlebot-image" content="index, follow"/>
		<meta name="googlebot-video" content="index, follow"/>
		<meta name="googlebot-shop" content="index, follow"/>
		<base href="<?= path() ?>"/>
		<title><?= APP_NAME ?></title>
		<link rel="icon" href="favicon.png" type="image/png"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

		<meta property="og:title" content="<?= APP_NAME ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="<?= path() ?>"/>
		<meta property="og:site_name" content="<?= APP_NAME ?>"/>
		<meta property="og:image" content="<?= path('icon.png') ?>"/>
		<meta property="og:description" content="<?= DEV_NAME ?>"/>
		<meta property="og:locale" content="<?= APP_LANG ?>"/>
		<meta property="og:locale:alternate" content="<?= APP_LANG ?>"/>

		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@about_sikessem"/>
		<meta name="twitter:title" content="<?= APP_NAME ?>"/>
		<meta name="twitter:description" content="<?= DEV_NAME ?>"/>
		<meta name="twitter:image" content="<?= path('icon.png') ?>"/>
		<meta name="twitter:creator" content="@about_sikessem"/>
		<meta name="twitter:site" content="@about_sikessem"/>
		<meta name="twitter:domain" content="<?= APP_DOMAIN ?>"/>
		<meta name="twitter:app:name:iphone" content="<?= APP_NAME ?>"/>
		<meta name="twitter:app:name:ipad" content="<?= APP_NAME ?>"/>
		<meta name="twitter:app:name:googleplay" content="<?= APP_NAME ?>"/>
		<meta name="twitter:app:url:iphone" content="<?= path() ?>"/>
		<meta name="twitter:app:url:ipad" content="<?= path() ?>"/>
		<meta name="twitter:app:url:googleplay" content="<?= path() ?>"/>
		<meta name="twitter:app:id:iphone" content=""/>
		<meta name="twitter:app:id:ipad" content=""/>
		<meta name="twitter:app:id:googleplay" content=""/>

		<meta itemprop="name" content="<?= APP_NAME ?>"/>
		<meta itemprop="description" content="<?= DEV_NAME ?>"/>
		<meta itemprop="image" content="<?= path('icon.png') ?>"/>
		<meta itemprop="url" content="<?= path() ?>"/>
		<meta itemprop="author" content="<?= DEV_NAME ?>"/>
		<meta itemprop="publisher" content="<?= DEV_NAME ?>"/>
		<meta itemprop="datePublished" content="<?= date('Y-m-d') ?>"/>
		<meta itemprop="dateModified" content="<?= date('Y-m-d') ?>"/>
		<meta itemprop="copyrightYear" content="<?= date('Y') ?>"/>
		<meta itemprop="inLanguage" content="<?= APP_LANG ?>"/>
		<meta itemprop="isFamilyFriendly" content="true"/>
		<meta itemprop="isPartOf" content="<?= APP_NAME ?>"/>

		<style>
		*::before, *, *::after {
			box-sizing: inherit;
			font: inherit;
		}

		:root {
			box-sizing: border-box;
			font-family: 'Roboto', sans-serif;
			font-size: 16px;
			font-weight: 400;
			line-height: 1.5;
			color: #333;
			background-color: #ddd;
			background-image: linear-gradient(to right, #7800ff, #ff0078), linear-gradient(to bottom, #7800ff, #ff0078);
			background-size: 100% 100%, 100% 100%;
			background-position: left top, left bottom;
			background-repeat: no-repeat, no-repeat;
			background-attachment: fixed, fixed;
			background-blend-mode: multiply, multiply;
			background-clip: content-box, content-box;
			background-origin: padding-box, padding-box;
		}

		body {
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			width: 100vw;
			overflow: hidden;
			color: #fff;
			text-align: center;
		}

		a {
			text-decoration: none;
			color: inherit;
		}

		a:hover {
			text-decoration: underline;
		}

		h1 span {
			color: #fff;
			font-size: 1.5em;
			font-weight: 700;
			text-shadow: 0 0 0.5em #fff;
			display: block;
		}

		.sikessem-brand {
			content: url('<?= path('logo.svg') ?>');
			height: 2.7em;
		}

		h1 .material-icons {
			font-size: 4.3rem;
		}
		</style>
	</head>
	<body>
		<h1><a href="<?= path() ?>"><span class="material-icons">home</span><br/><span class="sikessem-brand"><?= APP_NAME ?></span></a></h1>
		<p><?= DEV_NAME ?> &middot; <?= APP_NAME ?> &copy; <?= date('Y') ?></p>
	</body>
</html>
