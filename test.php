<?php

require 'vendor/autoload.php';

use UrlStatusChecker\UrlStatusChecker;

$checker = new UrlStatusChecker();

$url = 'https://zerosuicide.edc.org/';

$result = $checker->checkStatus($url);

print_r($result);
