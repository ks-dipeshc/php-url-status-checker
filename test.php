<?php

require 'vendor/autoload.php';

use Kalkani\PhpUrlStatusChecker\UrlStatusChecker;

$checker = new UrlStatusChecker();

$url = 'https://zerosuicide.edc.org/';

$result = $checker->checkStatus($url);

print_r($result);
