<?php
require_once __DIR__ . '/vendor/autoload.php';

use Giphy\Client;
use Giphy\Giphy;

$test = new Giphy();

echo $test->gifSearch('cats');