<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/loader.php';

$APP = new \Engine\Application();
$APP->run();