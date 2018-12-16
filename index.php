<?php

require dirname(__FILE__) . '/vendor/autoload.php';

$languageClass = new App\Controllers\Language($argv);
$languageClass->execute();

?>
