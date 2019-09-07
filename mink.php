<?php

require __DIR__ . '/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

//$driver = new GoutteDriver();
$driver = new Selenium2Driver('chrome');

$session = new Session($driver);
$session->start();

$session->visit('http://jurassicpark.wikia.com');

var_dump($session->getStatusCode(), $session->getCurrentUrl());

// DocumentElement
$page = $session->getPage();

var_dump(substr($page->getText(), 0, 75));

// NodeElement
$header = $page->find('css', '.WikiaPageContentWrapper .page-header h1');
var_dump($header->getText());

//$nav = $page->find('css', '.wds-list .wds-is-linked');
//$linkEl = $nav->find('css', 'li a');
//var_dump($linkEl->getHtml());

$selectorsHandler = $session->getSelectorsHandler();
$linkEl = $page->findLink('The Evolution of Claire');
var_dump($linkEl->getAttribute('href'));

$linkEl->click();

var_dump($session->getCurrentUrl());
$session->stop();
