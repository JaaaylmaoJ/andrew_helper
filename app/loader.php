<?php
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

$classes_arr = array_slice(scandir(DOCUMENT_ROOT.'/app/engine'), 2);

require_once DOCUMENT_ROOT . '/app/functions.php';
//require_once DOCUMENT_ROOT . '/vendor/autoload.php';

foreach ($classes_arr as $file_name)
    require_once DOCUMENT_ROOT . '/app/engine/' . $file_name;



